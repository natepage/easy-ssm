<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Services\Hash;

interface HashCalculatorInterface
{
    /**
     * Calculate hash for given list of SSM parameters.
     *
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $parameters
     *
     * @return string
     */
    public function calculate(array $parameters): string;
}
