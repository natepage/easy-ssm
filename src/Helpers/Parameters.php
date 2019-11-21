<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Helpers;

use NatePage\EasySsm\Services\Aws\Data\SsmParameter;
use NatePage\EasySsm\Services\Parameters\Data\Diff;

final class Parameters
{
    /**
     * Apply given diff to given list of SSM parameters.
     *
     * @param \NatePage\EasySsm\Services\Parameters\Data\Diff $diff
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $parameters
     *
     * @return \NatePage\EasySsm\Services\Aws\Data\SsmParameter[]
     */
    public function applyDiff(Diff $diff, array $parameters): array
    {
        $parameters = $this->toIndexedByName($parameters);

        // Add new parameters
        foreach ($diff->getNew() as $parameter) {
            $parameters[$parameter->getName()] = $parameter;
        }

        // Override updated parameters
        foreach ($diff->getUpdated() as $parameter) {
            $parameters[$parameter->getName()] = $parameter;
        }

        // Remove deleted parameters
        foreach ($diff->getDeleted() as $parameter) {
            unset($parameters[$parameter->getName()]);
        }

        return $parameters;
    }

    /**
     * Find remote parameter for given name.
     *
     * @param string $name
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $parameters
     *
     * @return null|\NatePage\EasySsm\Services\Aws\Data\SsmParameter
     */
    public function findParameter(string $name, array $parameters): ?SsmParameter
    {
        foreach ($parameters as $param) {
            if ($param->getName() === $name) {
                return $param;
            }
        }

        return null;
    }

    /**
     * Merge remote ssm parameters into local parameters.
     *
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $remote
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $local
     *
     * @return \NatePage\EasySsm\Services\Aws\Data\SsmParameter[]
     */
    public function merge(array $remote, array $local): array
    {
        $merge = $this->toIndexedByName($local);

        foreach ($remote as $param) {
            $merge[$param->getName()] = $param;
        }

        return $merge;
    }

    /**
     * Return list of given SSM parameters indexed by their names.
     *
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $parameters
     *
     * @return \NatePage\EasySsm\Services\Aws\Data\SsmParameter[]
     */
    public function toIndexedByName(array $parameters): array
    {
        $array = [];

        foreach ($parameters as $parameter) {
            $array[$parameter->getName()] = $parameter;
        }

        return $array;
    }

    /**
     * Convert list of SSM parameters to key/values array.
     *
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $parameters
     *
     * @return mixed[]
     */
    public function toKeyObjectAsStrings(array $parameters): array
    {
        $array = [];

        foreach ($parameters as $parameter) {
            $array[$parameter->getName()] = \sprintf(
                'type: %s, value: %s',
                $parameter->getType(),
                $parameter->getValue()
            );
        }

        return $array;
    }
}
