<?php
    session_start();
    require('../koneksi.php');

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = mysqli_query($conn,"SELECT * FROM login WHERE username = '$username' OR password = '$password'");
        $hitung = mysqli_num_rows($sql);
        $pw = mysqli_fetch_array($sql);
        $passwordsekarang = $pw['password'];

        if ($hitung > 0 ){
            //verifikasi password
            if($pw['username'] === "admin" && $pw['password'] === "admin123"){
                $_SESSION['login'] = true;
                $_SESSION['username'] = $pw['username'];
                echo '<script language = "javascript">
                alert("Anda Login Sebagai Admin"); document.location = "dashboard.php";</script>' ;
                
            }else{
                echo '<script language = "javascript">
                alert("Password salah"); document.location = "admin_login.php";</script>' ;

            }
        }else{
            echo '<script language = "javascript">
            alert("Login Gagal"); document.location = "admin_login.php";</script>' ;

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
    <link rel="stylesheet" href="../stylesheet/style.css?v8">
    <link rel="stylesheet" href="../stylesheet/dark.css?v8">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="../stylesheet/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <main class="form-signin w-100 m-auto">
    <form action=""method="POST" class="daftar-user">
        <img class="mb-4" src="../gambar/spices.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <div class="form-floating">
        <input type="text" class="form-control" id="floatingInput" name="username" placeholder="Username">
        <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
        <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
        <label for="floatingPassword">Password</label>
        </div>
        <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Sign in</button>
        <!-- <button type="submit" name="login" class="btn"><b>Login</b></button> -->
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
    </form>
    </main>
    <script src="../js/js.js"></script>
  </body>
</html>