<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id_permintaan = validate_input($connection, $_POST["id_permintaan"]);
$nominal = validate_input($connection, $_POST["nominal"]);
$nilai = validate_input($connection, $_POST["nilai"]);
$tanggal = validate_input($connection, $_POST["tanggal"]);

$query = "INSERT INTO inflasi (id_permintaan, nominal, nilai, created_at) VALUES ('$id_permintaan', $nominal, '$nilai', '$tanggal')";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['id_permintaan'] = $id_permintaan;
  $data['nominal'] = $nominal;
  $data['nilai'] = $nilai;
  $data['created_at'] = $tanggal;
  
  to_json($data);
  return;
}

to_json($data, false, "can't insert value");

