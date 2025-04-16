<?php
session_start();
if (!isset($_SESSION['admin_email'])) {
    header("Location: admin_email.php");
    exit();
}

?>
                <!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Hostel</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; }
        h1 { text-align: center; margin-top: 20px; }
        .dashboard-container { padding: 30px; }
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
            transition: 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .card a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body> 
    <h1>Admin Dashboard</h1>
    <p style="text-align:center;">Welcome to the Hostel Management System</p>

    <div class="dashboard-container">
        <div class="dashboard-grid">
            <div class="card">
                <h3>Room Management</h3>
                <p>View and assign rooms</p>
                <a href="">Room details</a>
            </div>
            <div class="card">
                <h3>Student Applications</h3>
                <p>Review and approve bookings</p>
                <a href="admin_dashbord.php">View Bookings</a>
            </div>
            <div class="card">
                <h3>Payments</h3>
                <p>Track paid and pending fees</p>
            </div>
            <div class="card">
                <h3>Notices</h3>
                <p>Post hostel announcements</p>
            </div>
            <div class="card">
                <h3>Maintenance Requests</h3>
                <p>Respond to service requests</p>
            </div>
            <div class="card">
                <h3>Meal Plans</h3>
                <p>View mess plans and subscriptions</p>
    </div>
      <div class="card">
        <h3>Student Details</h3>
        <p>View all student profiles</p>
            </div>
        </div>
    
</body>
<?php echo  $_SESSION['admin_email']; ?>!</p>
        <a href="logout.php">Logout</a>
</html>
