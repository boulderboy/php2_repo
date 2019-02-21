<?php
include 'Product.class.php';
class FriableProduct extends Product {

    function CalculateFinalPrice() {
        return $this->getPrice()/2;
    }
}