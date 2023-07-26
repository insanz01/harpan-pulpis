<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id = validate_input($connection, $_POST['id']);
$lokasi = validate_input($connection, $_POST["lokasi"]);
$tanggal = validate_input($connection, $_POST["tanggal"]);

$query = "UPDATE agenda_pasar_murah SET lokasi = '$lokasi', tanggal = '$tanggal' WHERE id = $id";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['id'] = $id;
  $data['lokasi'] = $lokasi;
  $data['tanggal'] = $tanggal;
  
  to_json($data);
  return;
}

to_json($data, false, "can't update value");

