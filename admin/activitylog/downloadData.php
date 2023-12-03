<?php
if (!defined('DB_SERVER')) {
    include("../../initialize.php");
}

// Handle form submission
if (isset($_POST['start-date']) && isset($_POST['end-date'])) {
    // Get start and end dates from the AJAX request
    $startDate = $_POST['start-date'];
    $endDate = $_POST['end-date'];

    // Establish a connection to your MySQL database
    $host = DB_SERVER;
    $username = DB_USERNAME;
    $password = DB_PASSWORD;
    $database = DB_NAME;

    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch data from the database based on the date range
    $sql = "SELECT * FROM gasses WHERE DATE(time) >= '$startDate' AND DATE(time) <= '$endDate'";
    $result = $conn->query($sql);

    // Check for errors in the query execution
    if (!$result) {
        die("Error in the query: " . $conn->error);
    }

    // Display data in the table
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['time']}</td>
                    <td>{$row['carbon_monoxide']}</td>
                    <td>{$row['nitrogen_dioxide']}</td>
                    <td>{$row['ground_level_ozone']}</td>
                    <td>{$row['particulate_matter']}</td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='6'>No data found</td></tr>";
    }

    // Close the database connection
    $conn->close();
}
?>
