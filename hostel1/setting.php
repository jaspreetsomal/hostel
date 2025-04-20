<?php
session_start();
$conn = new mysqli("localhost", "root", "", "hostel");
$userEmail = $_SESSION['user_email'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newPass = $_POST['password'];
    $conn->query("UPDATE login SET password = '$newPass' WHERE email = '$userEmail'");
    echo "Password updated!";
}
?>

<h2>Settings</h2>
<form method="POST">
  <label>New Password:</label>
  <input type="password" name="password" required>
  <button type="submit">Update</button>
</form>
