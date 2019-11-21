<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Services\Hash;

interface HashCheckerInterface
{
    /**
     * Check stored hash for given name is same has calculate hash for given SSM params.
     *
     * @param string $name
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $params
     *
     * @return bool
     */
    public function checkHash(string $name, array $params): bool;

    /**
     * Check hash1 equals hash2.
     *
     * @param string $hash1
     * @param string $hash2
     *
     * @return bool
     */
    public function checkHashes(string $hash1, string $hash2): bool;

    /**
     * Check hashes equals for given lists of SSM parameters.
     *
     * @param array $params1
     * @param array $params2
     *
     * @return bool
     */
    public function checkHashesForParams(array $params1, array $params2): bool;
}
