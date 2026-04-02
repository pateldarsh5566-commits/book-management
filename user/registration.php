<?php
include("../config/db_connection.php");
$emailErr = $nameErr = $passwordErr = $compasswordErr = $mobileErr = "";

$name = $mobile = $email = $password = $compassword = "";

if(isset($_POST['register'])){
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $compassword = $_POST['compassword'];

    if (!preg_match("/^[a-zA-Z\s]*$/", $name)){
        $nameErr = "Only letters and spaces allowed";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailErr = "Invalid email format";
    }
    if (!preg_match("/^[0-9]{10}$/", $mobile)) {
        $mobileErr = "Enter a valid 10-digit mobile number";
    }

    if (strlen($password) < 6) {
        $passwordErr = "Password must be at least 6 characters long";
    }
    
    if ($password !== $compassword) {
        $compasswordErr = "Passwords do not match";  
    }

    if (empty($emailErr) && empty($nameErr) && empty($passwordErr) && empty($compasswordErr) && empty($mobileErr)){
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users(name, email, password, mobile) VALUES('$name', '$email', '$hashed_password', '$mobile')";
        
        if($conn->query($sql) === TRUE){
            header("Location: user_login.php");
            exit(); // Always use exit after header redirect
        } else {
            echo "<div class='alert alert-danger text-center'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { height: 100vh; background-color: #f4f6f9; }
        .error { color: red; font-size: 0.85em; }
    </style>
</head>
<body class="d-flex justify-content-center align-items-center">
    <div class="card p-4 shadow login-card" style="width: 400px;">
        <h3 class="text-center mb-4">User Registration</h3>

        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required>
                <span class="error"><?php echo $nameErr; ?></span>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
                <span class="error"><?php echo $emailErr; ?></span>
            </div>
            <div class="mb-3">
                <label class="form-label">Mobile</label>
                <input type="number" name="mobile" class="form-control" value="<?php echo $mobile; ?>" required>
                <span class="error"><?php echo $mobileErr; ?></span>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
                <span class="error"><?php echo $passwordErr; ?></span>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" name="compassword" class="form-control" required>
                <span class="error"><?php echo $compasswordErr; ?></span>
            </div>
            <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
        </form>
    </div>
</body>
</html>