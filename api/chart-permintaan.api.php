<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$query = "SELECT DATE(created_at) AS tanggal, DAYOFWEEK(created_at) AS hari, COUNT(*) AS jumlah_transaksi FROM harga_nasional WHERE created_at >= DATE_SUB(NOW(), INTERVAL 1 WEEK) GROUP BY DATE(created_at) ORDER BY DATE(created_at) ASC";

$result = mysqli_query($connection, $query);

$data = null;

// if($result) {
//   $data['tanggal'] = 
// }

?>