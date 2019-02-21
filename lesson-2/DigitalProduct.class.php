<?php
include 'Product.class.php';
class DigitalProduct extends Product {

    function CalculateFinalPrice() {
        return $this->getPrice()/2;
    }
}

