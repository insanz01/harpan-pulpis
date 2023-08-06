<?php

include "helper/helper.php";
include_once "database/db.php";

$sembakoQuery = "SELECT s.id, p.id as id_pasar, p.nama as nama_pasar, s.petugas , s.created_at FROM sembako s JOIN pasar p ON s.id_pasar = p.id WHERE s.deleted_at is null";

$sembakoResult = mysqli_query($connection, $sembakoQuery);

$data = [];

if($sembakoResult) {
  if(mysqli_num_rows($sembakoResult) > 0) {
    while($row = mysqli_fetch_assoc($sembakoResult)) {
      $data[] = $row;
    }
  }
}
