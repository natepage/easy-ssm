<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Traits;

use NatePage\EasySsm\Services\Parameters\DiffResolverInterface;

trait DiffResolverAware
{
    /** @var \NatePage\EasySsm\Services\Parameters\DiffResolverInterface */
    protected $diffResolver;

    /**
     * Set diff resolver.
     *
     * @param \NatePage\EasySsm\Services\Parameters\DiffResolverInterface $diffResolver
     *
     * @return void
     *
     * @required
     */
    public function setDiffResolver(DiffResolverInterface $diffResolver): void
    {
        $this->diffResolver = $diffResolver;
    }
}
