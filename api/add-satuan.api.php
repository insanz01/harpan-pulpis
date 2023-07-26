<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$satuan = validate_input($connection, $_POST["nama"]);

$query = "INSERT INTO satuan (nama) VALUES ('$satuan')";

$result = mysqli_query($connection, $query);

$data = null;

if($result) {
  $data['nama'] = $satuan;
  $data['created_at'] = date('Y-m-d H:i:s');

  to_json($data);
  return;
}

to_json($data, false, "can't insert value");