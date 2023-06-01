<?php
session_start(); // Start the session

include_once('../includes/header.php');

$user_id = $_SESSION['auth_user']['user_id'];

if (isset($_POST['add'])) {
    $issue_type = $_POST['issue_type'];
    $issue_project_title = $_POST['project_title'];
    $issue_subject = $_POST['subject'];
    $issue_description = $_POST['description'];
    $issue_status = $_POST['status'];
    $issue_assigner = $user_id; // Using the logged-in user's ID as the assigner
    $issue_category = $_POST['category'];
    $issue_due_date = $_POST['due_date'];
    $issue_assignee = $_POST['assignee'];
    $current_datetime = date('Y-m-d H:i:s'); // Capture the current date and time in the specified format
    $referenceNumber = str_replace(array(':', ' ', '-', 'AM', 'PM'), '', $current_datetime);

    // Prepare the SQL statement for inserting into the issues table
    $issues_sql = "INSERT INTO issues (issue_type, project_title, `subject`, `description`, `status`, assigner, category, duedate, assignee, dateCreated, ref_attachment) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare the statement
    $issues_stmt = mysqli_prepare($con, $issues_sql);

    // Bind the parameters with the values
    mysqli_stmt_bind_param($issues_stmt, "sssssssssss", $issue_type, $issue_project_title, $issue_subject, $issue_description, $issue_status, $issue_assigner, $issue_category, $issue_due_date, $issue_assignee, $current_datetime, $referenceNumber);

    // Execute the statement
    if (mysqli_stmt_execute($issues_stmt)) {
        $fileCount = count($_FILES['image']['name']);
        for ($i = 0; $i < $fileCount; $i++) {
            $fileName = $_FILES['image']['name'][$i];
            $subfilename = time() . $fileName;
            $first_10_chars = substr($subfilename, 0, 10);
            $last_4_chars = substr($subfilename, -5);
            $newfilename = $first_10_chars . $last_4_chars;

            // Prepare the SQL statement for inserting into the issues_attachment table
            $attachment_sql = "INSERT INTO issues_attachment (`attachment`, `ref_attachment`) VALUES (?, ?)";

            // Prepare the statement
            $attachment_stmt = mysqli_prepare($con, $attachment_sql);

            // Bind the parameters with the values
            mysqli_stmt_bind_param($attachment_stmt, "ss", $newfilename, $referenceNumber);

            // Execute the statement
            if (mysqli_stmt_execute($attachment_stmt)) {
                $_SESSION['status'] = "Added Successfully.";
                $_SESSION['status_code'] = "success";
            } else {
                $_SESSION['status'] = "Error adding attachment: " . mysqli_error($con);
                $_SESSION['status_code'] = "error";
            }
            move_uploaded_file($_FILES['image']['tmp_name'][$i], "images/".$newfilename);
        }

        $_SESSION['status'] = "Added Successfully.";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status'] = "Error adding issue: " . mysqli_error($con);
        $_SESSION['status_code'] = "error";
    }

    // Close the prepared statements
    mysqli_stmt_close($issues_stmt);
    mysqli_stmt_close($attachment_stmt);
}

// Close the database connection
mysqli_close($con);

// Redirect to the desired page
header('Location: index.php');
exit();
?>
