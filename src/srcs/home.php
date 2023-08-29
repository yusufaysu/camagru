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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/post.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@700&display=swap" rel="stylesheet">
        <title>Camagru</title>
    </head>
    <body style='background: #29372e'>
        <header>
            <link rel="stylesheet" href="header.css">
            <link href="https://fonts.googleapis.com/css?family=Montserrat:500&display=swap" rel="stylesheet">
            <a class="logo" href="/"><img src="../images/logo.png" alt="logo"></a>
            <div class="cta_content">
                <a class="cta" href="#">Settings</a>
                <a class="cta" href="#">Post</a>
                <a class="cta" href="signout.php">Signout</a>
            </div>
            <p class="menu cta">Menu</p>
        </header>
        <div class="overlay">
            <a class="close">&times;</a>
            <div class="overlay__content">
                <a href="#">Settings</a>
                <a href="#">Post</a>
                <a href="signout.php">Signout</a>
            </div>
        </div>
        <script type="text/javascript" src="../scripts/header.js"></script>

        <div class="post-container">
            <div class="post">
                <div class="user-profile">
                    <img src="../images/star.png" alt="Profile Image" class="profile-image">
                    <span class="username"><?php echo $username;?></span>
                </div>
                <img src="../images/post_image.jpg" alt="Post Image">
                <div class="post-info">
					<div class="block-1">
                        <span class="date">21/08.2023</span>
					</div>
					<div class="block-2">
						<span class="likes">100👍</span>
						<button class="like-button">Beğen</button>
					</div>
                </div>
                <div class="comments">
                    <div class="comment">user1: selam!!</div>
                    <div class="comment">user2: selam!!</div>
                </div>
                <div class="comment-input">
                    <input type="text" id="commentText" placeholder="Yorum yap...">
                    <button onclick="addComment()">Yorum Yap</button>
                </div>
            </div>
        </div>


        <div class="post-container">
            <div class="post">
                <div class="user-profile">
                    <img src="../images/me.jpeg" alt="Profile Image" class="profile-image">
                    <span class="username"><?php echo $username;?></span>
                </div>
                <div class="image">
                    <img src="../images/star.png" alt="Post Image">
                </div>
                <div class="post-info">
					<div class="block-1">
                        <span class="date">21/08.2023</span>
					</div>
					<div class="block-2">
						<span class="likes">100👍</span>
						<button class="like-button">Beğen</button>
					</div>
                </div>
                <div class="comments">
                    <div class="comment">user1: selam!!</div>
                    <div class="comment">user2: selam!!</div>
                </div>
                <div class="comment-input">
                    <input type="text" id="commentText" placeholder="Yorum yap...">
                    <button onclick="addComment()">Yorum Yap</button>
                </div>
            </div>
        </div>

        <div class="post-container">
            <div class="post">
            <img src="../images/user_avatar.png" alt="Post Image">
            <div class="post-info">
                <span class="username"><?php echo $username;?></span>
                <span class="date">date_here</span>
                <span class="likes">like_count_here</span>
            </div>
            <div class="comments">
                <div class="comment">user1: selam!!</div>
                <div class="comment">user2: selam!!</div>
            </div>
            <div class="comment-input">
                <input type="text" id="commentText" placeholder="Yorum yap...">
                <button onclick="addComment()">Yorum Yap</button>
            </div>
        </div>

        <div class="post-container">
            <div class="post">
            <img src="../images/logo.png" alt="Post Image">
            <div class="post-info">
                <span class="username"><?php echo $username;?></span>
                <span class="date">date_here</span>
                <span class="likes">like_count_here</span>
            </div>
            <div class="comments">
                <div class="comment">user1: selam!!</div>
                <div class="comment">user2: selam!!</div>
            </div>
            <div class="comment-input">
                <input type="text" id="commentText" placeholder="Yorum yap...">
                <button onclick="addComment()">Yorum Yap</button>
            </div>
        </div>


    </body>
</html>
