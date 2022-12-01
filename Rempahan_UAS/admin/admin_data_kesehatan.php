<?php
    require('../koneksi.php');
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
    <title>Data kesehatan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kristi&family=Oswald:wght@300&family=Poppins:wght@200&family=Roboto+Condensed:ital,wght@1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../stylesheet/style.css?v5">
    <link rel="stylesheet" href="../stylesheet/dark.css?v2">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/navbars-offcanvas/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="../stylesheet/navbar.css" rel="stylesheet">
    <style>
      td{
        text-align:left;
      }
    </style> 
</head>
<body >
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<nav class="navbar navbar-expand-lg nav-light bg-light" aria-label="Light offcanvas navbar">
        <div class="container-fluid">
        <h1 class="navbar-brand" href="#"><b>Admin RempahanRempah</b></h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbarLight" aria-controls="offcanvasNavbarLight">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbarLight" aria-labelledby="offcanvasLightLabel">
                <div class="offcanvas-header">
                    <h2 class="mb-3 mb-md-0 text-muted"><b>Menu</b></h2>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="dashboard.php">Home</a>
                        </li>
                        <li>
                            <div class="swicth-mode">
                                <input type="checkbox" id="mode" onclick="ubahWarna()">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
    </nav>
    <link href="...stylesheet/signin.css" rel="stylesheet">
    <div class="main">
    <h1 class="mb-3 mb-md-0 text-muted">DATA KESEHATAN</h1> <br>
    <a href="add_kesehatan.php"><button type="submit"><h3>Tambah Data +</h3></button></a><br><br>
    <form class="form-inline" >
        <div class="form-group">
          <select class="form-control" id="Kolom" name="Kolom" required="">
            <?php
              $kolom=(isset($_GET['Kolom']))? $_GET['Kolom'] : "";
            ?>
            <option value="judul" <?php if ($kolom=="judul") echo "selected"; ?>>Judul</option>
            <option value="deskripsi" <?php if ($kolom=="deskripsi") echo "selected";?>>Deskripsi</option>
          </select>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="KataKunci" name="KataKunci" placeholder="Kata kunci.." required="" value="<?php if (isset($_GET['KataKunci']))  echo $_GET['KataKunci']; ?>">
        </div> <br>
        <button type="submit" class="btn btn-primary">Cari</button>
        <a href="admin_data_kesehatan.php" class="btn btn-danger">Reset</a>
    </form> 

        </div>
        <div class="container py-5">
        <table class="table table-striped table-hover" >
            <thead>
            <tr class="table-primary">
                <th>Judul</th>
                <th>Gambar</th>
                <th>Deskripsi</th>
                <th>Resep</th>
                <th>Waktu Upload</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <?php 
                include "../koneksi.php";
                $page = (isset($_GET['page']))? (int) $_GET['page'] : 1;
   
            $kolomCari=(isset($_GET['Kolom']))? $_GET['Kolom'] : "";
    
            $kolomKataKunci=(isset($_GET['KataKunci']))? $_GET['KataKunci'] : "";

            // Jumlah data per halaman
            $limit = 5;

            $limitStart = ($page - 1) * $limit;
            
            //kondisi jika parameter pencarian kosong
            if($kolomCari=="" && $kolomKataKunci==""){
                $SqlQuery = mysqli_query($conn, "SELECT * FROM kesehatan LIMIT ".$limitStart.",".$limit);
            }else{
                //kondisi jika parameter cari pencarian diisi
                $SqlQuery = mysqli_query($conn, "SELECT * FROM kesehatan WHERE $kolomCari LIKE '%$kolomKataKunci%' LIMIT ".$limitStart.",".$limit);
            }
            
            
            while($row = mysqli_fetch_array($SqlQuery)){ 
        ?>
            <tbody class="table-group-divider" >
            <tr class="table-info">
                <td><?php echo $row['judul'] ?></td>
                <td><img src="konten/<?php echo $row['gambar']?>" alt="" width="200px"></td>
                <td><?php echo $row['deskripsi'] ?></td>
                <td><a href="<?php echo $row['resep']?>">Lihat Resep</a></td>
                <td><?php echo $row['tanggal'] ?></td>
                <td>
                <a href="edit.php?id_kesehatan=<?=$row['id_kesehatan'];?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                    </svg>
                </a>
                <br>
                <br>
                <a href="hapus.php?id_kesehatan=<?=$row['id_kesehatan'];?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg>
                </a>
                </td>
            </tr>
        <?php 
            }
        ?>
        </tbody>
        </table>
          </div>
        <!-- LINK NAVIGASI -->
    <div align="center">
    <!-- Previous navigation -->
    <?php
      // Jika page = 1, maka LinkPrev disable
      if($page == 1){ 
    ?>        
      <!-- link Previous Page disable --> 
      <a href="#">Previous</a>
    <?php
      }
      else{ 
        $LinkPrev = ($page > 1)? $page - 1 : 1;  

        if($kolomCari=="" && $kolomKataKunci==""){
        ?>
          <a href="admin_data_kesehatan.php?page=<?php echo $LinkPrev; ?>">Previous</a>
     <?php     
        }else{
      ?> 
        <a href="admin_data_kesehatan.php?Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $LinkPrev;?>">Previous</a>
       <?php
         } 
      }
    ?>

    <!-- Angka Navigation -->
    <?php
      //kondisi jika parameter pencarian kosong
      if($kolomCari=="" && $kolomKataKunci==""){
        $SqlQuery = mysqli_query($conn, "SELECT * FROM kesehatan");
      }else{
        //kondisi jika parameter kolom pencarian diisi
        $SqlQuery = mysqli_query($conn, "SELECT * FROM kesehatan WHERE $kolomCari LIKE '%$kolomKataKunci%'");
      }     
    
      //Hitung semua jumlah data yang berada pada tabel Sisawa
      $JumlahData = mysqli_num_rows($SqlQuery);
      
      // Hitung jumlah halaman yang tersedia
      $jumlahPage = ceil($JumlahData / $limit); 
      
      // Jumlah link number 
      $jumlahNumber = 1; 

      // Untuk awal link number
      $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 
      
      // Untuk akhir link number
      $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 
      
      for($i = $startNumber; $i <= $endNumber; $i++){
        $linkActive = ($page == $i)? ' class="active"' : '';

        if($kolomCari=="" && $kolomKataKunci==""){
    ?>
        <?php $linkActive; ?><a href="admin_data_kesehatan.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>

    <?php
      }else{
        ?>
        <?php $linkActive; ?><a href="admin_data_kesehatan.php?Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php
      }
    }
    ?>
    
    <!-- Next Navigation -->
    <?php       
     if($page == $jumlahPage){ 
    ?>
      <a href="#">Next</a>
    <?php
    }
    else{
      $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;"<br>";
    if($kolomCari=="" && $kolomKataKunci==""){
      ?>
        <a href="admin_data_kesehatan.php?page=<?php echo $linkNext; ?>">Next</a>
    <?php     
      }else{
    ?> 
        <li><a href="admin_data_kesehatan.php?Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunci;?>&page=<?php echo $linkNext; ?>">Next</a></li><br>
  <?php
    }
  }
  ?>
</div>
    </div>
    </div>
    <div class="container">
            <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
                <div class="col-md-4 d-flex align-items-center">
                    <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
                    </a>
                    <span class="mb-3 mb-md-0 text-muted">&copy; 2022 RempahanRempah, Inc</span>
                </div>

                <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
                    <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
                    <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
                    <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
                </ul>
            </footer>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
            </symbol>
            <symbol id="instagram" viewBox="0 0 16 16">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
            </symbol>
            <symbol id="twitter" viewBox="0 0 16 16">
              <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
            </symbol>
          </svg>
    <script src="../js/js.js"></script>
    
</body>
</html>
