<?php
session_start();
/*
$conn = mysqli_connect("localhost", "root", "", "hostel");
$userEmail = $_SESSION['user_email'];
$result = $conn->query("SELECT * FROM bookings WHERE user_email = '$userEmail'");
?>

<h2>My Bookings</h2>
<table border="1" cellpadding="10">
  <tr>
    <th>Booking ID</th>
    <th>Room</th>
    <th>Status</th>
  </tr>
  <?php
  
  while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?= $row['id']; ?></td>
      <td><?= $row['room_type']; ?></td>
      <td><?= $row['status']; ?></td>
    </tr>
  <?php } 
  $conn->close();
  ?>
</table>
<html>
    <body>
        <head>
        <link rel="stylesheet" href="room_apply.css">
</head>


<!--booking/apply-->
<section id="booking">
    <div class="booking-container">
<h2 style="text-align:center;">Apply / Book a Room</h2>

<form action="room.php" method="POST" class="booking-form">
    <label>Full Name:</label>
    <input type="text" name="name" required>

    <label>Student ID:</label>
    <input type="text" name="student_id" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Room Preference:</label>
    <select name="room_type" required>
        <option value="">--Select--</option>
        <option value="Single">Single</option>
        <option value="Double">Double</option>
        <option value="Triple">Triple</option>
    </select>

    <label>Comments (Optional):</label>
    <textarea name="comments"></textarea>
    
    <button type="submit">Apply Now</button>
</form>
</div>
</section>
</body>
</html>

*/


if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "hostel");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$userEmail = $_SESSION['user_email'];

// Select only columns that exist in your table
$sql = "SELECT id, status FROM bookings WHERE email = '$userEmail'";
$result = $conn->query($sql);

if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>

<h2>My Bookings</h2>
<table border="1" cellpadding="10">
  <tr>
    <th>Booking ID</th>
    <th>Status</th>
  </tr>
  <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
      <td><?= $row['id']; ?></td>
      <td><?= $row['status']; ?></td>
    </tr>
  <?php } ?>
</table>

<?php $conn->close(); ?>
