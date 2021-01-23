<?php

declare(strict_types=1);


namespace JBdev\PointOfSale;


use Exception;
use JBdev\PointOfSale\Catalog\Product\Container;

class Terminal
{
    /**
     * @var Container
     */
    private Container $inventory;
    /**
     * @var Container
     */
    private Container $cart;
    /**
     * @var Exception[]
     */
    private array $errors = [];

    public function __construct(
        Container $inventory = null,
        Container $cart = null
    ) {
        $this->inventory = $inventory ?? new Container();
        $this->cart = $cart ?? new Container();
    }

    public function scan(string $code):void
    {
        try {
            $this->cart->addProduct($this->inventory->popProduct($code));
        } catch (Exception $exception) {
            $this->errors[] = $exception;
        }
    }

    public function getCartTotal():float
    {
        return $this->cart->getTotal();
    }

    /**
     * @return Exception[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

}