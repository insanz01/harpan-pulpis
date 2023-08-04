<?php

include "../helper/helper.php";
include "../database/db.php";

$query = "SELECT harga_distributor.id, komoditas.nama, harga_distributor.harga, komoditas.satuan, harga_distributor.approved_at, harga_distributor.created_at, harga_distributor.updated_at FROM komoditas JOIN harga_distributor ON komoditas.id = harga_distributor.id_komoditas";

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
