<?php

declare(strict_types=1);

namespace ZdenekZahor\BmCalculator\Web\Controls\BrowserSyncControl;

interface BrowserSyncControlFactory
{
    /**
     * @return BrowserSyncControl
     */
    public function create(): BrowserSyncControl;
}
