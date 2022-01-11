<?php

declare(strict_types=1);

namespace ZdenekZahor\BmCalculator\Web\Controls\BrowserSyncControl;

use Nette\Application\UI\Control;

class BrowserSyncControl extends Control
{
    private ?int $port;

    /**
     * @param int|null $port
     */
    public function __construct(
        ?int $port,
    ) {
        $this->port = $port;
    }

    public function render(): void
    {
        if ($this->port) {
            $this->template->port = $this->port;

            $this->template->render(__DIR__ . '/BrowserSyncControl.latte');
        }
    }
}
