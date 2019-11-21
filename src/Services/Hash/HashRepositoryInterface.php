<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Services\Hash;

interface HashRepositoryInterface
{
    /**
     * Get hash for given name.
     *
     * @param string $name
     *
     * @return null|string
     */
    public function get(string $name): ?string;

    /**
     * Save given hash for given name.
     *
     * @param string $name
     * @param string $hash
     *
     * @return void
     */
    public function save(string $name, string $hash): void;
}
