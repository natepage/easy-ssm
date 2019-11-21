<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Traits;

use NatePage\EasySsm\Services\Filesystem\SsmParametersDumperInterface;

trait SsmParametersDumperAware
{
    /** @var \NatePage\EasySsm\Services\Filesystem\SsmParametersDumperInterface */
    protected $ssmParametersDumper;

    /**
     * Set ssm parameters dumper.
     *
     * @param \NatePage\EasySsm\Services\Filesystem\SsmParametersDumperInterface $ssmParametersDumper
     *
     * @return void
     *
     * @required
     */
    public function setSsmParametersDumper(SsmParametersDumperInterface $ssmParametersDumper): void
    {
        $this->ssmParametersDumper = $ssmParametersDumper;
    }
}
