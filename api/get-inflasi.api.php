<?php

include "../helper/helper.php";
include "../database/db.php";

$query = "SELECT inflasi.id, komoditas.id as id_komoditas, komoditas.nama, inflasi.nominal, komoditas.satuan, inflasi.nilai, harga_nasional.harga, inflasi.created_at, inflasi.updated_at FROM komoditas JOIN permintaan ON permintaan.id_komoditas = komoditas.id JOIN inflasi ON permintaan.id = inflasi.id_permintaan JOIN harga_nasional ON harga_nasional.id_komoditas = komoditas.id WHERE inflasi.deleted_at is NULL";

if(isset($_GET["id"])) {
  $id = $_GET["id"];

  $query = "SELECT inflasi.id, komoditas.id as id_komoditas, komoditas.nama, inflasi.nominal, komoditas.satuan, inflasi.nilai, harga_nasional.harga, inflasi.created_at, inflasi.updated_at FROM komoditas JOIN permintaan ON permintaan.id_komoditas = komoditas.id JOIN inflasi ON permintaan.id = inflasi.id_permintaan JOIN harga_nasional ON harga_nasional.id_komoditas = komoditas.id WHERE inflasi.deleted_at is NULL AND inflasi.id = $id";
}

$result = mysqli_query($connection, $query);

$data = [];

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $temp_data = [
      "id" => $row['id'],
      "id_komoditas" => $row['id_komoditas'],
      "nama" => $row['nama'],
      "nominal" => $row['nominal'],
      "nilai" => $row['nilai'],
      "satuan" => $row['satuan'],
      "harga_lama" => $row['harga'],
      "harga_baru" => $row['harga'] + ($row['harga'] * ($row['nominal'] / 100)),
      "created_at" => $row['created_at'],
      "updated_at" => $row['updated_at']
    ];

    array_push($data, $temp_data);
  }
}

to_json($data);
