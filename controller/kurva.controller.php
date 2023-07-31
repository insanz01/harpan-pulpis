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