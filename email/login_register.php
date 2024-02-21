<?php

require 'connection.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function sendMail($email, $v_code)
{
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    require 'PHPMailer/Exception.php';

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'shopflix420@gmail.com';
        $mail->Password   = '';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('shopflix420@gmail.com', 'SHOPFLIX');
        $mail->addAddress($email, 'test');
        $mail->isHTML(true);
        $mail->Subject = 'Email verification from Shopflix';
        $mail->Body    = "Thanks for registration! Click the link below to verify the email address <a href='http://localhost/Email_verification/Verify.php?email=$email&v_code=$v_code'>Verify</a>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

function showAlertAndRedirect($message, $location = 'index.php')
{
    echo "
        <script>
            alert('$message');
            window.location.href='$location';
        </script>
    ";
}

function executeQuery($query, $successMessage, $failureMessage)
{
    global $con;

    if (mysqli_query($con, $query)) {
        showAlertAndRedirect($successMessage);
    } else {
        showAlertAndRedirect($failureMessage);
    }
}

if (isset($_POST['login'])) {
    $query = "SELECT * FROM `registered_users` WHERE `email`='$_POST[email]' OR `username`='$_POST[username]'";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $result_fetch = mysqli_fetch_assoc($result);

        if ($result_fetch['is_verified'] == 1) {
            if (password_verify($_POST['password'], $result_fetch['password'])) {
                $_SESSION['logged_in'] = true;
                $_SESSION['username'] = $result_fetch['username'];
                header("location: index.php");
            } else {
                showAlertAndRedirect('Incorrect password');
            }
        } else {
            showAlertAndRedirect('Email is not Verified');
        }
    } else {
        showAlertAndRedirect('Email or Username is not Registered');
    }
}

if (isset($_POST['register'])) {
    $user_exist_query = "SELECT * FROM `registered_users` WHERE `username`='$_POST[username]' OR `email`='$_POST[email]'";
    $result = mysqli_query($con, $user_exist_query);

    if ($result && mysqli_num_rows($result) > 0) {
        $result_fetch = mysqli_fetch_assoc($result);
        showAlertAndRedirect($result_fetch['username'] . ' - username already taken');
    } else {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $v_code = bin2hex(random_bytes(16));
        $query = "INSERT INTO `registered_users`(`full_name`, `username`, `email`, `password`, `verification_code`, `is_verified`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$password','$v_code','0')";

        executeQuery($query, 'Registration successfully', 'Server Down');
        sendMail($_POST['email'], $v_code);
    }
}
?>
