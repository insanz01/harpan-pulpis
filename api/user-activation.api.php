<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$id = validate_input($connection, $_GET['user_id']);
$state = validate_input($connection, $_GET['user_id']);

$query = "UPDATE user SET aktif = $state WHERE id = $id";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['id'] = $id;
  $data['aktif'] = $state;
  
  to_json($data);
  return;
}

to_json($data, false, "can't update value");

