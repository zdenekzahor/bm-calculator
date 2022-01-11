<?php

declare(strict_types=1);

namespace ZdenekZahor\BmCalculator\Service;

use ZdenekZahor\BmCalculator\Model\Entity\ProviderEntity;

class CalculationService
{

    public function calculate(ProviderEntity $provider, string $input): string
    {
        $rows = explode("\n", $input);
        $outputBuilder = [];

        foreach ($rows as $row) {
            if (preg_match('/([\d ]+)[^\d]+([\d ]+)/', $row, $rowMatches) === 1) {
                $count = intval(str_replace(' ', '', $rowMatches[1]));
                $price = intval(str_replace(' ', '', $rowMatches[2]));

                $price = round($price * (1 + ($provider->getPriceCoefficient() / 100)), 2);
                $outputBuilder[] =
                    number_format($count, 0, ',', ' ') .
                    ' ks ... ' .
                    number_format($price, 2, ',', ' ') .
                    ' Kč + DPH';
            } else {
                $outputBuilder[] = $row;
            }
        }

        return implode("\n", $outputBuilder);
    }
}
