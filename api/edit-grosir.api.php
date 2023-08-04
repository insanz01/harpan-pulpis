<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id = validate_input($connection, $_POST['id']);
$id_komoditas = validate_input($connection, $_POST["id_komoditas"]);
$harga = validate_input($connection, $_POST["harga"]);
$tanggal = validate_input($connection, $_POST["tanggal"]);

$query = "UPDATE harga_grosir SET id_komoditas = '$id_komoditas', harga = $harga, created_at = '$tanggal', updated_at = '$tanggal' WHERE id = $id";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['id_komoditas'] = $id_komoditas;
  $data['harga'] = $harga;
  $data['updated_at'] = $tanggal;
  
  to_json($data);
  return;
}

to_json($data, false, "can't update value");

