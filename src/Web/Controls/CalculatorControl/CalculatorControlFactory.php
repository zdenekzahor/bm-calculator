<?php

declare(strict_types=1);

namespace ZdenekZahor\BmCalculator\Web\Controls\CalculatorControl;

interface CalculatorControlFactory
{
    /**
     * @return CalculatorControl
     */
    public function create(): CalculatorControl;
}
