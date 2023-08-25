<?php

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id_pasar = validate_input($connection, $_GET["id_pasar"]);
$id_komoditas = validate_input($connection, $_GET["id_komoditas"]);

// $query = "SELECT DISTINCT satuan FROM harga_sembako WHERE id_komoditas = $id_komoditas AND id_sembako = $id_sembako";
$query = "SELECT DISTINCT harga_sembako.satuan FROM sembako JOIN harga_sembako ON sembako.id = harga_sembako.id_sembako JOIN komoditas ON harga_sembako.id_komoditas = komoditas.id WHERE sembako.id_pasar = $id_pasar AND harga_sembako.id_komoditas = $id_komoditas";

$result = mysqli_query($connection, $query);

$data = [];

if($result->num_rows > 0) {
  while($r = $result->fetch_assoc()) {
    $data[] = $r;
  }
}

to_json($data);