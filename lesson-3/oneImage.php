<?php
require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();

try {
    $loader = new Twig_Loader_Filesystem('templates');

    $twig = new Twig_Environment($loader);

    $template = $twig->loadTemplate('oneImaage.tmpl');

    $content = $template->render(array('name' => $_GET['name'], 'format'=>$_GET['format'], 'id' => $_GET['id']));
    echo $content;

} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}
?>
