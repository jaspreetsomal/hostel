<?php
// Database connection
$servername = "localhost"; // Change as per your database settings
$username = "root";        // Change as per your database settings
$password = "";            // Change as per your database settings
$dbname = "hostel";        // Change to your database name
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    
    die("Connection failed: " . $conn->connect_error);
}
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    // Password match check
    if ($password != $confirmPassword) {
        echo "Passwords do not match!";
    } else {
        // Hash password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL query to insert user data into the database
        $sql = "INSERT INTO register(name, email, password, phone, gender, address)
                VALUES ('$name', '$email', '$hashedPassword', '$phone', '$gender', '$address')";

        if ($conn->query($sql) === TRUE) {
            echo "Registration successful!";
            header("Location: login.html"); // Redirect to login page after successful registration
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
$conn->close();
?>
