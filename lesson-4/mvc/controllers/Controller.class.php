<?php

abstract class Controller {

    abstract function render($tmplName);

    protected function IsPost () {
        return $_SERVER["REQUEST_METHOD"] === "POST";
    }

    protected function IsGet () {
        return $_SERVER["REQUEST_METHOD"] === "GET";
    }

    protected function Template($tmplName, $vars = array()){

        Twig_Autoloader::register();
        try {
            $loader = new Twig_Loader_Filesystem('templates/');
            $twig = new Twig_Environment($loader);
            $template = $twig->loadTemplate($tmplName);
            $content = $template->render($vars);
            echo $content;
        } catch (Exception $e) {
            die ('ERROR: ' . $e->getMessage());
        }
    }

    public function __call($name, $arguments){
        die("Нет такого адреса");
    }
}