<?php

include "../helper/helper.php";
include "../database/db.php";

$query = "SELECT stok_komoditas.id, stok_komoditas.stok, stok_komoditas.id_komoditas, komoditas.satuan, komoditas.nama as komoditas, stok_komoditas.approved_at, stok_komoditas.created_at, stok_komoditas.updated_at FROM stok_komoditas JOIN komoditas ON stok_komoditas.id_komoditas = komoditas.id WHERE stok_komoditas.deleted_at is NULL";

if(isset($_GET["id"])) {
  $id = $_GET["id"];

  $query = "SELECT stok_komoditas.id, stok_komoditas.stok, stok_komoditas.id_komoditas, komoditas.satuan, komoditas.nama as komoditas, stok_komoditas.approved_at, stok_komoditas.created_at, stok_komoditas.updated_at FROM stok_komoditas JOIN komoditas ON stok_komoditas.id_komoditas = komoditas.id WHERE stok_komoditas.deleted_at is NULL AND stok_komoditas.id = $id";
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
      "stok" => $row['stok'],
      "approved_at" => $row['approved_at'],
      "created_at" => $row['created_at'],
      "updated_at" => $row['updated_at']
    ];

    array_push($data, $temp_data);
  }
}

to_json($data);
