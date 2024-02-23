<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate CAPTCHA
    if ($_POST['captcha'] !== $_SESSION['captcha']) {
        echo "Incorrect CAPTCHA!";
        exit;
    }

    $username = $_POST['username'];
    $password = $_POST['password'];

    $valid_username = "user";
    $valid_password = "password";

    if ($username === $valid_username && $password === $valid_password) {
        echo "Login successful!";
    } else {
        echo "Invalid username or password!";
    }
    
    unset($_SESSION['captcha']);
} else {
    header("Location: index.php");
    exit;
}
?>
