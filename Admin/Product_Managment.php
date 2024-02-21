<?php  
$insert = false;
$update = false;
$delete = false;

$servername = "localhost";
$username = "root";
$password = "";
$database = "shopflixdb";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn){
    die("Sorry, we failed to connect: " . mysqli_connect_error());
}

// Directory to store uploaded images
$target_dir = "uploads/";

if(isset($_GET['delete'])){
  $prod_id = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `products` WHERE `prod_id` = $prod_id";
  $result = mysqli_query($conn, $sql);
  if($result){
    $delete = true;
  } else {
    die("Error deleting record: " . mysqli_error($conn));
  }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if (isset($_POST['prod_idEdit'])){
    // Update existing record
    $prod_id = $_POST["prod_idEdit"];
    $prod_name = $_POST["prod_nameEdit"];
    $prod_price = $_POST["prod_priceEdit"];
    $prod_des = $_POST["prod_desEdit"];
    $prod_img1 = $_FILES["prod_img1Edit"]["name"];
    $prod_img2 = $_FILES["prod_img2Edit"]["name"];
    $prod_img3 = $_FILES["prod_img3Edit"]["name"];
    $prod_rating = $_POST["prod_ratingEdit"];

    move_uploaded_file($_FILES["prod_img1Edit"]["tmp_name"], $target_dir . $prod_img1);
    move_uploaded_file($_FILES["prod_img2Edit"]["tmp_name"], $target_dir . $prod_img2);
    move_uploaded_file($_FILES["prod_img3Edit"]["tmp_name"], $target_dir . $prod_img3);

    $sql = "UPDATE `products` SET `prod_name` = '$prod_name', `prod_price` = '$prod_price', `prod_des` = '$prod_des', `prod_img1` = '$prod_img1', `prod_img2` = '$prod_img2', `prod_img3` = '$prod_img3',`prod_rating` = '$prod_rating' WHERE `products`.`prod_id` = $prod_id";
    $result = mysqli_query($conn, $sql);

    if($result){
      $update = true;
    } else {
      die("Error updating record: " . mysqli_error($conn));
    }
  } else {
    // Insert new record
    $prod_name = $_POST["prod_name"];
    $prod_price = $_POST["prod_price"];
    $prod_des = $_POST["prod_des"];
    $prod_img1 = $_FILES["prod_img1"]["name"];
    $prod_img2 = $_FILES["prod_img2"]["name"];
    $prod_img3 = $_FILES["prod_img3"]["name"];
    $prod_rating = $_POST["prod_rating"];

    move_uploaded_file($_FILES["prod_img1"]["tmp_name"], $target_dir . $prod_img1);
    move_uploaded_file($_FILES["prod_img2"]["tmp_name"], $target_dir . $prod_img2);
    move_uploaded_file($_FILES["prod_img3"]["tmp_name"], $target_dir . $prod_img3);

    $sql = "INSERT INTO `products` (`prod_name`, `prod_price`, `prod_des`, `prod_img1`, `prod_img2`, `prod_img3`,`prod_rating`) VALUES ('$prod_name', '$prod_price', '$prod_des', '$prod_img1', '$prod_img2','$prod_img3','$prod_rating')";
    $result = mysqli_query($conn, $sql);

    if($result){ 
      $insert = true;
    } else {
      die("Error inserting record: " . mysqli_error($conn));
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <title>Adding Product</title>
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

    /* Custom styles */
    .form-group {
      width: 50%; /* Adjust the width of the form elements */
      margin: 0 auto; /* Center align the form elements */
    }

    .modal-body {
      padding: 20px; /* Increase padding for better readability */
    }

    .modal-dialog {
      max-width: 70%; /* Adjust the maximum width of the modal dialog */
      margin: 100px auto; /* Center align the modal */
    }

    .container {
      max-width: 80%; /* Adjust the maximum width of the container */
      margin: 0 auto; /* Center align the container */
    }
  </style>
</head>

<body>
  <?php include('./include/navbar.php'); ?>
  <!-- Edit Modal -->
  <div class="container1 modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <form action="/shopflix/Admin/Product_Managment.php" method="POST" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="prod_idEdit" id="prod_idEdit">
            <div class="form-group">
              <label for="prod_nameEdit">Pname</label>
              <input type="text" class="form-control" id="prod_nameEdit" name="prod_nameEdit" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
              <label for="prod_priceEdit">Pprice</label>
              <input type="text" class="form-control" id="prod_priceEdit" name="prod_priceEdit">
            </div>
            <div class="form-group">
              <label for="prod_desEdit">Pdes</label>
              <textarea class="form-control" id="prod_desEdit" name="prod_desEdit" rows="3"></textarea>
            </div>

            <div class="form-group">
              <label for="prod_img1Edit">Pimage1</label>
              <input type="file" class="form-control-file" id="prod_img1Edit" name="prod_img1Edit">
            </div>

            <div class="form-group">
              <label for="prod_img2Edit">Pimage2</label>
              <input type="file" class="form-control-file" id="prod_img2Edit" name="prod_img2Edit">
            </div>

            <div class="form-group">
              <label for="prod_img3Edit">Pimage3</label>
              <input type="file" class="form-control-file" id="prod_img3Edit" name="prod_img3Edit">
            </div>

            <div class="form-group">
              <label for="prod_ratingEdit">Prating</label>
              <input type="text" class="form-control" id="prod_ratingEdit" name="prod_ratingEdit">
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

  <!-- Display success and error messages -->
  <?php if($insert): ?>
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> Your record has been inserted successfully
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>×</span>
      </button>
    </div>
  <?php endif; ?>

  <?php if($delete): ?>
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> Your record has been deleted successfully
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>×</span>
      </button>
    </div>
  <?php endif; ?>

  <?php if($update): ?>
    <div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> Your record has been updated successfully
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>×</span>
      </button>
    </div>
  <?php endif; ?>

  <!-- Form to add a new product -->
  <div class="container my-4">
    <h2>Adding Product</h2>
    <form action="/shopflix/Admin/Product_Managment.php" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="prod_name">Pname</label>
        <input type="text" class="form-control" id="prod_name" name="prod_name" aria-describedby="emailHelp">
      </div>
      <div class="form-group">
        <label for="prod_price">Pprice</label>
        <input type="text" class="form-control" id="prod_price" name="prod_price" aria-describedby="emailHelp">
      </div>

      <div class="form-group">
        <label for="prod_des">Pdesc</label>
        <textarea class="form-control" id="prod_des" name="prod_des" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="prod_img1">Pimage1</label>
        <input type="file" class="form-control-file" id="prod_img1" name="prod_img1">
      </div>

      <div class="form-group">
        <label for="prod_img2">Pimage2</label>
        <input type="file" class="form-control-file" id="prod_img2" name="prod_img2">
      </div>

      <div class="form-group">
        <label for="prod_img3">Pimage3</label>
        <input type="file" class="form-control-file" id="prod_img3" name="prod_img3">
      </div>

      <div class="form-group">
        <label for="prod_rating">Prating</label>
        <input type="text" class="form-control" id="prod_rating" name="prod_rating">
      </div>

      <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
  </div>

  <!-- Displaying the product table -->
  <div class="container my-4">
    <table class="table" id="myTable">
      <thead>
        <tr>
          <th scope="col">prod_id</th>
          <th scope="col">prod_name</th>
          <th scope="col">prod_price</th>
          <th scope="col">prod_des</th>
          <th scope="col">prod_img1</th>
          <th scope="col">prod_img2</th>
          <th scope="col">prod_img3</th>
          <th scope="col">prod_rating</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          $sql = "SELECT * FROM `products`";
          $result = mysqli_query($conn, $sql);
          $prod_id = 0;
          while($row = mysqli_fetch_assoc($result)){
            $prod_id = $prod_id + 1;
            echo "<tr>
            <th scope='row'>". $prod_id . "</th>
            <td>". $row['prod_name'] . "</td>
            <td>". $row['prod_price'] . "</td>
            <td>". $row['prod_des'] . "</td>
            <td><img src='uploads/{$row['prod_img1']}'  alt='{$row['prod_img1']}' width='100'></td>
            <td><img src='uploads/{$row['prod_img2']}'  alt='{$row['prod_img2']}' width='100'></td>
            <td><img src='uploads/{$row['prod_img3']}'  alt='{$row['prod_img3']}' width='100'></td>
            <td>". $row['prod_rating'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id='{$row['prod_id']}'>Edit</button> <button class='delete btn btn-sm btn-primary' id='d{$row['prod_id']}'>Delete</button>  </td>
          </tr>";
        } 
        ?>
      </tbody>
    </table>
  </div>
  <hr>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#myTable').DataTable();
    });
  </script>
  <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("edit ");
        tr = e.target.parentNode.parentNode;
        prod_name = tr.getElementsByTagName("td")[0].innerText;
        prod_price = tr.getElementsByTagName("td")[1].innerText;
        prod_des = tr.getElementsByTagName("td")[2].innerText;
        prod_img1 = tr.getElementsByTagName("td")[3].innerText;
        prod_img2 = tr.getElementsByTagName("td")[4].innerText;
        prod_img3 = tr.getElementsByTagName("td")[5].innerText;
        prod_rating = tr.getElementsByTagName("td")[6].innerText;

        document.getElementById("prod_nameEdit").value = prod_name;
        document.getElementById("prod_priceEdit").value = prod_price;
        document.getElementById("prod_desEdit").value = prod_des;
        document.getElementById("prod_img1Edit").value = prod_img1;
        document.getElementById("prod_img2Edit").value = prod_img2;
        document.getElementById("prod_img3Edit").value = prod_img3;
        document.getElementById("prod_ratingEdit").value = prod_rating;
        document.getElementById("prod_idEdit").value = e.target.id;
        $('#editModal').modal('toggle');
      })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
      element.addEventListener("click", (e) => {
        console.log("delete ");
        sno = e.target.id.substr(1);

        if (confirm("Are you sure you want to delete this record!")) {
          console.log("yes");
          window.location = `/shopflix/Admin/Product_Managment.php?delete=${sno}`;
        }
        else {
          console.log("no");
        }
      })
    })
  </script>
</body>
</html>
