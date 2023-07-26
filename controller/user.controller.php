<?php

include "helper/helper.php";
include "database/db.php";

$query = "SELECT * FROM user";

$result = mysqli_query($connection, $query);