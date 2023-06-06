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
}

// Reading values
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows displayed per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

$searchArray = array();

// Search
$searchQuery = "";
if ($searchValue != '') {
    $searchQuery = " AND (id LIKE :id OR
        carbon_monoxide LIKE :carbon_monoxide OR
        nitrogen_dioxide LIKE :nitrogen_dioxide OR
        ground_level_ozone LIKE :ground_level_ozone OR
        particulate_matter LIKE :particulate_matter)
    ";
    $searchArray = array(
        'id' => "%$searchValue%",
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
$stmt = $conn->prepare("SELECT id, carbon_monoxide, nitrogen_dioxide, ground_level_ozone, particulate_matter FROM gasses WHERE 1 " . $searchQuery . " ORDER BY `" . $columnName . "` " . $columnSortOrder . " LIMIT :limit, :offset");

// Bind values
$stmt->bindParam(':limit', $row, PDO::PARAM_INT);
$stmt->bindParam(':offset', $rowperpage, PDO::PARAM_INT);
foreach ($searchArray as $key => &$search) {
    $stmt->bindParam(':' . $key, $search, PDO::PARAM_STR);
}

$stmt->execute();
$empRecords = $stmt->fetchAll();

$data = array();

foreach ($empRecords as $key => $row) {
    $data[] = array(
        "id" => $row['id'],
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
