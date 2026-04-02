<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}

include("../config/db_connection.php");

$result = mysqli_query($conn, "SELECT * FROM books");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>View Books</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand">Admin Panel</span>
        <a href="dashboard.php" class="btn btn-light btn-sm">Back</a>
    </div>
</nav>

<div class="container mt-4">

    <h2 class="mb-4 text-center"> All Books</h2>

    <div class="row">

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-sm">

                <img src="images/<?php echo $row['image']; ?>" 
                     class="card-img-top"
                     style="height:250px; object-fit:cover;">

                <div class="card-body text-center">
                    
                    <h5 class="card-title">
                        <?php echo $row['title']; ?>
                    </h5>

                    <p class="card-text text-muted">
                        <?php echo $row['author']; ?>
                    </p>

                    <p class="card-text text-secondary">
                        Quantity: <?php echo $row['quantity']; ?>
                    </p>

                    <h6 class="text-success">
                        ₹<?php echo $row['price']; ?>
                    </h6>

                

                </div>

                <div class="card-footer text-center bg-white border-0">

                    <a href="book_details.php?id=<?php echo $row['id']; ?>" 
                     class="btn btn-primary btn-sm">Details</a>

                </div>

            </div>
        </div>

        <?php } ?>

    </div>

</div>

</body>
</html>