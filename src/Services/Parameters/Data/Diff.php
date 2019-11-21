<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Services\Parameters\Data;

final class Diff
{
    /** @var \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] */
    private $deleted;

    /** @var \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] */
    private $new;

    /** @var \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] */
    private $updated;

    /**
     * Diff constructor.
     *
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $new
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $updated
     * @param \NatePage\EasySsm\Services\Aws\Data\SsmParameter[] $deleted
     */
    public function __construct(array $new, array $updated, array $deleted)
    {
        $this->new = $new;
        $this->updated = $updated;
        $this->deleted = $deleted;
    }

    /**
     * @return \NatePage\EasySsm\Services\Aws\Data\SsmParameter[]
     */
    public function getDeleted(): array
    {
        return $this->deleted;
    }

    /**
     * @return \NatePage\EasySsm\Services\Aws\Data\SsmParameter[]
     */
    public function getNew(): array
    {
        return $this->new;
    }

    /**
     * @return \NatePage\EasySsm\Services\Aws\Data\SsmParameter[]
     */
    public function getUpdated(): array
    {
        return $this->updated;
    }

    /**
     * Check if diff has differences between remote and local.
     *
     * @return bool
     */
    public function isDifferent(): bool
    {
        return empty($this->new) === false || empty($this->updated) === false || empty($this->deleted) === false;
    }
}
