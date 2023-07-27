<?php

include "../helper/helper.php";
include "../database/db.php";

$query = "SELECT harga_nasional.id, komoditas.nama, harga_nasional.harga, komoditas.satuan, harga_nasional.approved_at, harga_nasional.created_at, harga_nasional.updated_at FROM komoditas JOIN harga_nasional ON komoditas.id = harga_nasional.id_komoditas";

$result = mysqli_query($connection, $query);

$data = [];

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $temp_data = [
      "id" => $row['id'],
      "nama" => $row['nama'],
      "harga" => $row['harga'],
      "satuan" => $row['satuan'],
      "approved_at" => $row['approved_at'],
      "created_at" => $row['created_at'],
      "updated_at" => $row['updated_at']
    ];

    array_push($data, $temp_data);
  }
}

to_json($data);
