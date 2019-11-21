<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Services\Aws;

use NatePage\EasySsm\Services\Parameters\Data\Diff;

interface SsmClientInterface
{
    /**
     * Apply given diff to SSM.
     *
     * @param \NatePage\EasySsm\Services\Parameters\Data\Diff $diff
     *
     * @return void
     */
    public function applyDiff(Diff $diff): void;

    /**
     * Get all parameters with decryption.
     *
     * @return \NatePage\EasySsm\Services\Aws\Data\SsmParameter[]
     */
    public function getAllParameters(): array;
}
