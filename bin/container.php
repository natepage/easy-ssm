<?php
declare(strict_types=1);

use \NatePage\EasySsm\HttpKernel\EasySsmKernel;
use Symfony\Component\Console\Input\ArgvInput;
use Symplify\PackageBuilder\Configuration\ConfigFileFinder;

$configName = 'easy-ssm.yaml';
$configFallback = ['easy-ssm.yml'];
$configs = [];

// Get config
ConfigFileFinder::detectFromInput($configName, new ArgvInput());
$configs[] = ConfigFileFinder::provide($configName, $configFallback);

$kernel = new EasySsmKernel();
$kernel->setConfigs(\array_filter($configs));
$kernel->boot();

return $kernel->getContainer();
