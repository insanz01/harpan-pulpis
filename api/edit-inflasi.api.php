<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id = validate_input($connection, $_POST["id"]);
$id_permintaan = validate_input($connection, $_POST["id_permintaan"]);
$nominal = validate_input($connection, $_POST["nominal"]);
$nilai = validate_input($connection, $_POST["nilai"]);
$tanggal = validate_input($connection, $_POST["tanggal"]);

$query = "UPDATE inflasi SET id_permintaan = '$id_permintaan', nominal = $nominal, nilai = '$nilai', created_at = '$tanggal', updated_at = '$tanggal' WHERE id = $id";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['id_permintaan'] = $id_permintaan;
  $data['nominal'] = $nominal;
  $data['nilai'] = $nilai;
  $data['updated_at'] = $tanggal;
  
  to_json($data);
  return;
}

to_json($data, false, "can't update value");

