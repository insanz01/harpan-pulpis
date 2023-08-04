<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id = validate_input($connection, $_POST["id"]);
$nama = validate_input($connection, $_POST["nama"]);
$satuan = validate_input($connection, $_POST["satuan"]);
$tanggal = validate_input($connection, $_POST["tanggal"]);

$query = "UPDATE komoditas SET nama = '$nama', satuan = '$satuan', created_at = '$tanggal', updated_at = '$tanggal' WHERE id = $id";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['nama'] = $nama;
  $data['satuan'] = $satuan;
  $data['updated_at'] = $tanggal;
  
  to_json($data);
  return;
}

to_json($data, false, "can't update value");

