<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = filter_var(htmlspecialchars(htmlentities($_POST['email'])), FILTER_VALIDATE_EMAIL);
    echo $email . "<br>";
    $password = htmlspecialchars(htmlentities($_POST['password']));
    $users_data = json_decode(file_get_contents("users.json"), true);
    if (count($users_data) > 0) {
        $auth = false;
        foreach ($users_data as $user) {
            if ($user['email'] == $email) {
                if ($user['password'] == $password) {
                    $_SESSION['Auth'] = $user;
                    unset($_SESSION['Auth']['password']);
                    print_r($_SESSION['Auth']);
                    header("Location:../index.php");
                    die;
                } else {
                    $_SESSION['error'] = "Email not founded ! ";
                }
            } else {
                $_SESSION['error'] = "Email not founded ! ";
            }
            header("Location:../signup.php");
        }
    }
}
