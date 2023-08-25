<?php

include "../helper/helper.php";
include "../database/db.php";

$id_pasar = $_GET['id_pasar'];
$id_komoditas = $_GET['id_komoditas'];
$satuan = $_GET['satuan'];
$tanggal = $_GET['tanggal'];

$satuan = strtoupper($satuan);

$query = "SELECT sembako.id, sembako.id_pasar, sembako.petugas, harga_sembako.id_komoditas, harga_sembako.harga_pedagang_1, harga_sembako.harga_pedagang_2, harga_sembako.harga_pedagang_3, harga_sembako.harga_pedagang_4, harga_sembako.created_at FROM sembako JOIN harga_sembako ON sembako.id = harga_sembako.id_sembako JOIN komoditas ON harga_sembako.id_komoditas = komoditas.id WHERE harga_sembako.deleted_at is NULL AND harga_sembako.id_komoditas = $id_komoditas AND sembako.id_pasar = $id_pasar AND UPPER(harga_sembako.satuan) = '$satuan' AND DATE(harga_sembako.created_at) = DATE('$tanggal') ORDER BY harga_sembako.id DESC LIMIT 1";

$result = mysqli_query($connection, $query);

$data = [];

// if (mysqli_num_rows($result) > 0) {
if ($result) {
  // output data of each row
  // while($row = mysqli_fetch_assoc($result)) {
  $row = mysqli_fetch_assoc($result);
  $data = [
    "id" => $row['id'],
    "id_pasar" => $row['id_pasar'],
    "petugas" => $row['petugas'],
    "id_komoditas" => $row['id_komoditas'],
    "harga_pedagang_1" => $row['harga_pedagang_1'],
    "harga_pedagang_2" => $row['harga_pedagang_2'],
    "harga_pedagang_3" => $row['harga_pedagang_3'],
    "harga_pedagang_4" => $row['harga_pedagang_4'],
    // "created_at" => $row['created_at'],
  ];

    // array_push($data, $temp_data);
  }
// }

to_json($data);
