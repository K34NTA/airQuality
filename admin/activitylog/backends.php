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

    // Check if a search term was provided
    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

    // Modify the SQL query to include the search term
    $query = "SELECT carbon_monoxide, nitrogen_dioxide, ground_level_ozone, particulate_matter, UNIX_TIMESTAMP(time) as timestamp FROM gasses";

    if (!empty($searchTerm)) {
        $query .= " WHERE time LIKE :searchTerm";
    }

    // Execute the query
    $statement = $pdo->prepare($query);

    if (!empty($searchTerm)) {
        // Bind the search term to the query
        $searchTerm = '%' . $searchTerm . '%';
        $statement->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
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
} catch(PDOException $e) {
    // Handle database connection error
    die("Database connection failed: " . $e->getMessage());
}
?>
