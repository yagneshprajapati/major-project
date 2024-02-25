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
<<<<<<< Updated upstream
=======
            echo "Error uploading file.";
        }
    } elseif ($_POST["action"] == "edit") {
        // Handle edit operation
        $email = $_POST["edit_email"];
        $pass = $_POST["edit_pass"];
        $airline_name = $_POST["edit_airline_name"];
        $airline_id = $_POST["edit_airline_id"];
        
        // Perform the update query
        $sql = "UPDATE airline SET email='$email', pass='$pass', airline_name='$airline_name' WHERE id='$airline_id'";
        $result = mysqli_query($conn, $sql);
        if($result) {
            echo "Record updated successfully.";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } elseif ($_POST["action"] == "delete") {
        // Handle delete operation
        $airline_id = $_POST["delete_airline_id"];
        
        // Perform the delete query
        $sql = "DELETE FROM airline WHERE id='$airline_id'";
        $result = mysqli_query($conn, $sql);
        if($result) {
            echo "Record deleted successfully.";
        } else {
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
=======
            // Show add/edit modal
            $(".editBtn").click(function () {
                var airline_id = $(this).data("id");
                $.ajax({
                    url: "get_airline.php",
                    method: "POST",
                    data: {id: airline_id},
                    dataType: "json",
                    success: function (data) {
                        if (data.hasOwnProperty('id')) { // Check if 'id' index exists
                            $("#edit_airline_id").val(data.id);
                            $("#edit_email").val(data.email);
                            $("#edit_pass").val(data.pass);
                            $("#edit_airline_name").val(data.airline_name);
                            $("#modal_action").val("edit");
                            $("#addEditModal").modal("show");
                        } else {
                            console.error("Error: 'id' index not found in response data.");
                        }
                    }
                });
            });

            // Show delete modal
            $(".deleteBtn").click(function () {
                var airline_id = $(this).data("id");
                if (confirm("Are you sure you want to delete this record?")) {
                    $.ajax({
                        url: "delete_airline.php",
                        method: "POST",
                        data: {id: airline_id},
                        success: function (data) {
                            alert(data);
                            location.reload();
                        }
                    });
                }
            });

>>>>>>> Stashed changes
            // Show add modal
            $("#showAddModal").click(function () {
                $("#addModal").modal('show');
            });
        });
    </script>
</body>
</html>
