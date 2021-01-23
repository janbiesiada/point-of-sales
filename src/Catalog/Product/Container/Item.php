<?php

declare(strict_types=1);

namespace JBdev\PointOfSale\Catalog\Product\Container;

use JBdev\PointOfSale\Catalog\Product;

class Item
{
    /**
     * @var Product
     */
    private Product $product;
    /**
     * @var int
     */
    private int $qty;
    /**
     * @var string
     */
    private string $itemCode;

    public function __construct(
        Product $product,
        int $qty = 0
    ) {
        $this->itemCode = 'item_'.$product->getCode();
        $this->product = $product;
        $this->qty = $qty;
    }

    /**
     * @return int
     */
    public function getQty(): int
    {
        return $this->qty;
    }

    /**
     * @param int $qty
     */
    public function setQty(int $qty): void
    {
        $this->qty = $qty;
    }

    public function getTotal():float
    {
        if($this->product->hasVolumePrice($this->getQty())){
            return $this->product->getVolumePrice($this->getQty());
        }
        return $this->getQty() * $this->product->getUnitPrice();
    }

    /**
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }
}