<?php
// Include your connection file
include('connection.php');

// Fetch data from the users table
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if (!$result) {
    // Query execution failed, handle the error
    echo "Error: " . $conn->error;
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Report</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@icon/themify-icons@1.0.1-alpha.3/themify-icons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

       <style>
            table th td {
                text-align: center;
            }

            .bi-exclamation-triangle {
                color: red;
                font-size: 28px;
            }
            .bi-check{
                color: green;
                font-size: 28px;
            }
        </style>
        <link rel="stylesheet" href="style/index.css">
    </head>

    <body>
        <div class="flex">
        <?php include('includes/nav.php'); ?>


        
        <div class="container mt-5">
            <h2>User Report</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Check if there are rows in the result
                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["user_id"] . "</td>";
                            echo "<td>" . $row["user_name"] . "</td>";
                            echo "<td>" . $row["user_email"] . "</td>";
                            echo "<td><i class='bi bi-exclamation-triangle'></i></td>";
                            echo "<td><i class='bi bi-check'></i></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No users found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        </div>
  

 
    </body>

    </html>
<?php } ?>
