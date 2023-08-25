<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pangan_pulpis";

$connection = mysqli_connect($servername, $username, $password, $dbname);
if (!$connection) {
    die("Gagal Koneksi: " . mysqli_connect_error());
}
?>