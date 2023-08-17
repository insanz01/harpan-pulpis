<?php

include "helper/helper.php";
include "database/db.php";

$query = "SELECT * FROM laporan_publik";

$result = mysqli_query($connection, $query);