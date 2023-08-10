<?php
    include('../scripts.php');

    session_start();

    if (isset($_SESSION['user_id'])){
        header("location:./home.php");
        exit();
    }

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        $errors = array();

        if (empty($email) || empty($password)){
            $errors['blank'] = "You can't leave any blank.";
        }else {
            $conn = connectDB();
            $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
    
            if ($row = $result->fetch_assoc()) {
                // Kullanıcının girdiği şifreyi doğrula
                if ($password == $row['password']) {
                    $_SESSION['user_id'] = $row['id'];
                    header("Location: ./home.php");
                    exit();
                } else {
                    $errors['invalid'] = "Invalid email or password";
                }
            } else {
                $errors['invalid'] = "Invalid email or password";
            }
    
            $stmt->close();
            $conn->close();
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
            <a class="cta" href="./signup.php">Sign up</a>
        </div>
        <p class="menu cta">Menu</p>
    </header>

    <div class="overlay">
        <a class="close">&times;</a>
        <div class="overlay__content">
            <a href="/">Home</a>
            <a href="./signup.php">Sign up</a>
        </div>
    </div>
    <script type="text/javascript" src="../scripts/header.js"></script>

    <div class="login-page">
        <div class="form">
            <form class="login-form" action="login.php" method="POST">
            <p style="color: red">
            <?php
                if (isset($errors['blank'])){
                    echo $errors['blank'];
                }
                else if(isset($errors['invalid'])){
                    echo $errors['invalid'];
                }
            ?>
            </p>
            <input type="email" placeholder="email" name="email"/>
            <input type="password" placeholder="password" name="password"/>
            <button name="submit">login</button>
            <p class="message">Not registered? <a href="./signup.php">Create an account</a></p>
            </form>
        </div>
    </div>
    
</body>
</html>