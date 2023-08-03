<?php

include "helper/helper.php";
include "database/db.php";

$totalKomoditasQuery = "SELECT COUNT(*) as total FROM komoditas";
$totalStokQuery = "SELECT COUNT(*) as total FROM stok_komoditas";
$totalPermintaanQuery = "SELECT COUNT(*) as total FROM permintaan";
$totalInflasiQuery = "SELECT COUNT(*) as total FROM inflasi";

$resultKomoditas = mysqli_query($connection, $totalKomoditasQuery);
$totalKomoditas = 0;
if($resultKomoditas->num_rows > 0) {
  $totalKomoditas = $resultKomoditas->fetch_assoc();
  $totalKomoditas = $totalKomoditas["total"];
}

$resultStok = mysqli_query($connection, $totalStokQuery);
$totalStok = 0;
if($resultStok->num_rows > 0) {
  $totalStok = $resultStok->fetch_assoc();
  $totalStok = $totalStok["total"];
}

$resultPermintaan = mysqli_query($connection, $totalPermintaanQuery);
$totalPermintaan = 0;
if($resultPermintaan->num_rows > 0) {
  $totalPermintaan = $resultPermintaan->fetch_assoc();
  $totalPermintaan = $totalPermintaan["total"];
}

$resultInflasi = mysqli_query($connection, $totalInflasiQuery);
$totalInflasi = 0;
if($resultInflasi->num_rows > 0) {
  $totalInflasi = $resultInflasi->fetch_assoc();
  $totalInflasi = $totalInflasi["total"];
}