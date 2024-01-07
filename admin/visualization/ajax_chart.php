<?php
if (!defined('DB_SERVER')) {
    include("../../initialize.php");
}
// Establish a database connection
$servername = DB_SERVER;
$username = DB_USERNAME;
$password = DB_PASSWORD;
$dbname = DB_NAME;

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set the PHP timezone to Philippine time
date_default_timezone_set('Asia/Manila');

// Query the database
$sql = "SELECT time, carbon_monoxide, nitrogen_dioxide, ground_level_ozone, particulate_matter FROM gasses ORDER BY time DESC LIMIT 10";
$result = $conn->query($sql);

// Process the retrieved data and format it for the chart
$data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Convert the timestamp to Philippine time (GMT+8)
        $timestamp = strtotime($row['time']);
        $philippine_time = gmdate('Y-m-d H:i:s', $timestamp + 8 * 3600); // Add 8 hours in seconds
        
        $row['time'] = $philippine_time;
        $data[] = $row;
    }
}

// Close the database connection
$conn->close();

// Return the data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>