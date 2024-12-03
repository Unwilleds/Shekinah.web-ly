<?php
// Retrieve JSON data from the request
$data = json_decode(file_get_contents("php://input"), true);

// Validate the received data
if (!$data || empty($data['daySelected']) || empty($data['full_name']) || empty($data['service']) || empty($data['guest']) || empty($data['phone']) || empty($data['timeActive'])) {
    http_response_code(400); // Bad request
    echo "Invalid input.";
    exit;
}

// Extract data
$daySelected = $data['daySelected'];
$full_name = $data['full_name'];
$service = $data['service'];
$guest = (int) $data['guest'];
$phone = $data['phone'];
$timeActive = $data['timeActive'];

// Connect to the database
require_once __DIR__ . "/../Database/database.php";

// Insert into database
$sql = "INSERT INTO booking_record (event, full_name, guest, phone, date, time)
        VALUES ('$service', '$full_name', '$guest', '$phone', '$daySelected', '$timeActive')";

if ($conn->query($sql) === TRUE) {
    echo '<script> 
      e5.style.display = "block";
      setTimeout(() => {
        e5.style.display = "none";
      }, 3000);
   </script>';
} else {
    http_response_code(500); // Internal server error
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
