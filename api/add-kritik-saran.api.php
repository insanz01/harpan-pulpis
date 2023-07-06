<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$kritik_saran = validate_input($connection, $_POST["kritik_saran"]);

$query = "INSERT INTO kritik_saran (pesan) VALUES ('$kritik_saran')";

$result = mysqli_query($connection, $query);

$data = null;

if($result) {
  $data['pesan'] = $kritik_saran;
  $data['craeted_at'] = date('Y-m-d H:i:s');

  to_json($data);
  return;
}

to_json($data, false, "can't insert value");