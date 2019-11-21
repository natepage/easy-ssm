<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Services\Hash;

use NatePage\EasySsm\Traits\ParametersHelperAware;

final class HashCalculator implements HashCalculatorInterface
{
    use ParametersHelperAware;

    /**
     * Calculate hash for given list of SSM parameters.
     *
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $parameters
     *
     * @return string
     */
    public function calculate(array $parameters): string
    {
        $array = $this->parametersHelper->toKeyObjectAsStrings($parameters);

        \ksort($array);

        return \md5(\json_encode($array));
    }
}
