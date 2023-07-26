<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$lokasi = validate_input($connection, $_POST["lokasi"]);
$tanggal = validate_input($connection, $_POST["tanggal"]);

$query = "INSERT INTO agenda_pasar_murah (lokasi, tanggal) VALUES ('$lokasi', '$tanggal')";

$result = mysqli_query($connection, $query);

$data = null;

if($result) {
  $data['lokasi'] = $lokasi;
  $data['tanggal'] = $tanggal;
  $data['created_at'] = date('Y-m-d H:i:s');

  to_json($data);
  return;
}

to_json($data, false, "can't insert value");