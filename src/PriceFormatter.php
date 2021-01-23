<?php

declare(strict_types=1);

namespace JBdev\PointOfSale;

class PriceFormatter
{
    /**
     * @var string
     */
    private string $currencySymbol;

    /**
     * @param string $currencySymbol
     */
    public function __construct(
        string $currencySymbol
    ) {
        $this->currencySymbol = $currencySymbol;
    }

    /**
     * @param float $price
     * @return string
     */
    public function formatPrice(float $price):string
    {
        return $this->currencySymbol. number_format($price, 2, '.', ',');
    }
}