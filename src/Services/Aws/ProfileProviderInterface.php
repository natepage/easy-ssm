<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Services\Aws;

interface ProfileProviderInterface
{
    /**
     * Get AWS profile to use.
     *
     * @return string
     */
    public function getProfile(): string;
}
