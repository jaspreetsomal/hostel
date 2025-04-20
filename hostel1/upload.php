<?
/*
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: user_dashbord.php');
    exit();
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['photo'])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["photo"]["name"]);
    $targetFile = $targetDir . $fileName;

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
        $message = "Photo uploaded successfully!";
    } else {
        $message = "Photo upload failed.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Photo - Hostel</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Upload Hostel Photo</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="photo" required>
        <button type="submit">Upload</button>
    </form>
    <p><?= $message ?></p>
    <a href="user_dashbord.php">Back to Dashboard</a>
</body>
</html>
*/

session_start();
$conn = new mysqli("localhost", "root", "", "hostel");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_SESSION['user_email'];
    $room = $_POST['room_number'];

    $photo = $_FILES['photo'];
    $photoName = time() . "_" . $photo['name'];
    move_uploaded_file($photo['tmp_name'], "uploads/" . $photoName);

    $conn->query("INSERT INTO bookings (user_email, room_number, photo_path, status) VALUES ('$email', '$room', 'uploads/$photoName', 'Pending')");
    echo "Booking applied!";
}
?>

<h2>Book a Room</h2>
<form method="POST" enctype="multipart/form-data">
  <label>Room Number:</label>
  <input type="text" name="room_number" required><br><br>

  <label>Your Photo:</label>
  <input type="file" name="photo" accept="image/*" required><br><br>

  <button type="submit">Apply</button>
</form>
