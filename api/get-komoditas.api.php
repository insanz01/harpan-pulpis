<?php

include "../helper/helper.php";
include "../database/db.php";

$query = "SELECT komoditas.id, komoditas.nama, komoditas.satuan, komoditas.approved_at, komoditas.created_at, komoditas.updated_at FROM komoditas WHERE komoditas.deleted_at is NULL";

if(isset($_GET["id"])) {
  $id = $_GET["id"];

  $query = "SELECT komoditas.id, komoditas.nama, komoditas.satuan, komoditas.approved_at, komoditas.created_at, komoditas.updated_at FROM komoditas WHERE komoditas.deleted_at is NULL AND komoditas.id = $id";
}


$result = mysqli_query($connection, $query);

$data = [];

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $temp_data = [
      "id" => $row['id'],
      "nama" => $row['nama'],
      "satuan" => $row['satuan'],
      "approved_at" => $row['approved_at'],
      "created_at" => $row['created_at'],
      "updated_at" => $row['updated_at']
    ];

    array_push($data, $temp_data);
  }
}

to_json($data);
