<?php

declare(strict_types=1);

namespace ZdenekZahor\BmCalculator\Web\Modules\Front;

use ZdenekZahor\BmCalculator\Web\Controls\LoginControl\LoginControl;
use ZdenekZahor\BmCalculator\Web\Controls\LoginControl\LoginControlFactory;

final class SignPresenter extends BasePresenter
{

    /**
     * @var LoginControlFactory
     * @inject
     */
    public LoginControlFactory $loginControlFactory;

    protected function createComponentLogin(): LoginControl
    {
        return $this->loginControlFactory->create();
    }

    public function actionOut()
    {
        $this->getUser()->logout();
        $this->redirect(':Front:Sign:in');
    }
}
