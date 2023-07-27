<?php

include "../helper/helper.php";
include "../database/db.php";

$query = "SELECT permintaan.id, permintaan.jumlah, permintaan.id_komoditas, komoditas.satuan, komoditas.nama as komoditas, permintaan.approved_at, permintaan.created_at, permintaan.updated_at FROM permintaan JOIN komoditas ON permintaan.id_komoditas = komoditas.id WHERE permintaan.deleted_at is NULL";

if(isset($_GET["id"])) {
  $id = $_GET["id"];

  $query = "SELECT permintaan.id, permintaan.jumlah, permintaan.id_komoditas, komoditas.satuan, komoditas.nama as komoditas, permintaan.approved_at, permintaan.created_at, permintaan.updated_at FROM permintaan JOIN komoditas ON permintaan.id_komoditas = komoditas.id WHERE permintaan.deleted_at is NULL AND permintaan.id = $id";
}

$result = mysqli_query($connection, $query);

$data = [];

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $temp_data = [
      "id" => $row['id'],
      "id_komoditas" => $row["id_komoditas"],
      "nama" => $row['komoditas'],
      "satuan" => $row['satuan'],
      "jumlah" => $row['jumlah'],
      "approved_at" => $row['approved_at'],
      "created_at" => $row['created_at'],
      "updated_at" => $row['updated_at']
    ];

    array_push($data, $temp_data);
  }
}

to_json($data);
