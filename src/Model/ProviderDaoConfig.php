<?php

declare(strict_types=1);

namespace ZdenekZahor\BmCalculator\Model;

use ZdenekZahor\BmCalculator\Model\Entity\ProviderEntity;

class ProviderDaoConfig implements ProviderDaoInterface
{

    /** @var ProviderEntity[] */
    private array $providers;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        foreach ($config as $item) {
            $this->providers[$item['id']] = new ProviderEntity(
                $item['id'],
                $item['name'],
                $item['priceCoefficient'],
            );
        }
    }

    /**
     * @return ProviderEntity[]
     */
    public function getProviders(): array
    {
        return $this->providers;
    }

    /**
     * @param int $id
     * @return ProviderEntity|null
     */
    public function getProviderById(int $id): ?ProviderEntity
    {
        if (isset($this->getProviders()[$id])) {
            return $this->getProviders()[$id];
        }

        return null;
    }
}
