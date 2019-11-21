<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Services\Hash;

use NatePage\EasySsm\Traits\FilesystemAware;

final class HashRepository implements HashRepositoryInterface
{
    use FilesystemAware;

    /**
     * Get hash for given name.
     *
     * @param string $name
     *
     * @return null|string
     */
    public function get(string $name): ?string
    {
        $filename = $this->getFilename($name);

        if ($this->filesystem->exists($filename) === false) {
            return null;
        }

        return \file_get_contents($filename);
    }

    /**
     * Save given hash for given name.
     *
     * @param string $name
     * @param string $hash
     *
     * @return void
     */
    public function save(string $name, string $hash): void
    {
        $this->filesystem->dumpFile($this->getFilename($name), $hash);
    }

    /**
     * Get filename for given name.
     *
     * @param string $name
     *
     * @return string
     */
    private function getFilename(string $name): string
    {
        return \sprintf('%s/../../../var/%s.hash', __DIR__, $name);
    }
}
