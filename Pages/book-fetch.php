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

// Query to fetch booked dates
$query = "SELECT bookings FROM book"; // Replace 'bookings' and 'booking_date' with your table and column names
$result = $conn->query($query);

$bookedDates = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bookedDates[] = $row['booking_date'];
    }
}

header('Content-Type: application/json');
echo json_encode($bookedDates);

$conn->close();
?>
