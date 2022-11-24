<?php
    session_start();
    if ( !isset($_SESSION['login'])){
        header("Location: admin_login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RempahanRempah</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kristi&family=Oswald:wght@300&family=Poppins:wght@200&family=Roboto+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../stylesheet/style.css?v2">
    <link rel="stylesheet" href="../stylesheet/dark.css?v6">
        
</head>
<body >
<nav class="navbar" id="web">
        <h1 id="home">RempahanRempah</h1>
        <div class="nav-menu">
            <a style="text-decoration:none" href="logout.php"><p>Logout</p></a>
            <div class="swicth-mode"> 
                <input type="checkbox" id = "mode" onclick="ubahWarna()">
            </div>
        </div>
    </nav>
    <div class= "main-dashboard">
        <div class = "walcome">
            <h1 class = "head">DASHBOARD</h1>
            <p>Selamat Datang,</p>
            <p>Admin RempahanRempah</p>
        </div>
        <div class="box">
            <a href="admin_data_kesehatan.php">
                <div>
                    <h2>Data Konten Kesehatan</h2>
                    <img src="../gambar/kesehatan.png" alt="user-icon" width=100px>
                </div>
            </a>
            <a href="admin_data_kuliner.php">
                <div>
                    <h2>Data Konten Kuliner</h2>
                    <img src="../gambar/kuliner.jpg" alt="song-icon" width=100px>
                </div>
            </a>
            <a href="admin_data_kecantikan.php">
                <div>
                    <h2>Data Konten Kecantikan</h2>
                    <img src="../gambar/kecantikan.jpg" alt="song-icon" width=100px>
                </div>
            </a>
        </div>
    </div>
    
    <script src="../js/js.js"></script>
    
</body>

</html>