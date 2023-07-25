<?php

include "helper/helper.php";
include "database/db.php";

$totalKomoditasQuery = "SELECT COUNT(*) as total FROM komoditas";
$totalStokQuery = "SELECT COUNT(*) as total FROM stok_komoditas";
$totalPermintaanQuery = "SELECT COUNT(*) as total FROM permintaan";
$totalInflasiQuery = "SELECT COUNT(*) as total FROM inflasi";

