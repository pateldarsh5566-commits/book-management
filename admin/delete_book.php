<?php
include("../config/db_connection.php");
session_start();
if(!isset($_SESSION['email'])){
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM books WHERE id=$id");

header("Location: view_books.php");
?>