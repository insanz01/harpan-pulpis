<?php

include "helper/helper.php";
include "database/db.php";

$query = "SELECT * FROM agenda_pasar_murah";

$result = mysqli_query($connection, $query);