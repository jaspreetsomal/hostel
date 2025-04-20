<?php
session_start();
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hostel";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle only POST request
if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
}
    // Check user in database
    $sql = "SELECT * FROM  register WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result)>0) 
    {
      $row = mysqli_fetch_assoc($result); 
        // Verify password
        if (password_verify($password, $row['password'])) {
            
            $_SESSION['user_email'] = $row['email'];
            header("Location:user_dashbord.php"); // Redirect to dashboard
            exit();
        } else {
            echo "<script>alert('Invalid password!'); window.location='login.html';</script>";
        }
    } else {
        echo "<script>alert('No user found with this email!'); window.location='login.html';</script>";
          }
$conn->close();
?>

