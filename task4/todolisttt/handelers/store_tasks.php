<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "todoapp");
if (!$conn) {
    echo "connection error " . mysqli_connect_error($conn);
}

if ($_SERVER['REQUEST_METHOD']  == "POST" && isset($_POST['title'])) {
    $title = trim(htmlspecialchars(htmlentities($_POST['title'])));
    if (strlen($title) < 3) {
        $_SESSION['errors'] = "task title must be greater than 3 characters";
    }

    if (empty($_SESSION['errors'])) {
        $sql = "INSERT INTO `tasks` (`title`) VALUES('$title')";
        $res = mysqli_query($conn, $sql);
        if (mysqli_affected_rows($conn) > 0) {
            $_SESSION['success'] = "data inserted succefully";
        }
    }
    header("location:../index.php");
}
