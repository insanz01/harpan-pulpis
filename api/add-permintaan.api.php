<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id_komoditas = validate_input($connection, $_POST["id_komoditas"]);
$jumlah = validate_input($connection, $_POST["jumlah"]);
$tanggal = validate_input($connection, $_POST["tanggal"]);

$query = "INSERT INTO permintaan (id_komoditas, jumlah, created_at) VALUES ('$id_komoditas', $jumlah, '$tanggal')";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['id_komoditas'] = $id_komoditas;
  $data['jumlah'] = $jumlah;
  $data['created_at'] = $tanggal;
  
  to_json($data);
  return;
}

to_json($data, false, "can't insert value");

