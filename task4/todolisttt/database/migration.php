<?php

$conn =  mysqli_connect("localhost", "root", "", "todoapp");

if (!$conn) {
    echo "connect error " . mysqli_connect_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS tasks(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(200) NOT NULL 
) ";

mysqli_query($conn, $sql);
mysqli_close($conn);
