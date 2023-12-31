<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id = validate_input($connection, $_POST["id"]);
$nama = validate_input($connection, $_POST["nama"]);
$kategori = validate_input($connection, $_POST["kategori"]);
$merk = validate_input($connection, $_POST["merk"]);

$query = "UPDATE komoditas SET nama = '$nama', kategori = '$kategori', merk = '$merk', updated_at = now() WHERE id = $id";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['nama'] = $nama;
  $data['kategori'] = $kategori;
  $data['merk'] = $merk;
  $data['updated_at'] = date('Y-m-d', time());
  
  to_json($data);
  return;
}

to_json($data, false, "can't update value");

