<?php

include "../helper/helper.php";
include "../database/db.php";

$query = "SELECT stok_komoditas.id, komoditas.nama, stok_komoditas.stok, komoditas.satuan, stok_komoditas.created_at, stok_komoditas.updated_at FROM komoditas JOIN stok_komoditas ON komoditas.id = stok_komoditas.id_komoditas";

$result = mysqli_query($connection, $query);

$data = [];

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $temp_data = [
      "id" => $row['id'],
      "nama" => $row['nama'],
      "stok" => $row['stok'],
      "satuan" => $row['satuan'],
      "created_at" => $row['created_at'],
      "updated_at" => $row['updated_at']
    ];

    array_push($data, $temp_data);
  }
}

to_json($data);
