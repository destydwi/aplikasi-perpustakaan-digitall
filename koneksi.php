<?php
$server = "localhost";
$username = "id21914297_desty";
$password = "Lovelyz0.";
$database = "id21914297_db_perpus2";

session_start();
$koneksi = mysqli_connect($server, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}
?>