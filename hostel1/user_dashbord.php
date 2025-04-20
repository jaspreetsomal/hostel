<?php
session_start();
if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

$userEmail = $_SESSION['user_email'];
// Example profile photo URL — replace with real data if you store images in DB or uploads folder
$profileImage = "../images/t3.jpg"; // Make sure this image exists
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>User Dashboard</title>
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f0f2f5;
    }

    .sidebar {
      position: fixed;
      width: 250px;
      height: 100%;
      background-color: #2c3e50;
      padding-top: 30px;
      color: #ecf0f1;
    }

    .sidebar h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .profile {
      text-align: center;
      margin-bottom: 20px;
    }

    .profile img {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
    }

    .sidebar a {
      display: block;
      color: #ecf0f1;
      padding: 12px 20px;
      text-decoration: none;
      transition: 0.3s;
    }

    .sidebar a:hover {
      background-color: #34495e;
    }

    .main-content {
      margin-left: 250px;
      padding: 30px;
    }

    .card {
      background-color: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<div class="sidebar">
  <div class="profile">
    <img src="<?php echo $profileImage; ?>" alt="User Profile">
    <p><?php echo $userEmail; ?></p>
  </div>

  <a href="#">Dashboard</a>
  <a href="my_booking.php">My Bookings</a>
  <a href="room_price.php">Available Rooms</a>
  <a href="notic.php">Notice Board</a>
  <a href="setting.php">Settings</a>
  <a href="logout.php">Logout</a>
</div>

<div class="main-content">
  <h1>Welcome, <?php echo $userEmail; ?></h1>

  <div class="card">
    <h2>Your Info</h2>
    <p>Email: <?php echo $userEmail; ?></p>
    <!-- Add more user info from DB if needed -->
  </div>

  <div class="card">
    <h2>Quick Actions</h2>
    <ul>
      <li><a href="book_apply.php">Book a Room</a></li>
      <li><a href="meal_plan.php">meal_plan</a></li>
    </ul>
  </div>
</div>

</body>
</html>
