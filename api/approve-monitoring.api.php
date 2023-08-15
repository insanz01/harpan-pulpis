<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id = validate_input($connection, $_POST['id']);
$tanggal = date("Y-m-d H:i:s", time());

$query = "UPDATE permintaan_monitor SET approved_at = '$tanggal' WHERE id = $id";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['id'] = $id;
  $data['approved_at'] = $tanggal;
  
  to_json($data);
  return;
}

to_json($data, false, "can't approve value");