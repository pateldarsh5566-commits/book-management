
<!DOCTYPE html>
<html>
<head>
    <title>Book Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">BookStore</a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Books</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Cart</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="hero">
    <div class="text-center">
        <h1>Welcome to BookStore</h1>
        <p>Discover your next favorite books</p>
        <a href="#" class="btn btn-warning">Shop Now</a>
    </div>
</div>

<footer class="mt-5 bg-dark text-white text-center p-3">
    <p> <?php echo date("Y"); ?> BookStore | All Rights Reserved</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
$(document).ready(function(){
    $(".addCart").click(function(){
        alert("Book added to cart!");
    });
});
</script>

</body>
</html>