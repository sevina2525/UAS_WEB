<?php
    require('../koneksi.php');
    session_start();
    if ( !isset($_SESSION['login'])){
        header("Location: admin_login.php");
        exit;
    }
?>

<?php
    if(isset($_GET['id_kesehatan'])){
        $id_kesehatan = $_GET['id_kesehatan'];
        $hasil_kesehatan = mysqli_query($conn, "SELECT * FROM kesehatan WHERE id_kesehatan = '".$id_kesehatan."' ");
        $row_kesehatan = mysqli_fetch_array($hasil_kesehatan);
        $row_kuliner = 0;
        $row_kecantikan = 0;
        $id_kuliner = 0;
        $id_kecantikan = 0;
    }
    elseif(isset($_GET['id_kuliner'])){
        $id_kuliner = $_GET['id_kuliner'];
        $hasil_kuliner = mysqli_query($conn, "SELECT * FROM kuliner WHERE id_kuliner = '".$id_kuliner."' ");
        $row_kuliner = mysqli_fetch_array($hasil_kuliner);
        $row_kesehatan = 0;
        $row_kecantikan = 0;
        $id_kesehatan = 0;
        $id_kecantikan = 0;
    }
    elseif(isset($_GET['id_kecantikan'])){
        $id_kecantikan = $_GET['id_kecantikan'];
        $hasil_kecantikan = mysqli_query($conn, "SELECT * FROM kecantikan WHERE id_kecantikan = '".$id_kecantikan."' ");
        $row_kecantikan = mysqli_fetch_array($hasil_kecantikan);
        $row_kesehatan = 0;
        $row_kuliner = 0;
        $id_kecantikan = 0;
        $id_kuliner = 0;
    }

    date_default_timezone_set("Asia/Makassar");
    if(isset($_POST['submit'])){
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $tanggal= date('d/m/Y H:i:s');
        $resep = $_POST['resep'];
        

        $sql_upload_kuliner = mysqli_query($conn,"UPDATE `kuliner` SET `judul`='".$judul."',`deskripsi`= '".$deskripsi."',`tanggal`='".$tanggal."',`resep`='".$resep."' WHERE `id_kuliner` = '".$id_kuliner."'");
        $sql_upload_kesehatan = mysqli_query($conn,"UPDATE `kesehatan` SET `judul`='".$judul."',`deskripsi` = '".$deskripsi."',`tanggal`='".$tanggal."',`resep`='".$resep."' WHERE `id_kesehatan` = '".$id_kesehatan."'");
        $sql_upload_kecantikan = mysqli_query($conn,"UPDATE `kecantikan` SET `judul`='".$judul."',`deskripsi`= '".$deskripsi."',`tanggal`='".$tanggal."', `resep`='".$resep."'WHERE `id_kecantikan` = '".$id_kecantikan."'");
        if($sql_upload_kesehatan){
            echo '<script language = "javascript">
            alert("Data Berhasil Di Input") ;document.location = "dashboard.php";</script>';    
        }
        elseif($sql_upload_kuliner){
            echo '<script language = "javascript">
            alert("Data Berhasil Di Input") ;document.location = "dashboard.php";</script>';    
        }
        elseif($sql_upload_kecantikan){
            echo '<script language = "javascript">
            alert("Data Berhasil Di Input") ;document.location = "dashboard.php";</script>';    
        }
        else{
            echo '<script language = "javascript">
            alert("Data Gagal Di Input");document.location = "admin.php"; </script>' ;    
        }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../stylesheet/style.css">
    <link rel="stylesheet" href="../stylesheet/dark.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbars-offcanvas/">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../stylesheet/navbar.css" rel="stylesheet">
    <link href="../stylesheet/form.css" rel="stylesheet">
        
</head>
<body class="text-center">
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <nav class="navbar" id="web">
        <h1 id="home">RempahanRempah</h1>
        <div class="nav-menu">
            <a style="text-decoration:none" href="dashboard.php"><p>Dashboard</p></a>
            <a style="text-decoration:none" href="logout.php"><p>Logout</p></a>
            <div class="swicth-mode"> 
                <input type="checkbox" id = "mode" onclick="ubahWarna()">
            </div>
        </div>
    </nav> -->
    <main class="form-signin w-100 m-auto">
    <nav class="navbar navbar-expand-lg nav-light bg-light " aria-label="Offcanvas navbar large">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">RempahanRempah</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar2" aria-controls="offcanvasNavbar2">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasNavbar2" aria-labelledby="offcanvasNavbar2Label">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbar2Label">Menu</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
                        </li>
                            <div class="swicth-mode">
                                <input type="checkbox" id="mode" onclick="ubahWarna()">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
        <h1 class="h3 mb-3 fw-normal"><b>Edit Konten</b></h1>
            <div>
            <div class="form-floating">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class = "form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="judul" placeholder="Judul" value = "<?php 
                        
                            if($row_kesehatan> 1){
                                echo $row_kesehatan['judul'];
                            }
                            elseif($row_kuliner> 1){
                                echo $row_kuliner['judul'];
                            }
                            elseif($row_kecantikan> 1){
                                echo $row_kecantikan['judul'];
                            }
                            
                            
                        ?>" ><label for="floatingInput">Judul</label>
                        </div>
                        <div class = "form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="deskripsi" placeholder="Deskripsi" value = "<?php 
                            if($row_kesehatan > 1){
                                echo $row_kesehatan['deskripsi'];
                            } 
                            elseif($row_kuliner> 1){
                                echo $row_kuliner['deskripsi'];
                            }
                            elseif($row_kecantikan> 1){
                                echo $row_kecantikan['deskripsi'];
                            }
                        ?>" ><label for="floatingInput">Deskripsi</label>
                        </div>
                        <div class = "form-floating">
                        <input type="text" class="form-control" id="floatingInput" name="resep" placeholder="Resep" value = "<?php 
                            if($row_kesehatan> 1){
                                echo $row_kesehatan['resep'];
                            }
                            elseif($row_kuliner> 1){
                                echo $row_kuliner['resep'];
                            }
                            elseif($row_kecantikan> 1){
                                echo $row_kecantikan['resep'];
                            }
                            
                        ?>" > <label for="floatingInput">Resep</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary" name="submit" type="submit">Edit</button>
                    
                </form>
            </div>
        </main>
    
    <script src="../js/js.js"></script>
    
</body>
</html>