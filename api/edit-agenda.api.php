<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id = validate_input($connection, $_POST['id']);
$lokasi = validate_input($connection, $_POST["lokasi"]);
$tanggal = validate_input($connection, $_POST["tanggal"]);
$jam_kegiatan = validate_input($connection, $_POST["jam_kegiatan"]);
$item_komoditas = $_POST["item_komoditas"];

$query = "UPDATE agenda_pasar_murah SET lokasi = '$lokasi', tanggal = '$tanggal', jam_kegiatan = '$jam_kegiatan', item_komoditas = '$item_komoditas' WHERE id = $id";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['id'] = $id;
  $data['lokasi'] = $lokasi;
  $data['tanggal'] = $tanggal;
  $data['jam_kegiatan'] = $jam_kegiatan;
  
  to_json($data);
  return;
}

to_json($data, false, "can't update value");

