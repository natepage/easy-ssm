<?php
declare(strict_types=1);

namespace NatePage\EasySsm\Traits;

use NatePage\EasySsm\Helpers\ConsoleRenderer;

trait ConsoleRendererAware
{
    /** @var \NatePage\EasySsm\Helpers\ConsoleRenderer */
    protected $consoleRenderer;

    /**
     * Set console renderer.
     *
     * @param \NatePage\EasySsm\Helpers\ConsoleRenderer $consoleRenderer
     *
     * @return void
     *
     * @required
     */
    public function setConsoleRenderer(ConsoleRenderer $consoleRenderer): void
    {
        $this->consoleRenderer = $consoleRenderer;
    }
}
