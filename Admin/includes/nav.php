<div class="navbar">

<?php
session_start();
// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}
?>
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

</div>