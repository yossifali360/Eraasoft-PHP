<?php
session_start();
$cart_id = $_GET['id'];
$users_data = json_decode(file_get_contents("users.json"), true);
if (isset($_SESSION['Auth'])) {
    $user_data = $_SESSION['Auth'];
    foreach ($users_data as $key => $user) {
        if ($user['id'] == $user_data['id']) {
            print_r($users_data[$key]['cart']);
            unset($users_data[$key]['cart'][$cart_id]);
            unset($_SESSION['cart'][$cart_id]);
            file_put_contents("users.json", json_encode($users_data));
            header("Location:../index.php");
        }
    }
}
?>