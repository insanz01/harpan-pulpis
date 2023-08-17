<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id = validate($connection, $_POST["id"]);
$lokasi = validate_input($connection, $_POST["lokasi"]);
$tanggal_kegiatan = validate_input($connection, $_POST["tanggal_kegiatan"]);
$jenis_kegiatan = validate_input($connection, $_POST["jenis_kegiatan"]);
$foto_kegiatan = $_POST["foto_kegiatan"];

$query = "UPDATE laporan_publik SET lokasi = '$lokasi', tanggal_kegiatan = '$tanggal_kegiatan', jenis_kegiatan = '$jenis_kegiatan', foto_kegiatan = '$foto_kegiatan' WHERE id = $id";

$result = mysqli_query($connection, $query);

$data = null;

if($result) {
  $data['lokasi'] = $lokasi;
  $data['tanggal_kegiatan'] = $tanggal_kegiatan;
  $data['jenis_kegiatan'] = $jenis_kegiatan;
  $data['foto_kegiatan'] = $foto_kegiatan;
  $data['created_at'] = date('Y-m-d H:i:s');

  to_json($data);
  return;
}

to_json($data, false, "can't insert value");