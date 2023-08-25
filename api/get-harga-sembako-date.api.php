<?php

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id_komoditas = validate_input($connection, $_GET["id_komoditas"]);
$id_pasar = validate_input($connection, $_GET["id_pasar"]);
$satuan = validate_input($connection, $_GET["satuan"]);

$satuan = strtoupper($satuan);

$query = "SELECT DISTINCT DATE(harga_sembako.created_at) as tanggal FROM sembako JOIN harga_sembako ON sembako.id = harga_sembako.id_sembako JOIN komoditas ON harga_sembako.id_komoditas = komoditas.id WHERE harga_sembako.id_komoditas = $id_komoditas AND sembako.id_pasar = $id_pasar AND UPPER(harga_sembako.satuan) = '$satuan'";

$result = mysqli_query($connection, $query);

$data = [];

if($result->num_rows > 0) {
  while($r = $result->fetch_assoc()) {
    $data[] = $r;
  }
}

to_json($data);