<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Services\Filesystem;

interface SsmParametersParserInterface
{
    /**
     * Parse given filename and return array of ssm parameters.
     *
     * @param string $filename
     *
     * @return \NatePage\EasySsm\Services\Aws\Data\SsmParameter[]
     *
     * @throws \NatePage\EasySsm\Services\Filesystem\Exceptions\InvalidTagException
     */
    public function parseParameters(string $filename): array;
}
