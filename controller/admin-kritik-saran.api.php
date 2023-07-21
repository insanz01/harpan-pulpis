<?php

include "helper/helper.php";
include "database/db.php";

$query = "SELECT * FROM kritik_saran";

$result = mysqli_query($connection, $query);