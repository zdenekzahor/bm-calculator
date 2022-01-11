<?php

declare(strict_types=1);

namespace ZdenekZahor\BmCalculator\Web\Controls\CalculatorControl;

use Nette\Application\UI\Control;
use Nette\Application\UI\Form;
use ZdenekZahor\BmCalculator\Model\ProviderDaoInterface;
use ZdenekZahor\BmCalculator\Service\CalculationService;

class CalculatorControl extends Control
{
    private const INPUT_PROVIDER = 'provider';

    private const INPUT_TEXT = 'text';

    private const INPUT_RESULT = 'result';

    private string $priceCoefficient;

    private ProviderDaoInterface $providerDao;

    private CalculationService $calculationService;

    /**
     * @param ProviderDaoInterface $providerDao
     * @param CalculationService $calculationService
     */
    public function __construct(
        ProviderDaoInterface $providerDao,
        CalculationService $calculationService,
    ) {
        $this->providerDao = $providerDao;
        $this->calculationService = $calculationService;

        $this->priceCoefficient = '?';
    }

    public function render(): void
    {
        $this->template->priceCoefficient = $this->priceCoefficient;
        $this->template->render(__DIR__ . '/CalculatorControl.latte');
    }

    protected function createComponentForm(): Form
    {
        $form = new Form();

        $form->addSelect(
            self::INPUT_PROVIDER,
            'Dodavatel',
            $this->providerDao->getProviders(),
        );

        $form->addTextArea(
            self::INPUT_TEXT,
            'Zdrojový text',
            null,
            10,
        );

        $form
            ->addTextArea(
                self::INPUT_RESULT,
                'Vypočítaná nabídka',
                null,
                10
            )
            ->setDisabled(true);

        $form->addSubmit('send', 'Spočítat');

        $form->onSuccess[] = [$this, 'formSucceeded'];
        return $form;
    }

    public function formSucceeded(Form $form, $data): void
    {
        $provider = $this->providerDao->getProviderById($data[self::INPUT_PROVIDER]);
        $form[self::INPUT_RESULT]->setValue(
            $this->calculationService->calculate(
                $provider,
                $data[self::INPUT_TEXT],
            )
        );
        $this->priceCoefficient = number_format($provider->getPriceCoefficient(), 1, ',', ' ');
    }
}
