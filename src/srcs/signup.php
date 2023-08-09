<?php
    include('../dbConnect.php');

    if (isset($_POST['submit'])){
        $email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];
        $passwordCorrect=$_POST['passwordCorrect'];
        
        $errors = array();

        if (empty($email) || empty($username) || empty($password) || empty($passwordCorrect)){
            $errors['blank'] = "You can't leave any blank.";
        }

        //need email varification 

        if ($password == $passwordCorrect){
            try {
                $sql = mysqli_query($db, "INSERT INTO users(email, username, password) VALUES('$email', '$username', '$password')");
                header( "refresh:3;url=./home.php" );
                $errors['success'] = "Registration is successful, you are being redirected to login in 3 seconds.";
            }catch(mysqli_sql_exception $e){
                $errors['duplicate'] = "Username or Email is already taken.";
            }
        }else{
            $errors['notMatch'] = "Passwords are not matching";
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
            <a class="cta" href="/">Home</a>
            <a class="cta" href="./login.php">Login</a>
        </div>
        <p class="menu cta">Menu</p>
    </header>

    <div class="overlay">
        <a class="close">&times;</a>
        <div class="overlay__content">
            <a href="/">Home</a>
            <a href="./login.php">Login</a>
        </div>
    </div>
    <script type="text/javascript" src="../scripts/header.js"></script>

    <div class="login-page">
        <div class="form">
            <form class="login-form" action="signup.php" method="POST">
            <p style="color: red">
            <?php
                if (isset($errors['blank'])){
                    echo $errors['blank'];
                }
                else if(isset($errors['duplicate'])){
                    echo $errors['duplicate'];
                }
                else if(isset($errors['notMatch'])){
                    echo $errors['notMatch'];
                }
            ?>
            </p>
            <p style="color: green"><?php if(isset($errors['success'])){ echo $errors['success'];} ?></p>
            <input type="username" placeholder="username" name="username"/>
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