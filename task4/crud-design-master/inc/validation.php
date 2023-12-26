<?php
$error = '';
$success = '';
function required_Input($input)
{
    $str = trim($input);
    if (strlen($str) > 0) {
        return true;
    }
    return false;
}

// sanitization functions

function sant_input($input)
{
    $str = trim($input);
    $str = htmlspecialchars(htmlentities($str));
    return $str;
}
// email
function sant_email($input)
{
    $email = trim($input);
    $email = htmlspecialchars(htmlentities(filter_var($email, FILTER_SANITIZE_EMAIL)));
    return $email;
}
// validate minimum
function validateMinimum($input)
{
    if (strlen($input) > 3) {
        return true;
    } else {
        return false;
    }
}
// validate maximum
function validateMaximum($input)
{
    if (strlen($input) < 30) {
        return true;
    } else {
        return false;
    }
}
// validate email
function validateEmail($input)
{
    if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}
