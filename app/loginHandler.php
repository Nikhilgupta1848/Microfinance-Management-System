<?php
session_start();
require_once '../database/db_connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Avoid sqli injection

$username = stripslashes(mysqli_real_escape_string($conn, $username));
$password = stripslashes(mysqli_real_escape_string($conn, $password));

$access = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conn, $access);
$row = mysqli_fetch_assoc($result);
$count = mysqli_num_rows($result);

if ($result == 1) {
   header('location: ../dashboard.php');
}else{
   header('location: ../login.php');
}