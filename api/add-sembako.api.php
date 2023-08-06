<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id_pasar = validate_input($connection, $_POST["id_pasar"]);
$petugas = validate_input($connection, $_POST["petugas"]);

$query = "INSERT INTO sembako (id_pasar, petugas) VALUES ($id_pasar, '$petugas')";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['id_pasar'] = $id_pasar;
  $data['petugas'] = $petugas;
  
  to_json($data);
  return;
}

to_json($data, false, "can't insert value");

