<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$nama = validate_input($connection, $_POST["nama"]);
$kategori = validate_input($connection, $_POST["kategori"]);
$merk = validate_input($connection, $_POST["merk"]);

$query = "INSERT INTO komoditas (nama, kategori, merk) VALUES ('$nama', '$kategori', '$merk')";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['nama'] = $nama;
  $data['kategori'] = $kategori;
  $data['merk'] = $merk;
  
  to_json($data);
  return;
}

to_json($data, false, "can't insert value");

