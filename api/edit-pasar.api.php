<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id = validate_input($connection, $_POST["id"]);
$nama = validate_input($connection, $_POST["nama"]);
$kecamatan = validate_input($connection, $_POST["kecamatan"]);
$kelurahan = validate_input($connection, $_POST["kelurahan"]);
$keterangan = validate_input($connection, $_POST["keterangan"]);

$query = "UPDATE pasar SET nama = '$nama', kecamatan = '$kecamatan', kelurahan = '$kelurahan', keterangan = '$keterangan', updated_at = now() WHERE id = $id";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['nama'] = $nama;
  $data['kecamatan'] = $kecamatan;
  $data['kelurahan'] = $kelurahan;
  $data['keterangan'] = $keterangan;
  $data['updated_at'] = date('Y-m-d H:i:s', time());
  
  to_json($data);
  return;
}

to_json($data, false, "can't update value");

