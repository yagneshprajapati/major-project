<?php  
$insert = false;
$update = false;
$delete = false;

$servername = "localhost";
$username = "root";
$password = "";
$database = "shopflixdb"; // Change the database name to "shopflixdb"

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

if(isset($_GET['delete'])){
  $category_id = $_GET['delete']; 
  $delete = true;
  $sql = "DELETE FROM `add_category` WHERE `category_id` = $category_id"; 
  $result = mysqli_query($conn, $sql);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if (isset($_POST['category_idEdit'])){
    $category_id = $_POST["category_idEdit"];
    $category_name = $_POST["category_nameEdit"];
    $sub_category = $_POST["sub_categoryEdit"];

    $sql = "UPDATE `add_category` SET `category_name` = '$category_name', `sub_category` = '$sub_category' WHERE `category_id` = $category_id"; 
    $result = mysqli_query($conn, $sql);

    if($result){
      $update = true;
    } else {
      echo "We could not update the record successfully";
    }
  } else {
    $category_name = $_POST["category_name"];
    $sub_category = $_POST["sub_category"];

    $sql = "INSERT INTO `add_category` (`category_name`, `sub_category`) VALUES ('$category_name', '$sub_category')";
    $result = mysqli_query($conn, $sql);

    if($result){ 
      $insert = true;
    } else {
      echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
    } 
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

  <title>Adding Category</title>
  <style>
    /* Reset some default styles for better consistency */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Global styles */
    body {
      background-image: url('/Awd Project/image minor/product.png');
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center center;
      font-family: Arial, sans-serif;
    }

    .container {
      padding: 20px;
    }

    h2 {
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    /* Table styles */
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    table,
    th,
    td {
      border: 1px solid #ccc;
    }

    th,
    td {
      padding: 10px;
      text-align: left;
    }

    /* Modal styles */
    .modal-header {
      background-color: #333;
      color: white;
    }

    .modal-content {
      border-radius: 0;
    }

    .modal-body {
      padding: 20px;
    }

    .modal-footer {
      text-align: right;
    }

    /* Buttons */
    .btn-primary {
      background-color: #007bff;
      border: none;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    .btn-secondary {
      background-color: #6c757d;
      border: none;
    }

    .btn-secondary:hover {
      background-color: #545b62;
    }

    /* Alerts */
    .alert {
      margin-top: 20px;
    }

    /* Optional: Style for the delete confirmation dialog */
    .confirm-dialog {
      text-align: center;
      padding: 20px;
      background-color: #f8d7da;
      border: 1px solid #f5c6cb;
      border-radius: 4px;
      margin-top: 10px;
      display: none;
    }

    .confirm-dialog h4 {
      margin-bottom: 10px;
      color: #721c24;
    }

    .confirm-dialog .btn-danger {
      background-color: #dc3545;
      border: none;
      margin: 5px;
    }

    .confirm-dialog .btn-danger:hover {
      background-color: #c82333;
    }
  </style>
</head>

<body>

  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit this Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="/shopflix/Admin/Category_Management.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="category_idEdit" id="category_idEdit">
            <div class="form-group">
              <label for="category_nameEdit">Category Name</label>
              <input type="text" class="form-control" id="category_nameEdit" name="category_nameEdit">
            </div>
            <div class="form-group">
              <label for="sub_categoryEdit">Sub Category</label>
              <input type="text" class="form-control" id="sub_categoryEdit" name="sub_categoryEdit">
            </div>
          </div>
          <div class="modal-footer d-block mr-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your record has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your record has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your record has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
  <div class="container my-4">
    <h2>Adding Category</h2>
    <form action="/shopflix/Admin/Category_Managment.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="category_name">Category Name</label>
        <input type="text" class="form-control" id="category_name" name="category_name" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="sub_category">Sub Category</label>
        <input type="text" class="form-control" id="sub_category" name="sub_category" aria-describedby="emailHelp">
      </div>
      <button type="submit" class="btn btn-primary">Add Category</button>
    </form>
  </div>

  <div class="container my-4">
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">Category ID</th>
          <th scope="col">Category Name</th>
          <th scope="col">Sub Category</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `add_category`"; 
          $result = mysqli_query($conn, $sql);
          $category_id = 0;
          while($row = mysqli_fetch_assoc($result)){
            $category_id = $category_id + 1;
            echo "<tr>
            <th scope='row'>". $category_id . "</th>
            <td>". $row['category_name'] . "</td>
            <td>". $row['sub_category'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['category_id'].">Edit</button> <button class='delete btn btn-sm btn-primary' id=d".$row['category_id'].">Delete</button>  </td>
          </tr>";
        } 
        ?>
      </tbody>
    </table>
  </div>
  <hr>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });

    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        tr = e.target.parentNode.parentNode;
        category_name = tr.getElementsByTagName("td")[0].innerText;
        sub_category = tr.getElementsByTagName("td")[1].innerText;
        category_idEdit.value = e.target.id;
        category_nameEdit.value = category_name;
        sub_categoryEdit.value = sub_category;
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        category_id = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this record!")) {
          window.location = `/shopflix/Admin/Product_Management.php?delete=${category_id}`;
        }
      })
    })
  </script>
</body>

</html>
