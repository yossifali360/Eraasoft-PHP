<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = filter_var(htmlspecialchars(htmlentities($_POST['email'])), FILTER_VALIDATE_EMAIL);
    $name = htmlspecialchars(htmlentities($_POST['name']));
    $password = htmlspecialchars(htmlentities($_POST['password']));
    $confirm_password = htmlspecialchars(htmlentities($_POST['confirm-password']));
    echo $email;
    if ($password === $confirm_password) {
        $users_data = json_decode(file_get_contents("users.json"), true);
        if (count($users_data) > 0) {
            foreach ($users_data as $user) {
                if ($user['email'] == $email) {
                    $_SESSION['error'] = "Email already exists ! ";
                }
            }
        }
    } else {
        $_SESSION['error'] = "Password Dont Match ! ";
    }
    if (!isset($_SESSION['error'])) {
        $user_id = count($users_data) + 1;
        $users_data[] = [
            'id' => $user_id,
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'dateCreated' => date("Y-m-d H:i:s"),
            'Role' => "member"
        ];
        print_r($users_data);
        file_put_contents("users.json", json_encode($users_data));
        header("Location:../login.php");
    }
}
