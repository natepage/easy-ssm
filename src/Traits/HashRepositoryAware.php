<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Traits;

use NatePage\EasySsm\Services\Hash\HashRepositoryInterface;

trait HashRepositoryAware
{
    /** @var \NatePage\EasySsm\Services\Hash\HashRepositoryInterface */
    protected $hashRepository;

    /**
     * Set hash repository.
     *
     * @param \NatePage\EasySsm\Services\Hash\HashRepositoryInterface $hashRepository
     *
     * @return void
     *
     * @required
     */
    public function setHashRepository(HashRepositoryInterface $hashRepository): void
    {
        $this->hashRepository = $hashRepository;
    }
}
