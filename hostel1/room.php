<?php
/*
$servername = "localhost";//declare the variable using $ 
$username = "root";
$password = "";
$database = "hostel";

// Create connection
$conn =  mysqli_connect($servername, $username, $password, $database);
$sql = "INSERT INTO bookings (name, student_id, email, room_type, comments)
            VALUES (?, ?, ?, ?,?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $student_id, $email, $room_type, $comments);

    if ($stmt->execute()) {
        echo "<h2>Application submitted successfully!</h2>";
    } else {
        echo "Error: " . $stmt->error;
    }

class RoomBooking {
    public $name;
    public $student_id;
    public $email;
    public $room_type;
    public $comments;

    public function __construct($name, $student_id, $email, $room_type, $comments) {
        $this->name = $name;
        $this->student_id = $student_id;
        $this->email = $email;
        $this->room_type = $room_type;
        $this->comments = $comments;
    }
    public function displayConfirmation() {
        echo "<h2 style='text-align:center;'>✅ Application Received</h2>";
        echo "<div style='width:60%; margin:auto; font-size:18px;'>";
        echo "<p><strong>Name:</strong> {$this->name}</p>";
        echo "<p><strong>Student ID:</strong> {$this->student_id}</p>";
        echo "<p><strong>Email:</strong> {$this->email}</p>";
        echo "<p><strong>Room Type:</strong> {$this->room_type}</p>";
        echo "<p><strong>Comments:</strong> " . nl2br($this->comments) . "</p>";
        echo "</div>";
    }
}
// Form submission check
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Basic sanitization
    $name = $_POST['name'];
    $student_id = $_POST['student_id'];
    $email = $_POST['email'];
    $room_type = $_POST['room_type'];
    $comments = $_POST['comments'];

    // Create booking object
    $booking = new RoomBooking($name, $student_id, $email, $room_type, $comments);

    // Show confirmation
    $booking->displayConfirmation();
} else {
    echo "<p style='text-align:center;'>Invalid access. Please submit the form properly.</p>";
}

$sql = "INSERT INTO bookings (name, student_id, email, room_type, comments)
            VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $student_id, $email, $room_type, $comments);

    if ($stmt->execute()) {
        echo "<h2>Application submitted successfully!</h2>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
$conn->close();
?>
*/

$servername = "localhost";
$username = "root";
$password = "";
$database = "hostel";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

class RoomBooking {
    public $name;
    public $student_id;
    public $email;
    public $room_type;
    public $room_number;
    public $comments;

    public function __construct($name, $student_id, $email, $room_type, $room_number, $comments) {
        $this->name = $name;
        $this->student_id = $student_id;
        $this->email = $email;
        $this->room_type = $room_type;
        $this->room_number = $room_number;
        $this->comments = $comments;
    }

    public function displayConfirmation() {
        echo "<h2 style='text-align:center;'>✅ Application Received</h2>";
        echo "<div style='width:60%; margin:auto; font-size:18px;'>";
        echo "<p><strong>Name:</strong> {$this->name}</p>";
        echo "<p><strong>Student ID:</strong> {$this->student_id}</p>";
        echo "<p><strong>Email:</strong> {$this->email}</p>";
        echo "<p><strong>Room Type:</strong> {$this->room_type}</p>";
        echo "<p><strong>Room Number:</strong> {$this->room_number}</p>";
        echo "<p><strong>Comments:</strong> " . nl2br($this->comments) . "</p>";
        echo "</div>";
    }
}

// Form submission check
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Basic sanitization
    $name = $_POST['name'];
    $student_id = $_POST['student_id'];
    $email = $_POST['email'];
    $room_type = $_POST['room_type'];
    $room_number = $_POST['room_number'];
    $comments = $_POST['comments'];

    // Create booking object
    $booking = new RoomBooking($name, $student_id, $email, $room_type, $room_number, $comments);
    $booking->displayConfirmation();

    // Prepare and run insert query
    $sql = "INSERT INTO bookings (name, student_id, email, room_type, room_number, comments)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $name, $student_id, $email, $room_type, $room_number, $comments);

    if ($stmt->execute()) {
        echo "<h2>✅ Application submitted successfully!</h2>";
    } else {
        echo "❌ Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "<p style='text-align:center;'>Invalid access. Please submit the form properly.</p>";
}

$conn->close();
?>
