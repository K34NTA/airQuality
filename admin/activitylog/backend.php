<?php
if (!defined('DB_SERVER')) {
    include("../../initialize.php");
}

// DB connection parameters
$host = DB_SERVER;
$user = DB_USERNAME;
$password = DB_PASSWORD;
$db = DB_NAME;

$dsn = "mysql:host=$host;dbname=$db;charset=UTF8";
try {
    $conn = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    echo $e->getMessage();
    exit(); // Exit the script if there's a database connection error
}

// Reading values
$draw = isset($_POST['draw']) ? $_POST['draw'] : 0;
$row = isset($_POST['start']) ? $_POST['start'] : 0;
$rowperpage = isset($_POST['length']) ? $_POST['length'] : 10; // Rows displayed per page
$columnIndex = isset($_POST['order'][0]['column']) ? $_POST['order'][0]['column'] : 0; // Column index
$columnName = isset($_POST['columns'][$columnIndex]['data']) ? $_POST['columns'][$columnIndex]['data'] : 'time'; // Column name
$columnSortOrder = isset($_POST['order'][0]['dir']) ? $_POST['order'][0]['dir'] : 'asc'; // asc or desc
$searchValue = isset($_POST['search']['value']) ? $_POST['search']['value'] : ''; // Search value

$searchArray = array();

// Search
$searchQuery = "";
if ($searchValue != '') {
    $searchQuery = " AND (time LIKE :time OR
        carbon_monoxide LIKE :carbon_monoxide OR
        nitrogen_dioxide LIKE :nitrogen_dioxide OR
        ground_level_ozone LIKE :ground_level_ozone OR
        particulate_matter LIKE :particulate_matter)
    ";
    $searchArray = array(
        'time' => "%$searchValue%",
        'carbon_monoxide' => "%$searchValue%",
        'nitrogen_dioxide' => "%$searchValue%",
        'ground_level_ozone' => "%$searchValue%",
        'particulate_matter' => "%$searchValue%"
    );
}

// Total number of records without filtering
$stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM gasses");
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

// Total number of records with filtering
$stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM gasses WHERE 1" . $searchQuery);
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];

// Fetch the records from gasses table in the database
$stmt = $conn->prepare("SELECT time, carbon_monoxide, nitrogen_dioxide, ground_level_ozone, particulate_matter FROM gasses WHERE 1 " . $searchQuery . " ORDER BY `" . $columnName . "` " . $columnSortOrder . " LIMIT :offset, :limit");

// Bind values
$stmt->bindParam(':limit', $rowperpage, PDO::PARAM_INT);
$stmt->bindParam(':offset', $row, PDO::PARAM_INT);
foreach ($searchArray as $key => &$search) {
    $stmt->bindParam(':' . $key, $search, PDO::PARAM_STR);
}

$stmt->execute();
$empRecords = $stmt->fetchAll();

$data = array();

foreach ($empRecords as $key => $row) {
    $data[] = array(
        "time" => $row['time'],
        "carbon_monoxide" => $row['carbon_monoxide'],
        "nitrogen_dioxide" => $row['nitrogen_dioxide'],
        "ground_level_ozone" => $row['ground_level_ozone'],
        "particulate_matter" => $row['particulate_matter']
    );
}

// Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);
echo json_encode($response);
?>
