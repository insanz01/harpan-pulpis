<?php

include "helper/helper.php";
include_once "database/db.php";

$queryPasar = "SELECT * FROM pasar WHERE deleted_at is NULL";
$resultPasar = mysqli_query($connection, $queryPasar);

$pasar = [];
if($resultPasar) {
  if(mysqli_num_rows($resultPasar) > 0) {
    while($row = mysqli_fetch_assoc($resultPasar)) {
      $pasar[] = $row;
    }
  }
}

$queryKomoditas = "SELECT * FROM komoditas WHERE deleted_at is NULL";
$resultKomoditas = mysqli_query($connection, $queryKomoditas);

$komoditas = [];
if($resultKomoditas) {
  if(mysqli_num_rows($resultKomoditas) > 0) {
    while($row = mysqli_fetch_assoc($resultKomoditas)) {
      $komoditas[] = $row;
    }
  }
}