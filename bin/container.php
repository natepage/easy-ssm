<?php
declare(strict_types=1);

use \NatePage\EasySsm\HttpKernel\EasySsmKernel;

$kernel = new EasySsmKernel();
$kernel->boot();

return $kernel->getContainer();
