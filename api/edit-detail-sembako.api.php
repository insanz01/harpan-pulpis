<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id = validate_input($connection, $_POST["id"]);
$id_sembako = validate_input($connection, $_POST["id_sembako"]);
$id_komoditas = validate_input($connection, $_POST["id_komoditas"]);
$satuan = validate_input($connection, $_POST["satuan"]);
$harga_pedagang_1 = validate_input($connection, $_POST["harga_pedagang_1"]);
$harga_pedagang_2 = validate_input($connection, $_POST["harga_pedagang_2"]);
$harga_pedagang_3 = validate_input($connection, $_POST["harga_pedagang_3"]);
$harga_pedagang_4 = validate_input($connection, $_POST["harga_pedagang_4"]);

$query = "UPDATE harga_sembako SET id_sembako = $id_sembako, id_komoditas = $id_komoditas, satuan = '$satuan', harga_pedagang_1 = $harga_pedagang_1, harga_pedagang_2 = $harga_pedagang_2, harga_pedagang_3 = $harga_pedagang_3, harga_pedagang_4 = $harga_pedagang_4, updated_at = now() WHERE id = $id";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['id'] = $id;
  $data['id_sembako'] = $id_sembako;
  $data['id_komoditas'] = $id_komoditas;
  $data['satuan'] = $satuan;
  $data['harga_pedagang_1'] = $harga_pedagang_1;
  $data['harga_pedagang_2'] = $harga_pedagang_2;
  $data['harga_pedagang_3'] = $harga_pedagang_3;
  $data['harga_pedagang_4'] = $harga_pedagang_4;
  
  to_json($data);
  return;
}

to_json($data, false, "can't update value");

