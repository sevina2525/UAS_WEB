<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'rempahan';

    $conn = mysqli_connect($hostname, $username, $password, $database);

    if(!$conn){
        die("gagal konek".mysqli_connect_error());
    }
?>
