<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Services\Filesystem;

interface HashDumperInterface
{
    /**
     * Dump hash for given name and SSM parameters.
     *
     * @param string $name
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $parameters
     *
     * @return void
     */
    public function dumpHash(string $name, array $parameters): void;
}
