<?php
    session_start();

    if (!isset($_SESSION['user_id'])) {
        // Kullanıcı giriş yapmamışsa, otomatik olarak giriş sayfasına yönlendir
        header("Location: ./login.php");
        exit();
    }

    // Giriş yapmış kullanıcının verilerini almak için veritabanı sorgusu
    include('../scripts.php');
    $user_id = $_SESSION['user_id'];

    $conn = connectDB();
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        // Kullanıcı verilerine erişim
        $username = $row['username'];
        $email = $row['email'];
    } else {
        // Kullanıcı verileri alınamazsa, hata mesajı veya diğer işlemler
        header("location:./login.php");
    }

    $stmt->close();
    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../styles/header.css">
        <title>Camagru</title>
    </head>
    <body style='background: #29372e'>
        <header>
            <link rel="stylesheet" href="header.css">
            <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
            <a class="logo" href="/"><img src="../images/logo.png" alt="logo"></a>
            <div class="cta_content">
                <a class="cta" href="#">Profile</a>
                <a class="cta" href="#">Post</a>
                <a class="cta" href="signout.php">Signout</a>
            </div>
            <p class="menu cta">Menu</p>
        </header>
        <div class="overlay">
            <a class="close">&times;</a>
            <div class="overlay__content">
                <a href="#">Profile</a>
                <a href="#">Post</a>
                <a href="signout.php">Signout</a>
            </div>
        </div>
        <script type="text/javascript" src="../scripts/header.js"></script>

        welcome <?php echo $username;?>


    </body>
</html>

