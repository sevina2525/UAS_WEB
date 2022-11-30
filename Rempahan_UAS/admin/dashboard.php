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
    <title>Dashboard Admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kristi&family=Oswald:wght@300&family=Poppins:wght@200&family=Roboto+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../stylesheet/style.css">
    <link rel="stylesheet" href="../stylesheet/dark.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/footers/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbars-offcanvas/">
    <!-- Custom styles for this template -->
    <link href="../stylesheet/navbar.css" rel="stylesheet">
</head>

<body>
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <nav class="navbar navbar-expand-lg nav-light bg-light" aria-label="Light offcanvas navbar">
        <div class="container-fluid">
            <h1 class="navbar-brand" href="#"><b>RempahanRempah</b></h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarLight" aria-controls="offcanvasNavbarLight">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarLight" aria-labelledby="offcanvasNavbarLightLabel">
                <div class="offcanvas-header">
                    <h2 class="mb-3 mb-md-0 text-muted"><b>Menu</b></h2>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="logout.php">Logout</a>
                        </li>
                            <div class="swicth-mode">
                                <input type="checkbox" id="mode" onclick="ubahWarna()">
                            </div>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <br>
    <div class= "main-dashboard">
        <div class = "dashboard">
            <h1 class = "head" >DASHBOARD</h1> <br>
            <p>Selamat Datang,</p>
            <p>Admin RempahanRempah</p>
        </div>
        <div class="box">
            <a href="admin_data_kesehatan.php">
                <div>
                    <p>Data Konten Kesehatan<p>
                    <img src="../gambar/kesehatan.png" alt="user-icon" width=200px>
                </div>
            </a>
            <a href="admin_data_kuliner.php">
                <div>
                    <p>Data Konten Kuliner<p>
                    <img src="../gambar/kuliner.jpg" alt="user-icon" width=200px>
                </div>
            </a>
            <a href="admin_data_kecantikan.php">
                <div>
                    <p>Data Konten Kecantikan</p>
                    <img src="../gambar/kecantikan.jpg" alt="user-icon" width=185px>
                </div>
            </a>
        </div>
    </div>
    
    
    <script src="../js/js.js"></script>
    
</body>

</html>