<?php

declare(strict_types=1);

namespace ZdenekZahor\BmCalculator\Service;

use PHPUnit\Framework\TestCase;
use ZdenekZahor\BmCalculator\Model\Entity\ProviderEntity;

final class CalculationServiceTest extends TestCase
{
    public function testCalculate(): void
    {
        $service = new CalculationService();

        $provider = new ProviderEntity(
            1000,
            'Test provider',
            12.5,
        );

        $text = <<<TXT
300ks; 500 Kč
300ks: 200 Kč
300, 500

300 ks, 500Kč
300 kusů, 200 Kč
500 Kč
3000ks
3000ks, 1 500 Kč
3000ks, 1500 Kč
Other input
3 000ks, 1500 Kč
10 000 000ks, 1500 Kč
TXT;

        $result = <<<TXT
300 ks ... 562,50 Kč + DPH
300 ks ... 225,00 Kč + DPH
300 ks ... 562,50 Kč + DPH

300 ks ... 562,50 Kč + DPH
300 ks ... 225,00 Kč + DPH
500 Kč
3000ks
3 000 ks ... 1 687,50 Kč + DPH
3 000 ks ... 1 687,50 Kč + DPH
Other input
3 000 ks ... 1 687,50 Kč + DPH
10 000 000 ks ... 1 687,50 Kč + DPH
TXT;

        $this->assertSame($result, $service->calculate($provider, $text));
    }
}
