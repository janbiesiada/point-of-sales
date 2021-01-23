<?php

declare(strict_types=1);


namespace JBdev\PointOfSale;


use JBdev\PointOfSale\Catalog\Product;
use JBdev\PointOfSale\Catalog\Product\Container;

class ContainerCreator
{
    public static function create(\SimpleXMLElement $items):Container
    {
        $container = new Container();
        $productArray = (array) $items;
        foreach ($productArray as $item){
            $product = new Product((string) $item->code, (float) $item->unit_price);
            foreach ((array)$item->volume_prices as $volume_price){
                $product->setVolumePrice((int) $volume_price->qty,(float)$volume_price->value);
            }
            for($i = 0; $i<(int)$item->initial_qty;$i++) {
                $container->addProduct($product);
            }
        }
        return $container;
    }

}