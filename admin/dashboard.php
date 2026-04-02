<?php
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}

include("../config/db_connection.php");

$book_query = "SELECT COUNT(*) AS total_books FROM books";
$book_result = mysqli_query($conn, $book_query);
$book_data = mysqli_fetch_assoc($book_result);
$total_books = $book_data['total_books'];

$user_query = "SELECT COUNT(*) AS total_users FROM users";
$user_result = mysqli_query($conn, $user_query);
$user_data = mysqli_fetch_assoc($user_result);
$total_users = $user_data['total_users'];

$order_query = "SELECT COUNT(*) AS total_orders FROM orders";
$order_result = mysqli_query($conn, $order_query);
$order_data = mysqli_fetch_assoc($order_result);
$total_orders = $order_data['total_orders'];

$revenue_query = "SELECT SUM(total_price) AS total_revenue FROM orders";
$revenue_result = mysqli_query($conn, $revenue_query);
$revenue_data = mysqli_fetch_assoc($revenue_result);
$total_revenue = $revenue_data['total_revenue'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex flex-column min-vh-100">


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Panel</a>

        <div class="d-flex">
            <span class="text-white me-3">
                Welcome, <?php echo $_SESSION['email']; ?>
            </span>
        </div>
    </div>
</nav>

<div class="container-fluid flex-grow-1">
    <div class="row">

        <div class="col-md-2 bg-dark text-white p-3 d-flex flex-column" style="min-height: calc(100vh - 56px);">
            <h5>Menu</h5>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link text-white">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="add_book.php" class="nav-link text-white">Add Book</a>
                </li>
                <li class="nav-item">
                    <a href="view_books.php" class="nav-link text-white">View Books</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">Orders</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">Users</a>
                </li>
            </ul>
            <div class="mt-auto">
                <a href="logout.php" class="btn btn-danger w-100">Logout</a>
            </div>
        </div>

        <div class="col-md-10 p-4">
            <h2 class="mb-4">Dashboard</h2>

            <div class="row g-3">

                <div class="col-md-3">
                    <div class="card text-bg-primary">
                        <div class="card-body text-center">
                            <h5>Total Books</h5>
                            <h3><?php echo $total_books; ?></h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-bg-success">
                        <div class="card-body text-center">
                            <h5>Total Orders</h5>  
                            <h3><?php echo $total_orders; ?></h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-bg-warning">
                        <div class="card-body text-center">
                            <h5>Users</h5>  
                            <h3><?php echo $total_users; ?></h3>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-bg-danger">
                        <div class="card-body text-center">
                            <h5>Revenue</h5> 
                            <h3>₹<?php echo number_format($total_revenue, 2); ?></h3>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
</div>


<footer class="bg-primary text-white text-center py-2 mt-auto">
     2026 Book Store Admin Panel
</footer>

</body>
</html>