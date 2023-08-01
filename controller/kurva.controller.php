<?php

// Set zona waktu sesuai dengan wilayah Anda
date_default_timezone_set('Asia/Jakarta');

// Mendapatkan tanggal hari ini
$today = strtotime('today');

// Menentukan hari dalam satu minggu (dalam detik)
$one_day = 86400; // 60 detik x 60 menit x 24 jam

// Membuat array untuk menyimpan 7 tanggal pada pekan ini
$week_dates = array();

// Menambahkan tanggal pada pekan ini ke array
for ($i = 0; $i < 7; $i++) {
    $date = $today + ($i * $one_day);
    $week_dates[] = date('Y-m-d', $date);
}

// Menampilkan tanggal pada pekan ini
// foreach ($week_dates as $date) {
//     echo $date . '<br>';
// }

$week_datas = array();
$week_data = array();

include "database/db.php";

$queryKomoditas = "SELECT id, nama FROM komoditas";
$resultKomoditas = mysqli_query($connection, $queryKomoditas);

if(mysqli_num_rows($resultKomoditas) > 0) {
  while($row = mysqli_fetch_assoc($resultKomoditas)) {
    
    array_push($week_data, $row["nama"]);

    foreach($week_dates as $date) {
      $queryPermintaan = "SELECT p.id, p.id_komoditas, k.nama, p.jumlah, hn.harga, p.created_at FROM permintaan p JOIN komoditas k ON p.id_komoditas = k.id JOIN harga_nasional hn ON hn.id_komoditas = k.id WHERE DATE(hn.created_at) = '$date' AND p.id_komoditas = $row[id]";

      $resultPermintaan = mysqli_query($connection, $queryPermintaan);
      
      $total_data = 0;
      if($resultPermintaan->num_rows > 0) {
        $permintaan = $resultPermintaan->fetch_assoc();
        $total_data = $permintaan["harga"];
      }

      array_push($week_data, $total_data);
    }
  }

  array_push($week_datas, $week_data);
}