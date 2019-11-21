<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Services\Filesystem;

interface SsmParametersDumperInterface
{
    /**
     * Dump SSM parameters to given filename.
     *
     * @param string $filename
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $parameters
     *
     * @return void
     */
    public function dumpParameters(string $filename, array $parameters): void;
}
