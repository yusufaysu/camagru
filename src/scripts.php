<?php
    function connectDB(){
        $host='db';
        $root='root';
        $dbPassword='123';
        $dbName='camagru';
        
        $conn = new mysqli($host, $root, $dbPassword, $dbName);
        
        if ($conn->connect_error){
            die("Connection error: " . $conn->connect_error);
        }
        return $conn;
    }
        
    function checkUserToIndex(array $arr, $str){
        if(!isset($arr[$str])){
            header('location:/');
        }
    }

    // Çıkış işlemini gerçekleştiren fonksiyon
    function signout() {
        session_unset(); // Oturum değişkenlerini temizle
        session_destroy(); // Oturumu sonlandır
    }
?>