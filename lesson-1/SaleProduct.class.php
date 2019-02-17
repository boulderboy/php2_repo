<?php
include "Product.class.php";

/**
 * Наследник класса ProductCard
 * Методы __construct и render прод реализуют полиморфизм путем изменения методов базового класса ProductCard
 * Метод calculateFinalPrice является собственным методом данного класса вычисляющим стоимость товара со скидкой.
 */
class SaleProduct extends ProductCard {
    private $discount;

    function __construct($name, $price, $description, $discount)
    {
        parent::__construct($name, $price, $description);
        $this -> setDiscount($discount);
    }

    function setDiscount($discount) {
        $this -> discount = $discount;
    }

    function getDiscount() {
        return $this->discount;
    }

    function calculateFinalPrice() {
        return $this->getPrice() - $this->getPrice() * ($this->getDiscount() * 0.01);
    }

    function renderProd()
    {
        parent::renderProd();
        echo "<p style='color: red'>На меня действует скидка " . $this -> getDiscount() . "%</p>".
              "Теперь я стою: <span style='color:red;'>". $this -> calculateFinalPrice() ."руб</span>";
    }

}

$sale = new SaleProduct('ТОВАР СО СКИДКОЙ', 1200, 'описание', 10);

$sale -> renderProd();