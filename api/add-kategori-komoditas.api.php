<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$nama = validate_input($connection, $_POST["nama"]);

$query = "INSERT INTO kategori_barang (nama) VALUES ('$nama')";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
  $data['nama'] = $nama;
  $data['created_at'] = date('Y-m-d', time());
  
  to_json($data);
  return;
}

to_json($data, false, "can't insert value");

