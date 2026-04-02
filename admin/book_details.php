<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}

include("../config/db_connection.php");



$id = $_GET['id'];

$query = "SELECT * FROM books WHERE id=$id";
$result = mysqli_query($conn, $query);
$book = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Book Details</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand">Admin Panel</span>
        <a href="view_books.php" class="btn btn-light btn-sm">Back</a>
    </div>
</nav>

<div class="container mt-5">

    <div class="card shadow">
        <div class="row g-0">

            <div class="col-md-4 text-center p-3">
                <img src="images/<?php echo $book['image']; ?>" 
                     class="img-fluid rounded"
                     style="max-height:350px;">
            </div>

            <div class="col-md-8">
                <div class="card-body">

                    <h3 class="card-title">
                        <?php echo $book['title']; ?>
                    </h3>

                    <p class="text-muted">
                        Author: <?php echo $book['author']; ?>
                    </p>

                    <h4 class="text-success">
                        ₹<?php echo $book['price']; ?>
                    </h4>

                    <h4 class="text-secondary">
                    <p class="card-text">
                        Quantity in Stock: <?php echo $book['quantity']; ?>
                    </p>
                    </h4>                   

                    <hr>

                    <p class="card-text">
                        <?php echo substr($book['description'], 0, 50); ?>...
                    </p>
                       
                    </p>

                    <a href="view_books.php" class="btn btn-secondary">Back</a>

                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>