<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Traits;

use NatePage\EasySsm\Services\Aws\SsmClientInterface;

trait SsmClientAware
{
    /** @var \NatePage\EasySsm\Services\Aws\SsmClientInterface */
    protected $ssmClient;

    /**
     * Set SSM client.
     *
     * @param \NatePage\EasySsm\Services\Aws\SsmClientInterface $ssmClient
     *
     * @return void
     *
     * @required
     */
    public function setSsmClient(SsmClientInterface $ssmClient): void
    {
        $this->ssmClient = $ssmClient;
    }
}
