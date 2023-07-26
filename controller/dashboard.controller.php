<?php

include "helper/helper.php";
include "database/db.php";

$totalKomoditasQuery = "SELECT COUNT(*) as total FROM komoditas";
$totalStokQuery = "SELECT COUNT(*) as total FROM stok_komoditas";
$totalPermintaanQuery = "SELECT COUNT(*) as total FROM permintaan";
$totalInflasiQuery = "SELECT COUNT(*) as total FROM inflasi";

$resultKomoditas = mysqli_query($connection, $totalKomoditasQuery);
$totaKomoditas = 0;
if($resultKomoditas->num_rows > 0) {
  $totalKomoditas = $resultKomoditas->fetch_assoc();
}

$resultStok = mysqli_query($connection, $totalStokQuery);
$totaStok = 0;
if($resultStok->num_rows > 0) {
  $totalStok = $resultStok->fetch_assoc();
}

$resultPermintaan = mysqli_query($connection, $totalPermintaanQuery);
$totaPermintaan = 0;
if($resultPermintaan->num_rows > 0) {
  $totalPermintaan = $resultPermintaan->fetch_assoc();
}

$resultInflasi = mysqli_query($connection, $totalInflasiQuery);
$totaInflasi = 0;
if($resultInflasi->num_rows > 0) {
  $totalInflasi = $resultInflasi->fetch_assoc();
}