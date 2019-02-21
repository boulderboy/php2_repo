<?php
class A {
    private $a;

    function __construct($a)
    {
        $this->setA($a);
    }

    function setA($a) {
        $this->a = $a;
    }

    function getA(){
        return $this->a;
    }
}

class B extends A {

}

$obj = new B(5);

$obj->setA(6);

echo $obj->getA();

