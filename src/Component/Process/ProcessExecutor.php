<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Process;

use RuntimeException;

final class ProcessExecutor implements ProcessExecutorInterface
{
    public function execute(ProcessRequest $request): ProcessResult
    {
        $start = microtime(true);

        $descriptors = [
            0 => ['pipe', 'r'],
            1 => ['pipe', 'w'],
        ];

        if ($request->captureStdErr) {
            $descriptors[2] = ['pipe', 'w'];
        }

        $cmd = array_merge([$request->binary], $request->args);

        $process = proc_open($cmd, $descriptors, $pipes, $request->cwd, $request->env);

        if (!is_resource($process)) {
            throw new RuntimeException('Failed to start process');
        }

        // Write stdin if provided
        if ($request->stdin !== null && isset($pipes[0])) {
            fwrite($pipes[0], $request->stdin);
        }

        fclose($pipes[0]);

        stream_set_blocking($pipes[1], false);
        if (isset($pipes[2])) {
            stream_set_blocking($pipes[2], false);
        }

        $stdout = '';
        $stderr = '';

        $timeout = $request->timeoutSeconds !== null ? (float) $request->timeoutSeconds : null;
        $timedOut = false;

        while (true) {
            $status = proc_get_status($process);
            if ($status === false) {
                break;
            }

            $read = [$pipes[1]];
            $write = null;
            $except = null;
            $tv = 200000; // 200ms in microseconds

            $numChanged = stream_select($read, $write, $except, 0, $tv);

            if ($numChanged === false) {
                break;
            }

            if ($numChanged > 0) {
                $chunk = stream_get_contents($pipes[1]);
                if ($chunk !== false && $chunk !== '') {
                    $stdout .= $chunk;
                }
                if (isset($pipes[2])) {
                    $chunkErr = stream_get_contents($pipes[2]);
                    if ($chunkErr !== false && $chunkErr !== '') {
                        $stderr .= $chunkErr;
                    }
                }
            }

            if ($status['running'] === false) {
                // Read any remaining
                $chunk = stream_get_contents($pipes[1]);
                if ($chunk !== false && $chunk !== '') {
                    $stdout .= $chunk;
                }
                if (isset($pipes[2])) {
                    $chunkErr = stream_get_contents($pipes[2]);
                    if ($chunkErr !== false && $chunkErr !== '') {
                        $stderr .= $chunkErr;
                    }
                }
                break;
            }

            if ($timeout !== null && (microtime(true) - $start) > $timeout) {
                // timeout: terminate process
                $timedOut = true;
                // attempt graceful terminate
                proc_terminate($process);
                // give a moment
                usleep(100000);
                // force kill if still running
                $status2 = proc_get_status($process);
                if ($status2 !== false && $status2['running']) {
                    proc_terminate($process, 9);
                }
                break;
            }

            usleep(100000); // 100ms
        }

        $status = proc_get_status($process);
        $exitCode = $status['exitcode'] ?? 0;

        // Close pipes
        foreach ($pipes as $p) {
            if (is_resource($p)) {
                fclose($p);
            }
        }

        proc_close($process);

        $elapsedMs = (int) ((microtime(true) - $start) * 1000);

        return new ProcessResult($stdout, $stderr, $exitCode, $elapsedMs, $timedOut);
    }
}
