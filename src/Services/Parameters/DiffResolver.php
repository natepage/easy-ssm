<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Services\Parameters;

use NatePage\EasySsm\Services\Parameters\Data\Diff;
use NatePage\EasySsm\Traits\ParametersHelperAware;

final class DiffResolver implements DiffResolverInterface
{
    use ParametersHelperAware;

    /**
     * Resolve diff between remote and local SSM parameters.
     *
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $remote
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $local
     *
     * @return \NatePage\EasySsm\Services\Parameters\Data\Diff
     */
    public function diff(array $remote, array $local): Diff
    {
        $new = [];
        $updated = [];
        $deleted = [];

        // Check for new and updates
        foreach ($local as $param) {
            $remoteParam = $this->parametersHelper->findParameter($param->getName(), $remote);

            // If remote parameter doesn't exist, it's a new one
            if ($remoteParam === null) {
                $new[] = $param;

                continue;
            }

            // If values are different then it's an update
            if ($param->getValue() !== $remoteParam->getValue() || $param->getType() !== $remoteParam->getType()) {
                $updated[] = $param;

                continue;
            }
        }

        // Check for deletes
        foreach ($remote as $param) {
            $localParam = $this->parametersHelper->findParameter($param->getName(), $local);

            if ($localParam === null) {
                $deleted[] = $param;
            }
        }

        return new Diff($new, $updated, $deleted);
    }
}
