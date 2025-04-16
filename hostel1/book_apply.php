<?php
?>
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
        <label>room number:</label>
    <input type="text" name="room_number" required>
    

    <label>Comments (Optional):</label>
    <textarea name="comments"></textarea>


    <button type="submit">Apply Now</button>
</form>
</div>
</section>
</body>
</html>