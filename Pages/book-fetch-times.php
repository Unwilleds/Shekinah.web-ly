<?php
// Database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "bookings";

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch booked dates and times
$query = "SELECT event_date, time_slot FROM bookings";
$result = $conn->query($query);

header('Content-Type: application/json');
$bookedData = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $date = $row['event_date'];
        $timeSlot = $row['time_slot']; // Assume 'day' or 'night' is stored in 'time_slot'

        if (!isset($bookedData[$date])) {
            $bookedData[$date] = ['day' => false, 'night' => false];
        }

        $bookedData[$date][$timeSlot] = true;
    }
}

// Return the booked data as JSON
echo json_encode($bookedData);

$conn->close();
?>
