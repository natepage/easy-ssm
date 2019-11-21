<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Traits;

use NatePage\EasySsm\Services\Hash\HashCheckerInterface;

trait HashCheckerAware
{
    /** @var \NatePage\EasySsm\Services\Hash\HashCheckerInterface */
    protected $hashChecker;

    /**
     * Set hash checker.
     *
     * @param \NatePage\EasySsm\Services\Hash\HashCheckerInterface $hashChecker
     *
     * @return void
     *
     * @required
     */
    public function setHashChecker(HashCheckerInterface $hashChecker): void
    {
        $this->hashChecker = $hashChecker;
    }
}
