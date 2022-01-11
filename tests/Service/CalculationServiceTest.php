<?php

declare(strict_types=1);

namespace ZdenekZahor\BmCalculator\Service;

use PHPUnit\Framework\TestCase;

final class CalculationServiceTest extends TestCase
{
    public function testCalculate(): void
    {
        $service = new CalculationService();
        $this->assertSame('', $service->calculate(''));
    }
}
