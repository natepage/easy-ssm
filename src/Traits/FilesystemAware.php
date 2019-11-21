<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Traits;

use Symfony\Component\Filesystem\Filesystem;

trait FilesystemAware
{
    /** @var \Symfony\Component\Filesystem\Filesystem */
    protected $filesystem;

    /**
     * Set filesystem.
     *
     * @param \Symfony\Component\Filesystem\Filesystem $filesystem
     *
     * @return void
     *
     * @required
     */
    public function setFilesystem(Filesystem $filesystem): void
    {
        $this->filesystem = $filesystem;
    }
}
