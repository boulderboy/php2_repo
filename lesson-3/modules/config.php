<?php
const SERVER = 'gb-php';
const USER = 'root';
const PASSWORD = '';
const DATABASE = 'gallery';

function connect() {
    static $link;
    if (empty($link)) {
        $link = mysqli_connect(SERVER, USER, "", DATABASE);
    }
    return $link;
}