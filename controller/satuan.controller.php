<?php

include "helper/helper.php";
include "database/db.php";

$query = "SELECT * FROM satuan";

$result = mysqli_query($connection, $query);