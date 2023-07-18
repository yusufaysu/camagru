<?php
    include('../dbConnect.php');

    if (isset($_POST['submit'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $passwordCorrect=$_POST['passwordCorrect'];

        //need email varification 

        $sql = 0;
        if ($password == $passwordCorrect){
            $sql = mysqli_query($db, "INSERT INTO users(email, password) VALUES('$email', '$password')");
            //mail duplicate check
            if ($sql != 1){
                echo "This email is already exists.";
                mysqli_close($db);
                exit();
            }
        }else{
            echo "Passwords are not matching!!!";
            mysqli_close($db);
            exit();
        }
        mysqli_close($db);
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
            <a class="cta" href="./login.php">Login</a>
        </div>
        <p class="menu cta">Menu</p>
    </header>
    <div class="overlay">
        <a class="close">&times;</a>
        <div class="overlay__content">
            <a href="../index.php">Home</a>
            <a href="./login.php">Login</a>
        </div>
    </div>
    <script type="text/javascript" src="../scripts/header.js"></script>

    <div class="login-page">
        <div class="form">
            <form class="login-form" action="signup.php" method="POST">
            <input type="email" placeholder="email" name="email"/>
            <input type="password" placeholder="password" name="password"/>
            <input type="password" placeholder="password correct" name="passwordCorrect"/>
            <button name="submit">Sign up</button>
            <p class="message">Already registered? <a href="./login.php">Login</a></p>
            </form>
        </div>
    </div>
    
</body>
</html>