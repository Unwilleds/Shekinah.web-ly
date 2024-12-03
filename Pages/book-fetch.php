<?php
ob_start(); // Start output buffering

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$database = "login-register";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT date, time FROM booking_record";
$result = $conn->query($query);

header('Content-Type: application/json');
$bookedDates = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $bookedDates[] = [
            'date' => $row['date'],
            'type' => $row['time']
        ];
    }
}

echo json_encode($bookedDates);

$conn->close();
ob_end_flush(); // End output buffering
?>
