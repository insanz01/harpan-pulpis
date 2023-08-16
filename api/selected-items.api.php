<?php

include "../helper/helper.php";
include "../database/db.php";

$id = $_GET["id"];

$query = "SELECT * FROM agenda_pasar_murah WHERE id = $id";

$result = mysqli_query($connection, $query);

$data = [];

// if (mysqli_num_rows($result) > 0) {
//   while($row = mysqli_fetch_assoc($result)) {
//     array_push($data, $row);
//   }
//   // output data of each row
// }

if($result) {
  $r = mysqli_fetch_assoc($result);

  $data = $r;
}

to_json($data);
