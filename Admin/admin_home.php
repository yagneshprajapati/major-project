<?php
session_start();
// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@icon/themify-icons@1.0.1-alpha.3/themify-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <style>
        /* Navbar styles */
        .admin-navbar {
            background-color: #333;
            color: white;
            padding: 10px 0;
            position: fixed;
            top: 0;
            left: 0;
            /* Initially shown */
            height: 100%;
            width: 250px;
            transition: left 0.3s;
            z-index: 1;
        }

        .admin-navbar.closed {
            left: -250px;
            /* Move left to hide */
        }

        .admin-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 1200px;
            margin-left: 0;
            /* Adjust for the menu width */
            padding: 0 20px;
        }

        .admin-logo a {
            text-decoration: none;
            font-size: 24px;
            font-weight: bold;
            color: white;
        }

        .admin-logo a:hover {
            text-decoration: underline;
        }

        .admin-nav-links {
            list-style-type: none;
            display: flex;
            flex-direction: column;
        }

        .admin-nav-links li {
            margin-bottom: 20px;
        }

        .admin-nav-links a {
            text-decoration: none;
            color: white;
        }

        .admin-nav-links a:hover {
            text-decoration: underline;
        }

        /* Hamburger icon */
        .hamburger-icon {
            position: fixed;
            top: 20px;
            left: 20px;
            cursor: pointer;
            color: brown;
            /* Change color to black */
            font-size: 24px;
            z-index: 2;
            /* Ensure it's above the navbar */
        }

        /* Toggle menu width when clicking the hamburger icon */
        .menu-closed .admin-navbar {
            left: -250px;
        }

        /* Adjust padding for main content */
        .main-content {
            padding-right: 250px;
            /* Same width as the sidebar */
            margin-left: 250px;
            /* Adjust for the navbar width */
        }

        .admin-nav-links a {
            text-decoration: none;
            color: white;
        }

        .admin-nav-links a:hover {
            text-decoration: none;
            /* Remove text decoration on hover */
        }

        /* Style for menu item with children */
        .menu-item-has-children {
            position: absolute;
            bottom: 20px;
            /* Adjust as needed */
            left: 70px;
            width: 100%;
        }

        /* Style for the square digits */
        .square-digit {
            width: 100px;
            height: 100px;
            background-color: #007bff;
            color: white;
            font-size: 24px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 10px;
        }
    </style>
</head>

<body>
    <div class="hamburger-icon" onclick="toggleMenu()">
        &#9776;
    </div>

    <nav class="admin-navbar menu-closed">
        <ul class="admin-nav-links">


            <div class="admin-container">
                <div class="card-body">
                    <div class="user-icon">
                        <!-- User Icon -->
                        <i class="fas fa-user-circle fa-5x"></i>
                    </div>
                    <div>
                        <p>Welcome, <?php echo isset($_SESSION["username"]) ? $_SESSION["username"] : "Guest"; ?>!</p>
                        <!-- Add more content for the admin home page as needed -->
                    </div>
                </div>
                <div class="admin-logo">
                    <a href="#">Admin Dashboard</a>
                </div>
                <div class="nav" style="margin-top: 25px;">
                    <li><a href="User_Profile.php">User Profile</a></li>
                    <li><a href="Category_Management.php">Category Management</a></li>
                    <li><a href="Product_Management.php">Product Management</a></li>
                    <li><a href="Order_Details.php">Order Details</a></li>
                    <li><a href="Airlines_Management">Airlines Management</a></li>
                    <li><a href="Airport_Management.php">Airport Management</a></li>
                    <li><a href="Manage_Booking.php">Manage Booking</a></li>
                    <li><a href="Inventory_management.php">Inventory management</a></li>
                    <li><a href="Feedback.php">Feedback</a></li>
                </div>
                <div>
                    <li class="menu-item-has-children">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                    </li>
                </div>
            </div>
        </ul>
    </nav>

    <!-- main content -->
    <section class="main" style="padding-left:120px; margin:20px">
        <div class="container mt-5 main-content">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="square-digit">
                        <!-- Logged-in users count -->
                        <div>Logged-in Users</div>
                        <div>5</div> <!-- Example number, replace with dynamic value -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="square-digit">
                        <!-- Active users count -->
                        <div>Active Users</div>
                        <div>3</div> <!-- Example number, replace with dynamic value -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="square-digit">
                        <!-- Total inventory count -->
                        <div>Total Inventory</div>
                        <div>100</div> <!-- Example number, replace with dynamic value -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="square-digit">
                        <!-- Total orders count -->
                        <div>Total Orders</div>
                        <div>50</div> <!-- Example number, replace with dynamic value -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function toggleMenu() {
            var navbar = document.querySelector(".admin-navbar");
            var body = document.querySelector("body");

            // Toggle the "menu-closed" class to show/hide the menu
            body.classList.toggle("menu-closed");
        }
    </script>

</body>

</html>
