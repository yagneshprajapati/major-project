<?php
// Database configuration
$servername = "localhost"; // Change this to your database server name if different
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "testing"; // Change this to your database name

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

if(mysqli_connect_error()){
    echo"<script>alert('cannot connect to the database');</script>";
}

?>