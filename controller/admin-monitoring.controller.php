<?php

include_once "database/db.php";

$query = "SELECT pm.id, pm.id_pasar, p.nama as pasar, pm.petugas, pm.tanggal, pm.created_at FROM permintaan_monitor pm JOIN pasar p ON pm.id_pasar = p.id WHERE pm.deleted_at is null";

$result = mysqli_query($connection, $query);