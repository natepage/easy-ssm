<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Factories;

use Symfony\Component\Filesystem\Filesystem;

final class FilesystemFactory
{
    public function create(): Filesystem
    {
        return new Filesystem();
    }
}
