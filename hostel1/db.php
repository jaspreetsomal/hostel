<?php
$servername = "localhost";//declare the variable using $ 
$username = "root";
$password = "";
$database = "hostel";

// Create connection
$conn =  mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
} 

// Uncomment for debugging
// echo "Connected successfully";
?>
