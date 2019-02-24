<?php
require_once 'Twig/Autoloader.php';
include 'modules/config.php';
Twig_Autoloader::register();

$sql = 'SELECT * FROM path';

$res = mysqli_query(connect(), $sql);

$photos = [];

while ($row = mysqli_fetch_assoc($res)){
    $photos[$row['id']] = ['name' => $row['name'], 'format' => $row['format'], 'id' => $row['id']];
}

try {
    $loader = new Twig_Loader_Filesystem('templates');

    $twig = new Twig_Environment($loader);

    $template = $twig->loadTemplate('gallery.tmpl');

    $content = $template->render(array('photos' => $photos));
    echo $content;

} catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
}
?>