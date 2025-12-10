<?php

declare(strict_types=1);

namespace Ghostwriter\PHPt\Component\Comparator;

final class ExpectComparator implements ExpectComparatorInterface
{
    public function compare(string $expectedType, string $expected, string $actual, array $options = []): ComparisonResult
    {
        $expected = str_replace("\r\n", "\n", $expected);
        $actual = str_replace("\r\n", "\n", $actual);

        if ($expectedType === 'EXPECT') {
            $matched = $expected === $actual;
            $diff = $matched ? null : $this->diff($expected, $actual);

            return new ComparisonResult('passed', $matched, $diff, $matched ? null : 'exact-mismatch');
        }

        if ($expectedType === 'EXPECTF') {
            // Convert EXPECTF placeholders to regex
            $pattern = preg_quote($expected, '/');
            $replacements = [
                '%s' => '.*?',
                '%d' => '-?\d+',
                '%f' => '-?\d+(?:\.\d+)?',
                '%a' => '.+?',
                '%w' => '\s*',
                '%x' => '[0-9a-fA-F]+'
            ];
            $pattern = strtr($pattern, $replacements);
            $pattern = '/^' . $pattern . '$/ms';

            $matched = (bool) preg_match($pattern, $actual);
            $diff = $matched ? null : $this->diff($expected, $actual);

            return new ComparisonResult($matched ? 'passed' : 'failed', $matched, $diff, $matched ? null : 'expectf-mismatch');
        }

        if ($expectedType === 'EXPECTREGEX') {
            $pattern = $expected;
            // Ensure delimiters
            if ($pattern[0] !== '/') {
                $pattern = '/' . str_replace('/', '\/', $pattern) . '/ms';
            }

            $matched = (bool) preg_match($pattern, $actual);
            $diff = $matched ? null : $this->diff($expected, $actual);

            return new ComparisonResult($matched ? 'passed' : 'failed', $matched, $diff, $matched ? null : 'expectregex-mismatch');
        }

        return new ComparisonResult('failed', false, $this->diff($expected, $actual), 'unknown-expected-type');
    }

    private function diff(string $expected, string $actual): string
    {
        // Simple line-based diff fallback
        $eLines = explode("\n", $expected);
        $aLines = explode("\n", $actual);

        $out = [];
        $max = max(count($eLines), count($aLines));
        for ($i = 0; $i < $max; $i++) {
            $el = $eLines[$i] ?? '';
            $al = $aLines[$i] ?? '';
            if ($el !== $al) {
                $out[] = sprintf("- %s", $el);
                $out[] = sprintf("+ %s", $al);
            } else {
                $out[] = sprintf("  %s", $el);
            }
        }

        return implode("\n", $out);
    }
}
