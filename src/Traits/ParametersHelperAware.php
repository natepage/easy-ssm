<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Traits;

use NatePage\EasySsm\Helpers\Parameters;

trait ParametersHelperAware
{
    /** @var \NatePage\EasySsm\Helpers\Parameters */
    protected $parametersHelper;

    /**
     * Set parameters helper.
     *
     * @param \NatePage\EasySsm\Helpers\Parameters $parameters
     *
     * @return void
     *
     * @required
     */
    public function setParametersHelper(Parameters $parameters): void
    {
        $this->parametersHelper = $parameters;
    }
}
