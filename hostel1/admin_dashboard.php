<?php
$conn = new mysqli("localhost", "root", "", "hostel");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM bookings ORDER BY student_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - View Bookings</title>
    <style>
        body {
            font-family: Arial;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
            padding: 10px;
        }
        td {
            padding: 10px;
        }
    </style>
</head>
<body>

<h2>Admin Panel - Booking Applications reciving</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Student ID</th>
        <th>Email</th>
        <th>Room Type</th>
        <th>Comments</th>
    </tr>
    <?php if ($result->num_rows > 0): ?>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['student_id']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['room_type']) ?></td>
                <td><?= nl2br(htmlspecialchars($row['comments'])) ?></td>
            </tr>
        <?php endwhile; ?>
    <?php else: ?>
        <tr><td colspan="7" style="text-align:center;">No applications found.</td></tr>
    <?php endif; ?>
</table>

</body>
</html>

<?php $conn->close(); ?>


<?php
$conn = new mysqli("localhost", "root", "", "hostel");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle approve/reject
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action'])) {
    $id = $_POST['booking_id'];
    $status = $_POST['action'] === 'approve' ? 'Approved' : 'Rejected';

    $stmt = $conn->prepare("UPDATE bookings SET status = ? WHERE id = ?");
    $stmt->bind_param("si", $status, $id);
    $stmt->execute();
    $stmt->close();
}

$result = $conn->query("SELECT * FROM bookings ORDER BY student_id");
?>




<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Manage Bookings</title>
    <style>
        body { font-family: Arial; }
        table { width: 95%; margin: auto; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
        th { background-color: #007bff; color: white; }
        form { display: inline-block; }
        button {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            color: white;
        }
        .approve-btn { background-color: #28a745; }
        .reject-btn { background-color: #dc3545; }
        .status { font-weight: bold; }
        .Pending { color: orange; }
        .Approved { color: green; }
        .Rejected { color: red; }
    </style>
</head>
<body>
<h2 style="text-align:center;">Admin Panel - Booking Applications</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Student ID</th>
        <th>Email</th>
        <th>Room Type</th>
        <th>Comments</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php 
     if ($result->num_rows > 0): ?>
        <?php while($row = mysqli_fetch_array($result)): ?>
            <tr>
            <td><?= $row['id'] ?></td>
                <td><?= $row['name']?></td>
                <td><?= $row['student_id'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['room_type']?></td>
                <td><?= $row['comments'] ?></td>
<td class="status <?= $row['status'] ?>"><?= $row['status'] ?></td>
                <td>
     <?php if ($row['status'] === 'Pending'): ?>
       <form method="POST">
      <input type="hidden" name="booking_id" value="<?= $row['id'] ?>">
      <button name="action" value="approve" class="approve-btn">Approve</button>
      <button name="action" value="reject" class="reject-btn">Reject</button>
              </form>
                    
                    <?php else: ?>
                        --
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
       <?php else: ?>
         <tr><td colspan="9">No bookings found.</td></tr>
      <?php endif; ?>
</table>
<?php $conn->close(); ?>



</body>
</html>

