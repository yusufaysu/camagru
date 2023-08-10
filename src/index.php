<?php
    session_start();

    if (isset($_SESSION['user_id'])){
        header("location:./srcs/home.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./styles/header.css">
        <title>Camagru</title>
    </head>
    <body style='background: #29372e'>
        <header>
            <link rel="stylesheet" href="header.css">
            <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
            <a class="logo" href="/"><img src="./images/logo.png" alt="logo"></a>
            <nav>
                <ul class="nav__links">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Github</a></li>
                    <li><a href="#">Intra</a></li>
                </ul>
            </nav>
            <div class="cta_content">
                <a class="cta" href="./srcs/signup.php">Sign up</a>
                <a class="cta" href="./srcs/login.php">Login</a>
            </div>
            <p class="menu cta">Menu</p>
        </header>
        <div class="overlay">
            <a class="close">&times;</a>
            <div class="overlay__content">
                <a href="#">Home</a>
                <a href="#">Github</a>
                <a href="#">Intra</a>
                <a href="#">Sign up</a>
                <a href="./srcs/login.php">Login</a>
            </div>
        </div>
        <script type="text/javascript" src="./scripts/header.js"></script>


    </body>
</html>

