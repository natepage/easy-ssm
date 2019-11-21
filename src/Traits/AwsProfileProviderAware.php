<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Traits;

use NatePage\EasySsm\Services\Aws\ProfileProviderInterface;

trait AwsProfileProviderAware
{
    /** @var \NatePage\EasySsm\Services\Aws\ProfileProviderInterface */
    protected $awsProfileProvider;

    /**
     * Set AWS profile provider.
     *
     * @param \NatePage\EasySsm\Services\Aws\ProfileProviderInterface $awsProfileProvider
     *
     * @return void
     *
     * @required
     */
    public function setAwsProfileProvider(ProfileProviderInterface $awsProfileProvider): void
    {
        $this->awsProfileProvider = $awsProfileProvider;
    }
}
