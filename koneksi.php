<?php 
$koneksi = mysqli_connect("localhost", "root", "", "db_wad");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>