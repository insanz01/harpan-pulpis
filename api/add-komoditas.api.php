<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$nama = validate_input($connection, $_POST["nama"]);
$satuan = validate_input($connection, $_POST["satuan"]);
$tanggal = validate_input($connection, $_POST["tanggal"]);

$query = "INSERT INTO komoditas (nama, satuan) VALUES ('$nama', $satuan)";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['nama'] = $nama;
  $data['satuan'] = $satuan;
  $data['created_at'] = $tanggal;
  
  to_json($data);
  return;
}

to_json($data, false, "can't insert value");

