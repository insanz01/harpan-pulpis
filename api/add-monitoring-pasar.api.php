<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id_pasar = validate_input($connection, $_POST["id_pasar"]);
$petugas = validate_input($connection, $_POST["petugas"]);
$tanggal = validate_input($connection, $_POST["tanggal"]);

$query = "INSERT INTO permintaan_monitor (id_pasar, petugas, tanggal) VALUES ($id_pasar, '$petugas', '$tanggal')";

$result = mysqli_query($connection, $query);

$data = null;

if($result) {
  $data['id_pesan'] = $id_pesan;
  $data['petugas'] = $petugas;
  $data['created_at'] = date('Y-m-d H:i:s');

  to_json($data);
  return;
}

to_json($data, false, "can't insert value");