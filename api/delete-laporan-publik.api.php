<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id = validate_input($connection, $_POST['id']);

$query = "DELETE FROM laporan_publik WHERE id = $id";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['id'] = $id;
  
  to_json($data);
  return;
}

to_json($data, false, "can't delete value");

