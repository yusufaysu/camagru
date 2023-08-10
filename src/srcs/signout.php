<?php

    session_start(); // Oturumu başlat
    include "../scripts.php";

    signout();
    header("Location:/");
    exit();

?>