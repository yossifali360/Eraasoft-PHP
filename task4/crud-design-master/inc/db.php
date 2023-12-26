<?php
$server_name = "localhost";
$user_name = "root";
$server_password = "";
$server_db = "crud";

$conn = mysqli_connect($server_name, $user_name, $server_password, $server_db);
if (!$conn) {
    die("Could not connect to database" . mysqli_connect_error());
}
