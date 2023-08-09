<?php
    $host='db';
    $root='root';
    $dbPassword='123';
    $dbName='camagru';

    $db = mysqli_connect($host, $root, $dbPassword, $dbName);
    mysqli_set_charset($db, "UTF8");

    if (!$db){
        echo "Connection failed!";
    }
?>