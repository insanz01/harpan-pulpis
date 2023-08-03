<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$query = "SELECT p.id_komoditas as id, k.nama, p.jumlah FROM permintaan p JOIN komoditas k ON p.id_komoditas = k.id WHERE DATE(p.created_at) = DATE(NOW())";

$result = mysqli_query($connection, $query);

$data = [];

if(mysqli_num_rows($result) > 0) {

  while($row = mysqli_fetch_assoc($result)) {
    $val = [
      "id" => $row['id'],
      "nama" => $row['nama'],
      "total" => $row['jumlah']
    ];

    array_push($data, $val);
  }
}

to_json($data);
