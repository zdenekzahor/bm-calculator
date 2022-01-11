<?php

declare(strict_types=1);

namespace ZdenekZahor\BmCalculator\Model\Entity;

class ProviderEntity
{

    private int $id;

    private string $name;

    private float $priceCoefficient;

    /**
     * @param int $id
     * @param string $name
     * @param float $priceCoefficient
     */
    public function __construct(
        int $id,
        string $name,
        float $priceCoefficient,
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->priceCoefficient = $priceCoefficient;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPriceCoefficient(): float
    {
        return $this->priceCoefficient;
    }
}
