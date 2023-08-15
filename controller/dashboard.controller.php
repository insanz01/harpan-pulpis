<?php

include "helper/helper.php";
include "database/db.php";

$totalKomoditasQuery = "SELECT COUNT(*) as total FROM komoditas WHERE deleted_at is NULL";
$totalPasarQuery = "SELECT COUNT(*) as total FROM pasar WHERE deleted_at is NULL";
$totalPermintaanQuery = "SELECT COUNT(*) as total FROM permintaan_monitor WHERE deleted_at is NULL";
$totalKritikSaran = "SELECT COUNT(*) as total FROM kritik_saran";

$resultKomoditas = mysqli_query($connection, $totalKomoditasQuery);
$totalKomoditas = 0;
if($resultKomoditas->num_rows > 0) {
  $totalKomoditas = $resultKomoditas->fetch_assoc();
  $totalKomoditas = $totalKomoditas["total"];
}

$resultPasar = mysqli_query($connection, $totalPasarQuery);
$totalPasar = 0;
if($resultPasar->num_rows > 0) {
  $totalPasar = $resultPasar->fetch_assoc();
  $totalPasar = $totalPasar["total"];
}

$resultPermintaan = mysqli_query($connection, $totalPermintaanQuery);
$totalPermintaan = 0;
if($resultPermintaan->num_rows > 0) {
  $totalPermintaan = $resultPermintaan->fetch_assoc();
  $totalPermintaan = $totalPermintaan["total"];
}

$resultKritikSaran = mysqli_query($connection, $totalKritikSaran);
$totalKritikSaran = 0;
if($resultKritikSaran->num_rows > 0) {
  $totalKritikSaran = $resultKritikSaran->fetch_assoc();
  $totalKritikSaran = $totalKritikSaran["total"];
}