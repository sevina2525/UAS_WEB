<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'uas_web';

    $conn = mysqli_connect($hostname, $username, $password, $database);

    if(!$conn){
        die("gagal konek".mysqli_connect_error());
    }
?>