<?php

include "helper/helper.php";
include "database/db.php";

$query = "SELECT * FROM users";

$result = mysqli_query($connection, $query);