<?php
session_start();
include("../config/db_connection.php");


if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
      
        $user = $result->fetch_assoc();
    
        if(password_verify($password, $user['password'])){
            
            $_SESSION['email'] = $user['email'];
            $_SESSION['name'] = $user['name']; 
            
            header("Location: dashboard.php");
            exit();
            
        } else {
            $error = "Invalid Password!";
        }
    } else {
        $error = "No account found with that email address!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
               body {
            height: 100vh;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body class="d-flex justify-content-center align-items-center">

    <div class="card p-4 shadow login-card" style="width: 350px;">
        
        <h3 class="text-center mb-4">User Login</h3>

        <?php if(isset($error)) { ?>
            <div class="alert alert-danger text-center"><?php echo $error; ?></div>
        <?php } ?>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo isset($email) ? $email : ''; ?>" required>
            </div>
            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button type="submit" name="login" class="btn btn-primary w-100 py-2">Login</button>
            
            <div class="text-center mt-3">
                <small>Don't have an account? <a href="user_registration.php" class="text-decoration-none">Register here</a></small>
            </div>
        </form>

    </div>

</body>
</html>