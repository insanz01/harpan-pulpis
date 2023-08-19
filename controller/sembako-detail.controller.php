<?php

include "helper/helper.php";
include_once "database/db.php";

$id_pasar = 0;
if(isset($_GET["id"])) {
  $id_pasar = $_GET["id"];
}

$id_sembako = 0;
if(isset($_GET["id_sembako"])) {
  $id_sembako = $_GET["id_sembako"];
}

$sembakoQuery = "SELECT s.id, p.id as id_pasar, p.nama as nama_pasar, s.petugas FROM sembako s JOIN pasar p ON s.id_pasar = p.id WHERE s.deleted_at is null AND p.id = $id_pasar";

$sembakoResult = mysqli_query($connection, $sembakoQuery);

$data = [
  "nama_pasar" => "",
  "petugas" => ""
];

if($sembakoResult) {
  if(mysqli_num_rows($sembakoResult) > 0) {
    while($row = mysqli_fetch_assoc($sembakoResult)) {
      $hargaQuery = "SELECT h.id, h.id_sembako, h.id_komoditas, k.nama as nama_bahan, h.satuan, h.harga_pedagang_1, h.harga_pedagang_2, h.harga_pedagang_3, h.harga_pedagang_4 FROM harga_sembako h JOIN sembako s ON h.id_sembako = s.id JOIN komoditas k ON h.id_komoditas = k.id WHERE h.id_sembako = $row[id] AND h.deleted_at is NULL";

      $hargaResult = mysqli_query($connection, $hargaQuery);

      if($hargaResult) {
        if(mysqli_num_rows($hargaResult) > 0) {
          while($r = mysqli_fetch_assoc($hargaResult)) {
            $row['harga'][] = $r;
          }
        }
      }

      $data = $row;
    }
  }
}
