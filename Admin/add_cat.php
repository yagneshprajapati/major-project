<?php
$insertCategory = false;
$updateCategory = false;
$deleteCategory = false;
$insertSubCategory = false;
$updateSubCategory = false;
$deleteSubCategory = false;

$servername = "localhost";
$username = "root";
$password = "";
$database = "shopflixdb"; // Change the database name to "shopflixdb"

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn) {
    die("Sorry we failed to connect: " . mysqli_connect_error());
}

// Function to get the full category path (including parent categories) for a given category ID
function getCategoryPath($conn, $categoryId) {
    $path = '';
    while ($categoryId != null) {
        $sql = "SELECT category_id, category_name, parent_category_id FROM `category` WHERE `category_id` = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $categoryId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $path = $row['category_name'] . ' > ' . $path;
            $categoryId = $row['parent_category_id'];
        } else {
            $categoryId = null;
        }
    }

    return rtrim($path, ' > '); // Remove trailing ' > '
}

// Handle category deletion
if (isset($_GET['delete'])) {
    $category_id = $_GET['delete'];
    $sql = "DELETE FROM `category` WHERE `category_id` = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $category_id);
    $deleteCategory = mysqli_stmt_execute($stmt);
}

// Handle subcategory deletion
if (isset($_GET['deleteSubCategory'])) {
    $subcategory_id = $_GET['deleteSubCategory'];
    $sql = "DELETE FROM `category` WHERE `category_id` = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $subcategory_id);
    $deleteSubCategory = mysqli_stmt_execute($stmt);
}

// Handle category form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addCategory'])) {
    $categoryName = $_POST["categoryName"];
    $sql = "INSERT INTO `category` (`category_name`, `parent_category_id`) VALUES (?, NULL)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $categoryName);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $insertCategory = true;
    } else {
        echo "The category record was not inserted successfully because of this error ---> " . mysqli_error($conn);
    }
}

// Handle subcategory form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addSubCategory'])) {
    $subCategoryName = $_POST["subCategoryName"];
    $parentCategoryID = $_POST["parentCategoryID"];
    $sql = "INSERT INTO `category` (`category_name`, `parent_category_id`) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $subCategoryName, $parentCategoryID);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        $insertSubCategory = true;
    } else {
        echo "The subcategory record was not inserted successfully because of this error ---> " . mysqli_error($conn);
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

    <div class="container my-4">
        <h2>Add Category</h2>
        <form action="/shopflix/Admin/Category_Managment.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="categoryName">Category Name</label>
                <input type="text" class="form-control" id="categoryName" name="categoryName" aria-describedby="emailHelp">
            </div>
            <button type="submit" class="btn btn-primary" name="addCategory">Add Category</button>
        </form>
    </div>

    <?php
    if ($insertCategory) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Category has been added successfully
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>×</span>
        </button>
      </div>";
    }
    ?>

    <div class="container my-4">
        <h2>Add Subcategory</h2>
        <form action="/shopflix/Admin/Category_Managment.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="subCategoryName">Subcategory Name</label>
                <input type="text" class="form-control" id="subCategoryName" name="subCategoryName"
                    aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="parentCategoryID">Parent Category</label>
                <select class="form-control" id="parentCategoryID" name="parentCategoryID">
                    <option value="" selected>Select Category</option>
                    <?php
                    $sql = "SELECT * FROM `category` WHERE `parent_category_id` IS NULL";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['category_id'] . "'>" . $row['category_name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="addSubCategory">Add Subcategory</button>
        </form>
    </div>

    <?php
    if ($insertSubCategory) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Subcategory has been added successfully
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>×</span>
        </button>
      </div>";
    }
    ?>

    <div class="container my-4">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Category ID</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Parent Category</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT category_id, category_name, parent_category_id FROM `category`";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <th scope='row'>" . $row['category_id'] . "</th>
                        <td>" . $row['category_name'] . "</td>
                        <td>" . getCategoryPath($conn, $row['parent_category_id']) . "</td>
                        <td>
                            <button class='edit btn btn-sm btn-primary' id=" . $row['category_id'] . ">Edit</button>
                            <button class='delete btn btn-sm btn-primary' id=d" . $row['category_id'] . ">Delete</button>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <hr>
    <!-- Your modals should be placed here -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const edits = document.querySelectorAll('.edit');
            edits.forEach((element) => {
                element.addEventListener("click", (e) => {
                    const tr = e.target.parentNode.parentNode;
                    const category_name = tr.getElementsByTagName("td")[0].innerText;
                    category_idEdit.value = e.target.id;
                    category_nameEdit.value = category_name;
                    // Assuming you have the edit modal with the id 'editModal'
                    $('#editModal').modal('toggle');
                });
            });

            const deletes = document.querySelectorAll('.delete');
            deletes.forEach((element) => {
                element.addEventListener("click", (e) => {
                    const category_id = e.target.id.substr(1);
                    if (confirm("Are you sure you want to delete this record?")) {
                        window.location = `/shopflix/Admin/Category_Managment.php?delete=${category_id}`;
                    }
                });
            });
        });
    </script>
</body>

</html>
