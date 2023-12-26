<?php include('inc/header.php'); ?>
<?php include('inc/validation.php'); ?>

<?php
if (isset($_POST['submit'])) {
    $name = sant_input($_POST['name']);
    $email = sant_email($_POST['email']);
    $password = sant_input($_POST['password']);
    $id = $_POST['id'];
    if (required_Input($name) && required_Input($email)) {
        if (validateMinimum($name)) {
            if (validateEmail($email)) {
                if ($password) {
                    $hashed_Password = password_hash($password, PASSWORD_DEFAULT);
                    $sql = "UPDATE `users` SET `user_name` = '$name' , `user_email` = '$email' , `user_password` = '$hashed_Password' WHERE `user_id` = '$id'";
                } else {
                    $sql = "UPDATE `users` SET `user_name` = '$name' , `user_email` = '$email' WHERE `user_id` = '$id'";
                }
                $res = mysqli_query($conn, $sql);
                if ($res) {
                    $success = "User Updated Successfully";
                    header("refresh:3;url=index.php");
                }
            } else {
                $error = "Please enter a valid Email";
            }
        } else {
            $error = "Please enter valid inputs";
        }
    } else {
        $error = "Please enter all required fields";
    }
}
?>
<h1 class="text-center col-12 bg-info py-3 text-white my-2">Update User Info</h1>

<?php if ($error) : ?>
    <h5 class="alert alert-danger text-center"><?= $error; ?></h5>
    <a href="javascript:history.go(-1)" class="btn btn-primary">Go Back</a>
<?php endif; ?>
<?php if ($success) : ?>
    <h5 class="alert alert-success text-center"><?= $success; ?></h5>
<?php endif; ?>

<?php include('inc/footer.php'); ?>