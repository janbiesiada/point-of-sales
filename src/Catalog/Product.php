<?php

declare(strict_types=1);

namespace JBdev\PointOfSale\Catalog;

class Product
{
    /**
     * @var string
     */
    private string $code;

    /**
     * @var float
     */
    private float $unitPrice;

    /**
     * @var array
     */
    private array $volumePrices;

    public function __construct(
        string $code,
        float $unitPrice,
        array $volumePrices = null
    ) {
        $this->code = $code;
        $this->unitPrice = $unitPrice;
        $this->volumePrices = $volumePrices ?? [];
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return float
     */
    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    /**
     * @param float $unitPrice
     */
    public function setUnitPrice(float $unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * @param int $qty
     * @return float
     */
    public function getVolumePrice(int $qty): float
    {
        return $this->volumePrices[$qty];
    }

    public function setVolumePrice(int $qty,float $price): void
    {
        $this->volumePrices[$qty] = $price;
    }

    /**
     * @param int $qty
     * @return bool
     */
    public function hasVolumePrice(int $qty):bool
    {
        return isset($this->volumePrices[$qty]);
    }
}