<h2 style="text-align:center;">Boys' Hostel - Room List</h2>
<?php
class Room {           // Room class
    public $room_no;
    public $type;
    public $rent;
    public $status;

    public function __construct($room_no, $type, $rent, $status) {
        $this->room_no = $room_no;
        $this->type = $type;
        $this->rent = $rent;
        $this->status = $status;
    }
}
function displayRooms($rooms)   // Function to display rooms
 {
    echo "<table class='room-table'>
            <tr>
                <th>Room No</th>
                <th>Type</th>
                <th>Rent (₹)</th>
                <th>Status</th>
            </tr>";

    foreach ($rooms as $room) {
        echo "<tr>
                <td>{$room->room_no}</td>
                <td>{$room->type}</td>
                <td>{$room->rent}</td>
                <td class='" . strtolower($room->status) . "'>{$room->status}</td>
              </tr>";
    }
    echo "</table>";
}
// Create room objects
$rooms = [
    new Room("101", "Single", 4000, "Available"),
    new Room("102", "Double", 3000, "Booked"),
    new Room("103", "Triple", 2500, "Available"),
    new Room("104", "Single", 4000, "Booked"),
    new Room("105", "Double", 3000, "Available")
];
displayRooms($rooms);    // Call the function   
?>
<link rel="stylesheet" href="room_apply.css">



<h2 style="text-align:center;">Hostel Gallery</h2>

<div class="gallery-container">
    <div class="gallery-item">
        <img src="../images/3.png" alt="Room 1">
    </div>
    <div class="gallery-item">
        <img src="../pic/bed1.png" alt="Room 2">
    </div>
    <div class="gallery-item">
        <img src="../pic/comman.png" alt="Common Area">
    </div>
    <div class="gallery-item">
        <img src="../pic/hostel-washroom.png" alt="Washroom">
    </div>
    <div class="gallery-item">
        <img src="../pic/comman1.png" alt="Study Hall">
    </div>
</div>


<!--booking/apply-->
<
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
</body>
</html>