<?php
include 'Twig/Autoloader.php';
Twig_Autoloader::register();

// подключение к бд
try {
  $dbh = new PDO('mysql:dbname=gallery;host=gb-php', 'root', '');
} catch (PDOException $e) {
  echo "Error: Could not connect. " . $e->getMessage();
}

// установка error режима
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// выполняем запрос
try {
  // формируем SELECT запрос
  // в результате каждая строка таблицы будет объектом
  $sql = "SELECT * FROM path";
  $sth = $dbh->query($sql);
  while ($row = $sth->fetchObject()) {
    $data[] = $row;
  }
  
  // закрываем соединение
  unset($dbh); 

  var_dump($data);	
//	
//  $loader = new Twig_Loader_Filesystem('templates');
//  
//  $twig = new Twig_Environment($loader);
//  
//  $template = $twig->loadTemplate('countries2.tmpl');
//
//  echo $template->render(array (
//    'data' => $data
//  ));
  
} catch (Exception $e) {
  die ('ERROR: ' . $e->getMessage());
}
?>