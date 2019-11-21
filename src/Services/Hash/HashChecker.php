<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Services\Hash;

use NatePage\EasySsm\Traits\HashCalculatorAware;
use NatePage\EasySsm\Traits\HashRepositoryAware;

final class HashChecker implements HashCheckerInterface
{
    use HashCalculatorAware;
    use HashRepositoryAware;

    /**
     * Check stored hash for given name is same has calculate hash for given SSM params.
     *
     * @param string $name
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $params
     *
     * @return bool
     */
    public function checkHash(string $name, array $params): bool
    {
        $localHash = $this->hashRepository->get($name);

        if ($localHash === null) {
            // Maybe throw exception here to clearly identify there is no local hash for given name.
            return false;
        }

        return $this->checkHashes($localHash, $this->hashCalculator->calculate($params));
    }

    /**
     * Check hash1 equals hash2.
     *
     * @param string $hash1
     * @param string $hash2
     *
     * @return bool
     */
    public function checkHashes(string $hash1, string $hash2): bool
    {
        return $hash1 === $hash2;
    }

    /**
     * Check hashes equals for given lists of SSM parameters.
     *
     * @param array $params1
     * @param array $params2
     *
     * @return bool
     */
    public function checkHashesForParams(array $params1, array $params2): bool
    {
        return $this->checkHashes(
            $this->hashCalculator->calculate($params1),
            $this->hashCalculator->calculate($params2)
        );
    }
}
