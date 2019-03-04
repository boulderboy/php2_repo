<?php
session_start();
require_once "config.php";

class Database
{
    public $connect;

function __construct()
{
    $this->connect = mysqli_connect(Config::MYSQL_SERVER,
        Config::MYSQL_LOGIN,
        Config::MYSQL_PASSWORD,
        Config::MYSQL_DB);
    mysqli_query($this->connect, "SET NAMES 'utf8'");
    mysqli_query($this->connect, "SET CHARACTER SET 'utf8'");

    if (!mysqli_set_charset($this->connect, "utf8"))
    {
        printf("Error: ".mysqli_error($this->connect));
    }
}
}
