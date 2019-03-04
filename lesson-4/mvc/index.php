<?php
include_once ('controllers/C_Page.class.php');
require_once 'Twig/Autoloader.php';

$controller = new C_Page();
$controller->action_index();
$controller->render('test.tmpl');
