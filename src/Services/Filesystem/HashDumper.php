<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Services\Filesystem;

use NatePage\EasySsm\Traits\HashCalculatorAware;
use NatePage\EasySsm\Traits\HashRepositoryAware;

final class HashDumper implements HashDumperInterface
{
    use HashCalculatorAware;
    use HashRepositoryAware;

    /**
     * Dump hash for given name and SSM parameters.
     *
     * @param string $name
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $parameters
     *
     * @return void
     */
    public function dumpHash(string $name, array $parameters): void
    {
        $this->hashRepository->save($name, $this->hashCalculator->calculate($parameters));
    }
}
