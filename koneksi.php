<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "siakad_db";

$koneksi = mysqli_connect($host,$user,$pass,$db);

if (!$koneksi) {
    # code...
    die("koneksi database gagal: ".mysqli_connect_error());
}

?>