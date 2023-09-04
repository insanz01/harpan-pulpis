<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "another_harga_pangan_pulang_pisau";

$connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection) {
    die("Gagal Koneksi: " . mysqli_connect_error());
}
?>