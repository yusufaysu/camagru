<?php
    include('../dbConnect.php');

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = mysqli_query($db, "SELECT id FROM users WHERE email = '$email' and password = '$password'");
        $count = mysqli_num_rows($sql);

        
        if ($count == 1){
            echo "loool";
        }
        else if ($count > 1){
            echo "ÆHÆ";
        }else{
            echo "Email or password is invalid!!!";
            mysqli_close($db);
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/login.css">
        <link rel="stylesheet" href="../styles/header.css">
        <title>Document</title>
    </head>
    <body>
    <header>
        <link rel="stylesheet" href="header.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
        <a class="logo" href="/"><img src="../images/logo.png" alt="logo"></a>
        <nav>
        </nav>
        <div class="cta_content">
            <a class="cta" href="../index.php">Home</a>
            <a class="cta" href="./signup.php">Sign up</a>
        </div>
        <p class="menu cta">Menu</p>
    </header>
    <div class="overlay">
        <a class="close">&times;</a>
        <div class="overlay__content">
            <a href="../index.php">Home</a>
            <a href="./signup.php">Sign up</a>
        </div>
    </div>
    <script type="text/javascript" src="../scripts/header.js"></script>

    <div class="login-page">
        <div class="form">
            <form class="login-form" action="login.php" method="POST">
            <input type="email" placeholder="email" name="email"/>
            <input type="password" placeholder="password" name="password"/>
            <button name="submit">login</button>
            <p class="message">Not registered? <a href="./signup.php">Create an account</a></p>
            </form>
        </div>
    </div>
    
</body>
</html>