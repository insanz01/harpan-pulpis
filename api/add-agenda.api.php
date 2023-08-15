<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$lokasi = validate_input($connection, $_POST["lokasi"]);
$tanggal = validate_input($connection, $_POST["tanggal"]);
$jam_kegiatan = validate_input($connection, $_POST["jam_kegiatan"]);
$item_komoditas = $_POST["item_komoditas"];

$query = "INSERT INTO agenda_pasar_murah (lokasi, tanggal, jam_kegiatan, item_komoditas) VALUES ('$lokasi', '$tanggal', '$jam_kegiatan', '$item_komoditas')";

$result = mysqli_query($connection, $query);

$data = null;

if($result) {
  $data['lokasi'] = $lokasi;
  $data['tanggal'] = $tanggal;
  $data['jam_kegiatan'] = $jam_kegiatan;
  $data['created_at'] = date('Y-m-d H:i:s');

  to_json($data);
  return;
}

to_json($data, false, "can't insert value");