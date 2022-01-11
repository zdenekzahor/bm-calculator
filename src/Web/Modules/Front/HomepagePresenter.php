<?php

declare(strict_types=1);

namespace ZdenekZahor\BmCalculator\Web\Modules\Front;

use ZdenekZahor\BmCalculator\Web\Controls\CalculatorControl\CalculatorControl;
use ZdenekZahor\BmCalculator\Web\Controls\CalculatorControl\CalculatorControlFactory;

final class HomepagePresenter extends BasePresenter
{
    /**
     * @var CalculatorControlFactory
     * @inject
     */
    public CalculatorControlFactory $calculatorControlFactory;

    protected function startup()
    {
        parent::startup();
        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect(':Front:Sign:in');
        }
    }

    protected function createComponentCalculator(): CalculatorControl
    {
        return $this->calculatorControlFactory->create();
    }
}
