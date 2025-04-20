<?php
$conn = new mysqli("localhost", "root", "", "hostel");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM meal_plans");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Meal Plan</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 90%;
            margin: auto;
            border-collapse: collapse;
            background: #fff;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Weekly Hostel Meal Plan</h2>

<table>
    <tr>
        <th>Day</th>
        <th>Breakfast</th>
        <th>Lunch</th>
        <th>Dinner</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= htmlspecialchars($row['day']) ?></td>
        <td><?= htmlspecialchars($row['breakfast']) ?></td>
        <td><?= htmlspecialchars($row['lunch']) ?></td>
        <td><?= htmlspecialchars($row['dinner']) ?></td>
    </tr>
    <?php endwhile; ?>
</table>

</body>
</html>

<?php $conn->close(); ?>
