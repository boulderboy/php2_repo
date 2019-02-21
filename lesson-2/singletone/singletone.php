<?php
trait Singleton
{

    private function __construct() {

    }

    public static function Instance()
    {
        static $instance = null;
        if (is_null($instance)) {
            $instance = new self();
        }
        return $instance;
    }
}

class MyClass
{
    use Singleton;
}

