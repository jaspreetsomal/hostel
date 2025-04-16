<?php
session_start();

// Connect to DB
$conn = new mysqli("localhost", "root", "", "hostel");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$admin_email = "jaspreet@340@gmil.com";
$admin_password = "jas123";
if ($_SERVER["REQUEST_METHOD"] == "POST") {

$email = $_POST['email'];
$password = $_POST['password'];

// Validate credentials
if ($email === $admin_email && $password === $admin_password)
{
    $_SESSION['admin'] = $username;
    header("Location: admin_dashboard.php");
    exit();
} else {
    echo" invalid";
}
}

$conn->close();
?>


