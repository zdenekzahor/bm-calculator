<?php

declare(strict_types=1);

namespace ZdenekZahor\BmCalculator\Web\Controls\LoginControl;

interface LoginControlFactory
{
    /**
     * @return LoginControl
     */
    public function create(): LoginControl;
}
