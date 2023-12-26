<?php include('inc/header.php'); ?>
<?php include('inc/validation.php'); ?>
<?php
if (isset($_POST['submit'])) {
    $name = sant_input($_POST['name']);
    $email = sant_email($_POST['email']);
    $password = sant_input($_POST['password']);

    if (required_Input($name) && required_Input($email) && required_Input($password)) {
        if (validateMinimum($name) && validateMaximum($password)) {
            if (validateEmail($email)) {
                $hashed_Password = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_password`)
                VALUES ('$name', '$email','$hashed_Password')";
                $res = mysqli_query($conn, $sql);
                if($res){
                    $success = "User Added Successfully";
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
<h1 class="text-center col-12 bg-info py-3 text-white my-2">Add New User</h1>
<?php if ($error) : ?>
    <h5 class="alert alert-danger text-center"><?= $error; ?></h5>
<?php endif; ?>
<?php if ($success) : ?>
    <h5 class="alert alert-success text-center"><?= $success; ?></h5>
<?php endif; ?>
<div class="col-md-6 offset-md-3">
    <form class="my-2 p-3 border" method="POST" action="<?= $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label for="exampleInputName1">Full Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputName1">
        </div>
        <div class="form-group">
            <label for="exampleInputName1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

<?php include('inc/footer.php'); ?>