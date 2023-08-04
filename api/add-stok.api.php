<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id_komoditas = validate_input($connection, $_POST["id_komoditas"]);
$stok = validate_input($connection, $_POST["stok"]);
$tanggal = validate_input($connection, $_POST["tanggal"]);

$query = "INSERT INTO stok_komoditas (id_komoditas, stok, created_at) VALUES ('$id_komoditas', $stok, '$tanggal')";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['id_komoditas'] = $id_komoditas;
  $data['stok'] = $stok;
  $data['created_at'] = $tanggal;
  
  to_json($data);
  return;
}

to_json($data, false, "can't insert value");

