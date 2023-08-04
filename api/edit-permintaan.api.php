<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id = validate_input($connection, $_POST["id"]);
$id_komoditas = validate_input($connection, $_POST["id_komoditas"]);
$jumlah = validate_input($connection, $_POST["jumlah"]);
$tanggal = validate_input($connection, $_POST["tanggal"]);

$query = "UPDATE permintaan SET id_komoditas = '$id_komoditas', jumlah = $jumlah, created_at = '$tanggal', updated_at = '$tanggal' WHERE id = $id";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['id_komoditas'] = $id_komoditas;
  $data['jumlah'] = $jumlah;
  $data['updated_at'] = $tanggal;
  
  to_json($data);
  return;
}

to_json($data, false, "can't update value");

