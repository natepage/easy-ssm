<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Console;

use Symfony\Component\Console\Application;
use Symplify\PackageBuilder\Console\HelpfulApplicationTrait;

final class EasySsmApplication extends Application
{
    use HelpfulApplicationTrait;

    /** @var string */
    public const VERSION = '1.0.1';

    /**
     * EasySsmApplication constructor.
     *
     * @param \Symfony\Component\Console\Command\Command[] $commands
     */
    public function __construct(array $commands)
    {
        parent::__construct('easy-ssm', self::VERSION);

        $this->addCommands($commands);
    }
}
