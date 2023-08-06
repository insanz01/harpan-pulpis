<?php

include "helper/helper.php";
include_once "database/db.php";

$query = "SELECT * FROM kategori_barang";

$result = mysqli_query($connection, $query);

$data = [];

if($result) {
  if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
      array_push($data, $row);
    }
  }
}
