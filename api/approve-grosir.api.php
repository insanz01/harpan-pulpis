<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id = validate_input($connection, $_POST['id']);
$tanggal = date("Y-m-d H:i:s", time());

$query = "UPDATE harga_grosir SET approved_at = '$tanggal' WHERE id = $id";

if($id == -1) {
  $query = "UPDATE harga_grosir SET approved_at = '$tanggal' WHERE approved_at is null";
}

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['id'] = $id;
  $data['approved_at'] = $tanggal;
  
  to_json($data);
  return;
}

to_json($data, false, "can't approve value");

