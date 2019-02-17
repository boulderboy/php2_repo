<?php

/**
 * Базовый класс составляющий карточку продукта. Есть три приватных свойства $name, $price, $description
 * так же для этих свойств есть сеттеры и геттеры
 * Метод renderProd выводит на экран информацию о товаре.
 */
class ProductCard {
    private $name;
    private $price;
    private $description;

    function __construct($name, $price, $description)
    {
        $this -> setName($name);
        $this -> setPrice($price);
        $this -> setDescription($description);
    }

    function setName($name) {
        $this -> name = $name;
    }

    function setPrice($price) {
        $this -> price = $price;
    }

    function setDescription($descripton) {
        $this -> description = $descripton;
    }

    function getName() {
      return  $this -> name;
    }

    function getPrice() {
       return $this -> price;
    }

    function getDescription() {
        return $this -> description;
    }

    function renderProd () {
        echo "Я товавр под названием " . $this -> getName() . ", я стою " . $this -> getPrice() .
             "<br> Вот немного информации обо мне:<br>" . $this -> getDescription()."<br>";
    }
}

$prod = new ProductCard('name', 1500, 'blah-blah-blah');
$prod -> renderProd();