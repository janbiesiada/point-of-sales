<?php

declare(strict_types=1);


namespace JBdev\PointOfSale;


class Request
{
    /**
     * @return string
     */
    public function getAction(): string
    {
        return $_SERVER['PHP_SELF'];
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        $products = [];
        $productCodes = $this->getProductCodes()?str_split($this->getProductCodes()):[];
        foreach($productCodes as $code){
            $products[]=$code;
        }
        return $products;
    }

    public function getProductCodes():string
    {
        if (isset($_POST["submit"])) {
            return $_POST["product_txt"];
        }
        return '';
    }
}