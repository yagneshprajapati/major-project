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

   <link rel="stylesheet" href="style/index.css">
</head>

<body>
   
<?php include('./include/navbar.php'); ?>

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
