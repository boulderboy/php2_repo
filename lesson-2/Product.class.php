<?php

abstract class Product{
    private $name;
    private $price;
    private $type;
    private static $purchaseValue;
    static $profit;

    function setName($name){
        $this->name = $name;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setType($type){
        $this->type = $type;
    }

    function setPurchaseValue($purchaseValue){
        $this->purchaseValue = $purchaseValue;
    }

    function getName(){
        return $this->name;
    }

    function getPrice() {
        return $this->price;
    }

    function getType(){
        return $this->type;
    }

    function getPurchaseValue(){
        return $this->purchaseValue;
    }

    function getProfit() {
        self::$profit = $this->calculateFinalPrice() - $this->getPurchaseValue();
    }

    function __construct($name, $price, $type)
    {
        $this->setName($name);
        $this->setPrice($price);
        $this->setType($type);
    }

    function addProfit() {
        self::$profit += $this->calculateFinalPrice();
    }

    abstract function calculateFinalPrice();

}