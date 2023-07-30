<?php

include "helper/helper.php";
include "database/db.php";

$query = "SELECT COUNT(*) total FROM user WHERE aktif = 0";

$result = mysqli_query($connection, $query);

$notifikasi_register = 0;
if($result->num_rows > 0) {
  $notifikasi_register = $result->fetch_assoc();
  $notifikasi_register = $notifikasi_register["total"];
}