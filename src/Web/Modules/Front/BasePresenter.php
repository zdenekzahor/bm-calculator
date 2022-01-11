<?php

declare(strict_types=1);

namespace ZdenekZahor\BmCalculator\Web\Modules\Front;

use Nette\Application\UI\Presenter;
use ZdenekZahor\BmCalculator\Web\Controls\BrowserSyncControl\BrowserSyncControl;
use ZdenekZahor\BmCalculator\Web\Controls\BrowserSyncControl\BrowserSyncControlFactory;

abstract class BasePresenter extends Presenter
{
    /**
     * @var BrowserSyncControlFactory
     * @inject
     */
    public BrowserSyncControlFactory $browserSyncControlFactory;

    /**
     * @return BrowserSyncControl
     */
    protected function createComponentBrowserSync(): BrowserSyncControl
    {
        return $this->browserSyncControlFactory->create();
    }
}
