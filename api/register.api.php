<?php

session_start();

include "../helper/helper.php";
include "../helper/validate.php";
include "../database/db.php";

$nama = validate_input($connection, $_POST["nama"]);
$username = validate_input($connection, $_POST["username"]);
$password = $_POST["password"];
// $loginType = validate_input($connection, $_POST["loginType"]);
$loginType = 2;

$password = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO user (nama, username, password, id_role) VALUES ('$nama', '$username', '$password', $loginType)";

$result = mysqli_query($connection, $query);

$data = null;

if ($result) {
    $data["message"] = "status registrasi berhasil, silahkan menunggu aktifasi pimpinan";  

    to_json($data);
    return;  // output data of each row
}

to_json($data, false, "gagal melakukan registrasi");

