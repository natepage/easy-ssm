<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Services\Aws;

final class ProfileProvider implements ProfileProviderInterface
{
    /**
     * Get AWS profile to use.
     *
     * @return string
     */
    public function getProfile(): string
    {
        return \getenv('AWS_PROFILE') ?: 'default';
    }
}
