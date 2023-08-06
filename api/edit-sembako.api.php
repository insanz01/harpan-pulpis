<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id = validate_input($connection, $_POST["id"]);
$id_pasar = validate_input($connection, $_POST["id_pasar"]);
$petugas = validate_input($connection, $_POST["petugas"]);

$query = "UPDATE sembako SET id_pasar = $id_pasar, petugas = '$petugas' WHERE id = $id";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['id'] = $id;
  $data['id_pasar'] = $id_pasar;
  $data['petugas'] = $petugas;
  
  to_json($data);
  return;
}

to_json($data, false, "can't update value");

