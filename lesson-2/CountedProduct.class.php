<?php
include 'Product.class.php';

class CountedProduct extends Product {
    private $quantity;

    function __construct($name, $price, $type,$quantity)
    {
        parent::__construct($name, $price, $type);
        $this->setQuantity($quantity);
    }

    function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    function getQuantity() {
        return $this->quantity;
    }

    function CalculateFinalPrice() {
        return $this->getPrice() * $this->getQuantity();
    }

    function getProfit()
    {
        self::$profit = $this->calculateFinalPrice() - $this->getPurchaseValue() * $this->getQuantity();
    }
}