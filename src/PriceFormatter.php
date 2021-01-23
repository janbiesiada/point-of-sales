<?php

declare(strict_types=1);


namespace JBdev\PointOfSale;


class PriceFormatter
{
    private string $currencySymbol;

    /**
     * PriceFormatter constructor.
     * @param string $currencySymbol
     */
    public function __construct(
        string $currencySymbol
    ) {
        $this->currencySymbol = $currencySymbol;
    }

    public function formatPrice(float $price):string
    {
        return $this->currencySymbol. number_format($price, 2, '.', ',');
    }
}