<?php

namespace ZdenekZahor\BmCalculator\Model;

use ZdenekZahor\BmCalculator\Model\Entity\ProviderEntity;

interface ProviderDaoInterface
{

    /**
     * @return ProviderEntity[]
     */
    public function getProviders(): array;

    /**
     * @param int $id
     * @return ProviderEntity|null
     */
    public function getProviderById(int $id): ?ProviderEntity;
}
