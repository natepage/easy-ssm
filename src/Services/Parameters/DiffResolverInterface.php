<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Services\Parameters;

use NatePage\EasySsm\Services\Parameters\Data\Diff;

interface DiffResolverInterface
{
    /**
     * Resolve diff between remote and local SSM parameters.
     *
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $remote
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $local
     *
     * @return \NatePage\EasySsm\Services\Parameters\Data\Diff
     */
    public function diff(array $remote, array $local): Diff;
}
