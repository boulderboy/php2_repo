<?php
session_start();
require_once "config.php";

//try {
//    $dbh = new PDO("mysql:dbname=".MYSQL_DB.";host=".MYSQL_SERVER, MYSQL_LOGIN, MYSQL_PASSWORD);
//} catch (PDOException $e) {
//    echo "Error: Could not connect. " . $e->getMessage();
//}
//
//$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$connect = mysqli_connect(MYSQL_SERVER,MYSQL_LOGIN,MYSQL_PASSWORD,MYSQL_DB) or die("Error: ".mysqli_error($connect));

mysqli_query($connect, "SET NAMES 'utf8'"); 
mysqli_query($connect, "SET CHARACTER SET 'utf8'");

if(!mysqli_set_charset($connect, "utf8")){
    printf("Error: ".mysqli_error($connect));
}
