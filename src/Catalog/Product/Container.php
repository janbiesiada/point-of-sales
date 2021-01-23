<?php

declare(strict_types=1);

namespace JBdev\PointOfSale\Catalog\Product;

use Exception;
use JBdev\PointOfSale\Catalog\Product;
use JBdev\PointOfSale\Catalog\Product\Container\Item;

class Container
{
    /**
     * @var Item[]
     */
    private array $items;

    /**
     * @param Item[] $items
     */
    public function __construct(
        array $items = null
    ) {
        $this->items = $items ?? [];
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product):void
    {
        $code = $product->getCode();
        if(!$this->hasProductItem($code)){
            $this->items['item_'. $code] = new Item($product,1);
            return;
        }
        $item = $this->items['item_'. $code];
        $item->setQty($item->getQty()+1);
    }

    /**
     * @param Product $product
     */
    public function removeProduct(Product $product):void
    {
        $code = $product->getCode();
        if(!$this->hasProductItem($code)){
            return;
        }
        $item = $this->getProductItem($code);
        if($item->getQty() == 1){
            unset($this->items['item_'. $code]);
        }
        $item->setQty($item->getQty()-1);
    }

    /**
     * @param string $code
     * @return bool
     */
    public function hasProductItem(string $code):bool
    {
        return isset($this->items['item_'. $code]);
    }

    /**
     * @param string $code
     * @return Item|null
     */
    private function getProductItem(string $code):?Item
    {
        if(!$this->hasProductItem($code)){
            return null;
        }
        return $this->items['item_' . $code];
    }

    /**
     * @param string $code
     * @return Product|null
     * @throws Exception
     */
    public function popProduct(string $code):?Product
    {
        if(!$this->hasProductItem($code)){
            throw new Exception('There is no product with ' .$code.' code');
        }
        $product = $this->getProductItem($code)->getProduct();
        $this->removeProduct($product);
        return $product;
    }

    /**
     * @return float
     */
    public function getTotal():float
    {
        $total = 0;
        foreach ($this->items as $item){
            $total+=$item->getTotal();
        }
        return $total;
    }
}