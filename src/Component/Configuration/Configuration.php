<?php

declare(strict_types=1);

namespace Ghostwriter\Phpt\Component\Configuration;

use Ghostwriter\Config\ConfigInterface;
use Override;

final readonly class Configuration implements ConfigurationInterface
{
    public function __construct(
        private ConfigInterface $config
    ) {}

    #[Override]
    public function get(string $key, mixed $default = null): mixed
    {
        return $this->config->get($key, $default);
    }

    #[Override]
    public function has(string $key): bool
    {
        return $this->config->has($key);
    }

    #[Override]
    public function merge(array $config): ConfigInterface
    {
        $this->config->merge($config);
    }

    #[Override]
    public function remove(string $key): void
    {
        $this->config->remove($key);
    }

    #[Override]
    public function set(string $key, mixed $value): void
    {
        $this->config->set($key, $value);
    }

    #[Override]
    public function toArray(): array
    {
        return $this->config->toArray();
    }
}
