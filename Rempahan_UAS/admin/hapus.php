<?php 

require '../koneksi.php';

session_start();
    if ( !isset($_SESSION['login'])){
        header("Location: admin_login.php");
        exit;
    }

if(isset($_GET['id_kesehatan'])){
    $id_kesehatan = $_GET['id_kesehatan'];
    $hapus_kesehatan = mysqli_query($conn, "DELETE FROM `kesehatan` WHERE `id_kesehatan` = '".$id_kesehatan."'");
    if($hapus_kesehatan){
        echo '<script language = "javascript">
        alert("Hapus Berhasil"); document.location = "dashboard.php";</script>' ;
    }
}
elseif(isset($_GET['id_kuliner'])){
    $id_kuliner = $_GET['id_kuliner'];
    $hapus_kuliner = mysqli_query($conn, "DELETE FROM `kuliner` WHERE `id_kuliner` = '".$id_kuliner."'");
    if($hapus_kuliner){
        echo '<script language = "javascript">
        alert("Hapus Berhasil"); document.location = "dashboard.php";</script>' ;
    }
}
elseif(isset($_GET['id_kecantikan'])){
    $id_kecantikan = $_GET['id_kecantikan'];
    $hapus_kecantikan = mysqli_query($conn, "DELETE FROM `kecantikan` WHERE `id_kecantikan` = '".$id_kecantikan."'");
    if($hapus_kecantikan){
        echo '<script language = "javascript">
        alert("Hapus Berhasil"); document.location = "dashboard.php";</script>' ;
    }
}