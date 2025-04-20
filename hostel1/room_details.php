<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Room Types & Pricing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
        }

        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .available{
            color: green;
            font-weight: bold;
        }

        .full {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<h2>Room Types & Pricing</h2>

<table>
    <tr>
        <th>Room Type</th>
        <th>Capacity</th>
        <th>Monthly Rent (INR)</th>
        <th>Facilities</th>
        <th>Availability</th>
    </tr>
    <tr>
        <td>Single Room</td>
        <td>1 Student</td>
        <td>₹7,000</td>
        <td>Private bathroom, Desk, Wi-Fi</td>
        <td class="available">Available</td>
    </tr>
    <tr>
        <td>Double Sharing</td>
        <td>2 Students</td>
        <td>₹5,000</td>
        <td>Shared bathroom, Desk, Wi-Fi</td>
        <td class="available">Available</td>
    </tr>
    <tr>
        <td>Triple Sharing</td>
        <td>3 Students</td>
        <td>₹4,000</td>
        <td>Shared bathroom, Wi-Fi</td>
        <td class="full">Full</td>
    </tr>
</table>
<?php