<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Traits;

use NatePage\EasySsm\Services\Filesystem\SsmParametersParserInterface;

trait SsmParametersParserAware
{
    /** @var \NatePage\EasySsm\Services\Filesystem\SsmParametersParserInterface */
    protected $ssmParametersParser;

    /**
     * Set ssm parameters parser.
     *
     * @param \NatePage\EasySsm\Services\Filesystem\SsmParametersParserInterface $ssmParametersParser
     *
     * @return void
     *
     * @required
     */
    public function setSsmParametersParser(SsmParametersParserInterface $ssmParametersParser): void
    {
        $this->ssmParametersParser = $ssmParametersParser;
    }
}
