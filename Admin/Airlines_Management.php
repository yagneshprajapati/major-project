<?php
// Database connection
include("/wamp64/www/shopflix/Admin/connection.php");

// Handle form submissions
if(isset($_POST["action"])) {
    if($_POST["action"] == "add") {
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $airline_name = $_POST["airline_name"];
        
        // Handle file upload
        $logo = $_FILES["logo"]["name"];
        $logo_tmp = $_FILES["logo"]["tmp_name"];
        $logo_path = "uploads/" . $logo; // Set your desired upload directory
        
        // Move uploaded file to destination directory
        move_uploaded_file($logo_tmp, $logo_path);
        
        $sql = "INSERT INTO airline (email, pass, airline_name, logo) VALUES ('$email', '$pass', '$airline_name', '$logo_path')";
        $result = mysqli_query($conn, $sql);
        if($result) {
            echo "Record added successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airline Management</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <button id="showAddModal" class="btn btn-primary mb-3">Add Airline</button>
        <table class="table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Airline Name</th>
                    <th>Logo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM airline";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>".$row["email"]."</td>";
                    echo "<td>".$row["pass"]."</td>";
                    echo "<td>".$row["airline_name"]."</td>";
                    echo "<td><img src='".$row["logo"]."' style='max-width: 100px;' /></td>";
                    echo "<td><button class='btn btn-info'>Update</button> <button class='btn btn-danger'>Delete</button></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Add Airline Modal -->
    <div id="addModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="addForm" method="POST" action="" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Airline</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" class="form-control" name="pass">
                        </div>
                        <div class="form-group">
                            <label>Airline Name:</label>
                            <input type="text" class="form-control" name="airline_name">
                        </div>
                        <div class="form-group">
                            <label>Logo:</label>
                            <input type="file" class="form-control-file" name="logo">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="action" value="add">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function () {
            // Show add modal
            $("#showAddModal").click(function () {
                $("#addModal").modal('show');
            });
        });
    </script>
</body>

</html>
