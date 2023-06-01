<?php
session_start();
include('../includes/header.php');
include('../../db_conn.php');

if (isset($_POST['pageName']) && isset($_POST['content'])) {
    $pageName = $_POST['pageName'];
    $content = $_POST['content'];
    $current_datetime = date('Y-m-d H:i:s');
    $referenceNumber = str_replace(array(':', ' ', '-'), '', $current_datetime);
    $stmt = $con->prepare("SELECT fname FROM user");
    $stmt->execute();
    $result = $stmt->get_result();
    
    while ($row = $result->fetch_assoc()) {
        $fname = $row['fname'];}

    $stmt = $con->prepare("INSERT INTO wiki (author, page_name, content, reference) VALUES ( ?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fname, $pageName, $content, $referenceNumber);
    $stmt->execute();
    $stmt->close();

    $wikiId = $con->insert_id; // Retrieve the ID of the inserted wiki entry

    $fileCount = count($_FILES['image']['name']);
    for ($i = 0; $i < $fileCount; $i++) {
        $randomNumber = rand(1000, 9999);
        $fileName = $_FILES['image']['name'][$i];
        $newFileName = $randomNumber . '_' . $fileName;
        $targetPath = "images/" . $newFileName;

        if (move_uploaded_file($_FILES['image']['tmp_name'][$i], $targetPath)) {
            $stmt = $con->prepare("INSERT INTO wiki_attachment (document_name, id_d_filename, reference) VALUES (?, ?, ?)");
            $stmt->bind_param("sis", $newFileName, $wikiId, $referenceNumber);
            $stmt->execute();
            $stmt->close();
        }
    }

    $_SESSION['status'] = "Wiki Added";
    $_SESSION['status_code'] = "success";
    header("Location: " . base_url . "admin/wiki/add_wiki.php");
    exit(0);
}
?>
