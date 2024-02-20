<?php

require("connection.php");

if (isset($_GET['email']) && isset($_GET['v_code'])) {
    $query = "SELECT * FROM `registered_users` WHERE `email`='$_GET[email]' AND `verification_code`='$_GET[v_code]'";
    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['is_verified'] == 0) {
                $update = "UPDATE `registered_users` SET `is_verified`=1 WHERE `email`='$result_fetch[email]'";
                if (mysqli_query($con, $update)) {
                    echo "
                    <script>
                         alert('Email verification successful');
                         window.location.href='index.php';
                    </script>
                    ";
                } else {
                    echo "
                    <script>
                         alert('Error updating database. Server Down');
                         window.location.href='index.php';
                    </script>
                    ";
                }
            } else {
                echo "
                    <script>
                         alert('Email Already Verified');
                         window.location.href='index.php';
                    </script>
                    ";
            }
        }
    } else {
        echo "
        <script>
             alert('Cannot run Query. Server Down');
             window.location.href='index.php';
        </script>
        ";
    }
}

?>
