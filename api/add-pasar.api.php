<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$nama = validate_input($connection, $_POST["nama"]);
$kecamatan = validate_input($connection, $_POST["kecamatan"]);
$kelurahan = validate_input($connection, $_POST["kelurahan"]);
$keterangan = validate_input($connection, $_POST["keterangan"]);

$query = "INSERT INTO pasar (nama, kecamatan, kelurahan, keterangan) VALUES ('$nama', '$kecamatan', '$kelurahan', '$keterangan')";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['nama'] = $nama;
  $data['kecamatan'] = $kecamatan;
  $data['kelurahan'] = $kelurahan;
  $data['keterangan'] = $keterangan;
  
  to_json($data);
  return;
}

to_json($data, false, "can't insert value");

