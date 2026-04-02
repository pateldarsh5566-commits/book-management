<?php
include("../config/db_connection.php");
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp, "images/".$image);
$description = $_POST['description'];

$query = "INSERT INTO books(title, author, price, image, description, quantity)
          VALUES('$title','$author','$price','$image','$description','$quantity')";
    mysqli_query($conn, $query);

    $success = "Book Added Successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Book</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand">Admin Panel</span>
        <a href="dashboard.php" class="btn btn-light btn-sm">Back</a>
    </div>
</nav>

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-body">

            <h3 class="mb-4 text-center"> Add Book</h3>

            <?php if(isset($success)) { ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php } ?>

            <form method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label class="form-label">Book Title</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Author</label>
                    <input type="text" name="author" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Quantity (Stock)</label>
                    <input type="number" name="quantity" class="form-control" min="0" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Book Image</label>
                    <input type="file" name="image" class="form-control" required>
                </div>

                <button name="submit" class="btn btn-success w-100">
                    Add Book
                </button>

            </form>

        </div>
    </div>

</div>

</body>
</html>