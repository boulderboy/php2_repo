<?php
include ('C_Base.class.php');
include ('../models/Model.php');
include ('../config/database.php');


class Config {
    const MYSQL_SERVER = "gb-php";
    const MYSQL_LOGIN = "root";
    const MYSQL_PASSWORD = '';
    const MYSQL_DB = "DBfromGB";
    const DIR_BIG = "img/";
    const DIR_SMALL = "imgMini/";
    const COLS = 3;
}


class Model
{
    function getAll($connect, $table, $orderby = 'id', $lastViewed = 0)
    {
        $query = "SELECT * FROM {$table} order by {$orderby} desc LIMIT {$lastViewed},10";

//    try {
//
//        $sql = $query;
//        $result = $dbh->query($sql);
//    } catch (PDOException $e) {
//    echo "Error: Could not connect. " . $e->getMessage();
//}
        $result = mysqli_query($connect, $query);

        if (!$result)
            die(mysqli_error($connect));

        $n = mysqli_num_rows($result);
        $res = array();

        for ($i = 0; $i < $n; $i++) {
            $row = mysqli_fetch_assoc($result);
            //$row = $dbh::FETCH_ASSOC($result);
            $row['number'] = $lastViewed + $i + 1;
            $res[] = $row;
        }

        return $res;
    }
}

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


class C_Page extends C_Base {

    protected $connect;
    protected $model;

    function __construct()
    {
        parent::__construct();
        $this->connect = new Database();
        $this->model = new Model();
    }

    function action_index(){

        $this->title = "Catalog";
        $this->content = $this->Template('index.tmpl', array("goods"=>$this->model->getAll($this->connect->connect, 'goods')));


    }
}