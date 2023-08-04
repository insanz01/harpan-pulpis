<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id = validate_input($connection, $_POST['id']);
$id_komoditas = validate_input($connection, $_POST["id_komoditas"]);
$stok = validate_input($connection, $_POST["stok"]);
$tanggal = validate_input($connection, $_POST["tanggal"]);

$query = "UPDATE stok_komoditas SET id_komoditas = '$id_komoditas', stok = $stok, created_at = '$tanggal', updated_at = '$tanggal' WHERE id = $id";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['id_komoditas'] = $id_komoditas;
  $data['stok'] = $stok;
  $data['updated_at'] = $tanggal;
  
  to_json($data);
  return;
}

to_json($data, false, "can't update value");

