<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Traits;

use NatePage\EasySsm\Services\Filesystem\HashDumperInterface;

trait HashDumperAware
{
    /** @var \NatePage\EasySsm\Services\Filesystem\HashDumperInterface */
    protected $hashDumper;

    /**
     * Set hash dumper.
     *
     * @param \NatePage\EasySsm\Services\Filesystem\HashDumperInterface $hashDumper
     *
     * @return void
     *
     * @required
     */
    public function setHashDumper(HashDumperInterface $hashDumper): void
    {
        $this->hashDumper = $hashDumper;
    }
}
