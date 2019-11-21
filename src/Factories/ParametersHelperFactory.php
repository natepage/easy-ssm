<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Factories;

use NatePage\EasySsm\Helpers\Parameters;

final class ParametersHelperFactory
{
    public function create(): Parameters
    {
        return new Parameters();
    }
}
