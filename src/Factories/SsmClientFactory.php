<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Factories;

use Aws\Ssm\SsmClient;
use NatePage\EasySsm\Services\Aws\ProfileProviderInterface;

final class SsmClientFactory
{
    /** @var \NatePage\EasySsm\Services\Aws\ProfileProviderInterface */
    private $awsProfileProvider;

    /**
     * SsmClientFactory constructor.
     *
     * @param \NatePage\EasySsm\Services\Aws\ProfileProviderInterface $awsProfileProvider
     */
    public function __construct(ProfileProviderInterface $awsProfileProvider)
    {
        $this->awsProfileProvider = $awsProfileProvider;
    }

    /**
     * Create SSM client.
     *
     * @return \Aws\Ssm\SsmClient
     */
    public function create(): SsmClient
    {
        return new SsmClient([
            'profile' => $this->awsProfileProvider->getProfile(),
            'version' => 'latest',
            'region' => 'ap-southeast-2'
        ]);
    }
}
