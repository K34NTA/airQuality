<?php
if (!defined('DB_SERVER')) {
    include("../../initialize.php");
}

// DB connection parameters
$db_host = DB_SERVER;
$db_user = DB_USERNAME;
$db_password = DB_PASSWORD;
$db_name = DB_NAME;

try {
    // Create a database connection
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);

    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if search parameters were provided
    $startDate = isset($_GET['startDate']) ? $_GET['startDate'] : '';
    $endDate = isset($_GET['endDate']) ? $_GET['endDate'] : '';

    // Modify the SQL query to include the date range
    $query = "SELECT carbon_monoxide, nitrogen_dioxide, ground_level_ozone, particulate_matter, UNIX_TIMESTAMP(time) as timestamp FROM gasses";

    if (!empty($startDate) && !empty($endDate)) {
        $query .= " WHERE time BETWEEN :startDate AND :endDate";
    }

    // Execute the query
    $statement = $pdo->prepare($query);

    if (!empty($startDate) && !empty($endDate)) {
        // Bind the start and end dates to the query
        $startDate .= ' 00:00:00';
        $endDate .= ' 23:59:59';
        $statement->bindParam(':startDate', $startDate, PDO::PARAM_STR);
        $statement->bindParam(':endDate', $endDate, PDO::PARAM_STR);
    }

    $statement->execute();

    // Fetch all rows as an associative array
    $data = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Modify the timestamp field to the desired format
    foreach ($data as &$row) {
        $timestamp = $row['timestamp'];
        $formattedTime = date('F d, Y h:i a', $timestamp);
        $row['time'] = $formattedTime;
        unset($row['timestamp']);
    }

    // Close the database connection
    $pdo = null;

    // Return data as JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} catch (PDOException $e) {
    // Handle database connection error
    die("Database connection failed: " . $e->getMessage());
}
?>
