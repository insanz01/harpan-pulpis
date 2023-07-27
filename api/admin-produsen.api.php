<?php

include "../helper/helper.php";
include "../database/db.php";

$query = "SELECT harga_produsen.id, komoditas.nama, harga_produsen.harga, komoditas.satuan, harga_produsen.approved_at, harga_produsen.created_at, harga_produsen.updated_at FROM komoditas JOIN harga_produsen ON komoditas.id = harga_produsen.id_komoditas";

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
