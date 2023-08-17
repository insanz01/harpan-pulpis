<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$lokasi = validate_input($connection, $_POST["lokasi"]);
$tanggal_kegiatan = validate_input($connection, $_POST["tanggal_kegiatan"]);
$jenis_kegiatan = validate_input($connection, $_POST["jenis_kegiatan"]);
$foto_kegiatan = $_POST["foto_kegiatan"];

$query = "INSERT INTO laporan_publik (lokasi, tanggal_kegiatan, jenis_kegiatan, foto_kegiatan) VALUES ('$lokasi', '$tanggal_kegiatan', '$jenis_kegiatan', '$foto_kegiatan')";

$result = mysqli_query($connection, $query);

$data = null;

if($result) {
  $data['lokasi'] = $lokasi;
  $data['tanggal_kegiatan'] = $tanggal_kegiatan;
  $data['created_at'] = date('Y-m-d H:i:s');

  to_json($data);
  return;
}

to_json($data, false, "can't insert value");