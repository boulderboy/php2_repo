<?php
include_once ("Controller.class.php");

abstract class C_Base extends Controller {
    protected $title;
    protected $content;

    function __construct() {
        $this->title = "Name";
        $this->content = '';
    }

    function render($tmplName)
    {
        $vars = array("title"=>$this->title, "content"=>$this->content);
        $page = $this->Template($tmplName, $vars);
        echo $page;
    }
}