<?php

include "../helper/helper.php";
include "../database/db.php";

$query = "SELECT permintaan.id, komoditas.nama, permintaan.jumlah, komoditas.satuan, permintaan.created_at, permintaan.updated_at FROM komoditas JOIN permintaan ON komoditas.id = permintaan.id_komoditas";

$result = mysqli_query($connection, $query);

$data = [];

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $temp_data = [
      "id" => $row['id'],
      "nama" => $row['nama'],
      "jumlah" => $row['jumlah'],
      "satuan" => $row['satuan'],
      "created_at" => $row['created_at'],
      "updated_at" => $row['updated_at']
    ];

    array_push($data, $temp_data);
  }
}

to_json($data);
