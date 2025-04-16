<?php
$conn = new mysqli("localhost", "root", "", "hostel");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM rooms");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Manage Rooms</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h2>All Rooms</h2>
  <table border="1" cellpadding="10">
    <tr>
      <th>ID</th>
      <th>Room Number</th>
      <th>Type</th>
      <th>Capacity</th>
      <th>Available Beds</th>
      <th>Status</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
      <td><?= $row['id'] ?></td>
      <td><?= $row['room_number'] ?></td>
      <td><?= $row['room_type'] ?></td>
      <td><?= $row['capacity'] ?></td>
      <td><?= $row['available_beds'] ?></td>
      <td><?= $row['status'] ?></td>
    </tr>
    <?php } ?>
  </table>
  <br>
  <a href="add_room.html">Add New Room</a>
</body>
</html>
