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
        issue_type LIKE :issue_type OR
        subject LIKE :subject OR
        description LIKE :description OR
        status LIKE :status OR
        assignee LIKE :assignee OR
        assigner LIKE :assigner OR
        project LIKE :project OR
        dateCreated LIKE :dateCreated OR
        duedate LIKE :duedate)
    ";
    $searchArray = array(
        'id' => "%$searchValue%",
        'issue_type' => "%$searchValue%",
        'subject' => "%$searchValue%",
        'description' => "%$searchValue%",
        'status' => "%$searchValue%",
        'assignee' => "%$searchValue%",
        'assigner' => "%$searchValue%",
        'project' => "%$searchValue%",
        'dateCreated' => "%$searchValue%",
        'duedate' => "%$searchValue%"
    );
}

// Total number of records without filtering
$stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM issues");
$stmt->execute();
$records = $stmt->fetch();
$totalRecords = $records['allcount'];

// Total number of records with filtering
$stmt = $conn->prepare("SELECT COUNT(*) AS allcount FROM issues WHERE 1" . $searchQuery);
$stmt->execute($searchArray);
$records = $stmt->fetch();
$totalRecordwithFilter = $records['allcount'];

// Fetch records from the "issues" table
$stmt = $conn->prepare("SELECT id, issue_type, subject, description, status, assignee, assigner, project, dateCreated, duedate FROM issues WHERE 1 " . $searchQuery . " ORDER BY " . $columnName . " " . $columnSortOrder . " LIMIT :limit, :offset");

// Fetch records from the "issues" table with Open status
$stmt = $conn->prepare("SELECT id, issue_type, subject, description, status, assignee, assigner, project, dateCreated, duedate FROM issues WHERE status = 'Resolved' " . $searchQuery . " ORDER BY " . $columnName . " " . $columnSortOrder . " LIMIT :limit, :offset");


// Bind values
$stmt->bindParam(':limit', $row, PDO::PARAM_INT);
$stmt->bindParam(':offset', $rowperpage, PDO::PARAM_INT);
foreach ($searchArray as $key => &$search) {
    $stmt->bindParam(':' . $key, $search, PDO::PARAM_STR);
}

$stmt->execute();
$empRecords = $stmt->fetchAll();

$data = array();

// Fetch records from the "issues_attachment" table
$stmt2 = $conn->prepare("SELECT attachment FROM issues_attachment");
$stmt2->execute();
$attachmentRecords = $stmt2->fetchAll(PDO::FETCH_COLUMN, 0);


foreach ($empRecords as $key => $row) {
    $data[] = array(
        "id" => $row['id'],
        "issue_type" => $row['issue_type'],
        "subject" => $row['subject'],
        "description" => $row['description'],
        "status" => $row['status'],
        "assignee" => $row['assignee'],
        "assigner" => $row['assigner'],
        "project" => $row['project'],
        "dateCreated" => $row['dateCreated'],
        "duedate" => $row['duedate'],
        "attachment" => $attachmentRecords[$key] // Fetch attachment from issues_attachment records
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