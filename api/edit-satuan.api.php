<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id = validate_input($connection, $_POST['id']);
$satuan = validate_input($connection, $_POST["nama"]);

$query = "UPDATE satuan SET nama = '$satuan' WHERE id = $id";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['id'] = $id;
  $data['satuan'] = $satuan;
  
  to_json($data);
  return;
}

to_json($data, false, "can't update value");

