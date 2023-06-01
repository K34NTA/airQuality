<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../includes/header.php'); ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="<?php echo base_url ?>assets/js/datatables.min.js"></script> <!-- Add the DataTables library script -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Open</title> 
</head>
<body>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <?php include('../includes/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <?php include('../includes/topbar.php'); ?>
                <!-- End of Topbar -->
                <!-- Begin Page content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <div class="d-flex align-items-center">
                            <div>
                                <h1 class="h4   text-gray-800">
                                    <i class="fas fa-chevron-up"></i>
                                    <strong>Open Status</strong>
                                </h1>
                                <br></br>
                            </div>
                        </div>
                    </div>
                    <table>
                        <tr class="border-bottom-1">
                                    <!-- Category -->
                                        <td style="width: 50px;"><strong><span style="color: black; margin-right: 10px;">Project</span></strong></td>
                                        <td style="width: 50px;">
                                            <div style="display: flex; align-items: center;">
                                                <?php
                                                    // Execute the query
                                                    $query = "SELECT project FROM issues";
                                                    $res = mysqli_query($con, $query); 
                                                ?>
                                                <select class="form-control mb=5" id="optionSelect" style="width: 200px; font-size: 15px; margin-right: 10px; border-color: #18B07B;" name="category">
                                                    <option value="UI">UI</option>
                                                    <option value="API">API</option>
                                                <?php
                                                    // Check if the query executed successfully
                                                    if ($res) {
                                                        while ($row = mysqli_fetch_array($res)) {
                                                            ?>
                                                            <option value="<?php echo $row['project']; ?>"><?php echo $row['project']; ?></option>
                                                            <?php
                                                        }
                                                    } else {
                                                        // Handle query error
                                                        echo "Error: " . mysqli_error($con); 
                                                    }
                                                ?>
                                                </select>
                                            </div>
                                        </td>
                                <!-- Assignee -->
                                <td style="width: 50px;"><strong><span style="color: black; margin-right: 10px;">Assignee</span></strong></td>
                                        <td>
                                            <?php
                                                // Execute the query
                                                $query = "SELECT concat(fname,' ',lname) as usernames FROM user";
                                                $res = mysqli_query($con, $query); 
                                            ?>
                                            <div class="input-group bg-white shadow-inset-2" style="width: 100px;"></div>
                                                <select class="form-control mb=4" id="task-filter" style="width: 200px; font-size: 15px; border-color: #18B07B;" name="assignee">
                                                    <?php
                                                        // Check if the query executed successfully
                                                        if ($res) {
                                                            while ($row = mysqli_fetch_array($res)) {
                                                                ?>
                                                                <option value="<?php echo $row['usernames']; ?>"><?php echo $row['usernames']; ?></option>
                                                                <?php
                                                            }
                                                        } else {
                                                            // Handle query error
                                                            echo "Error: " . mysqli_error($con); 
                                                        }
                                                    ?>DRAW
                                                </select>
                                            </div>
                                        </td>
                                <td><img src="https://cdn-icons-png.flaticon.com/512/32/32382.png" class="user-icon" style="max-width: 30px; height: 30px; margin-right: 5px;" alt="User with headphones - Free people icons" aria-hidden="false"></td>
                                    <td>    <button class="btn mr-4 btn-success" type="button">Search</button></td>
                            </tr>
                        </table>
                        <div class="card mt-2"  style=" background-color: white;">
                            <div class="card-body">
                                <div class="table-responsive table-extra-small ">
                                    <table id="issuesTable" class="table  text-success table-striped w-100 text-center"width="100%" cellspacing="0"style="background-color: white;">
                                        <thead>
                                            <tr>
                                            <th>ID</th>
                                            <th>Issue Type</th>
                                            <th>Subject</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Assignee</th>
                                            <th>Assigner</th>
                                            <th>Project</th>
                                            <th>Created</th>
                                            <th>Due Date</th>
                                            <th>Attachment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Table content goes here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <style>
                            .table-extra-small {
                                font-size: 12px;
                                border-collapse: collapse;
                            }

                            .table-extra-small th,
                            .table-extra-small td {
                                padding: 5px;
                                border: 1px solid #ccc;
                            }

                            #issuesTable td {
                                    color: black;
                                    text-align: center; /* Added to center align the table data */
                                }

                                /* CSS rule to set the background color of table rows on hover */
                                #issuesTable tbody tr:hover {
                                    background-color: wheat;
                            }
                            </style>
                        </div>
                         <!-- DataTables JavaScript code -->
                         <script type="text/javascript">
                            $(document).ready(function(){
                                var dataTable = $('#issuesTable').DataTable({
                                    'processing': false,
                                    'serverSide': true,
                                    'serverMethod': 'post',
                                    'ajax': {
                                        'url': 'ajax_open.php'
                                    },
                                    'columns': [
                                        { data: 'id' },
                                        {
                                            data: 'issue_type',
                                            render: function (data) {
                                                if (data) {
                                                    var backgroundColor = '';
                                                    if (data === 'Task') {
                                                        backgroundColor = 'yellowgreen';
                                                        buttonClass = 'btn-l ';
                                                    } else if (data === 'Request') {
                                                        backgroundColor = 'coral';
                                                        buttonClass = 'btn-l ';
                                                    }
                                                    return '<span class="oblong-bg" style="background-color: ' + backgroundColor + ';">' + data + '</span>';
                                                } else {
                                                    return '';
                                                }
                                            }
                                        },
                                        { data: 'subject' },
                                        { data: 'description' },
                                        {
                                            data: 'status',
                                            render: function (data) {
                                                if (data) {
                                                    var backgroundColor = '';
                                                    var buttonClass = '';
                                                    var buttonText = '';

                                                    if (data === 'Resolved') {
                                                        backgroundColor = 'yellowgreen';
                                                        buttonClass = 'btn-l ';
                                                        buttonText = 'Resolved';
                                                    } else if (data === 'In Progress') {
                                                        backgroundColor = 'blue';
                                                        buttonClass = 'btn-l btn-primary';
                                                        buttonText = 'In Progress';
                                                    } else if (data === 'Close') {
                                                        backgroundColor = 'green';
                                                        buttonClass = 'btn-l';
                                                        buttonText = 'Close';
                                                    } else if (data === 'Open') {
                                                        backgroundColor = 'pink';
                                                        buttonClass = 'btn-l';
                                                        buttonText = 'Open';
                                                    }

                                                    return '<span class="oblong-bg" style="font-size: 12px; background-color: ' + backgroundColor + ';">' +
                                                        '<a href="' + buttonText.toLowerCase().replace(' ', '_')  + '" style="color: black;">' + buttonText + '</a>' +
                                                        '</span>';
                                                } else {
                                                    return '';
                                                }
                                            }
                                        },
                                        {
                                            data: 'assignee',
                                            render: function (data) {
                                                if (data) {
                                                    return '<i class="fas fa-user-circle"></i> ' + data;
                                                } else {
                                                    return '';
                                                }
                                            }
                                        },
                                        { data: 'assigner' },
                                        { data: 'project' },
                                        { data: 'dateCreated' },
                                        {
                                            data: 'duedate',
                                            render: function (data) {
                                                if (data && data !== '0000-00-00') {
                                                    return '<span class="due-date" style="color: red;">' + data +"  " +'</span><span class="fire-icon"><i class="fas fa-fire" style="color: red;"></i></span>';
                                                } else {
                                                    return '';
                                                }
                                            }
                                        },
                                        {
                                            data: 'attachment',
                                            render: function (data) {
                                                if (data && data.length > 0) {
                                                    return '<span class="fas fa-paperclip"></span>';
                                                } else {
                                                    return '';
                                                }
                                            }
                                        }
                                    ]
                                });
                            });
                        </script>
                        <style>
                            .oblong-bg {
                                display: inline-block;
                                border-radius: 30px;
                                padding: 5px 30px;
                                box-sizing: border-box; /* Add this line to include padding in the width calculation */
                                min-width: 130px; /* Adjust the minimum width as per your preference */
                                text-align: center; /* Center the text horizontally within the element */
                            }

                            .person-circle {
                                display: inline-block;
                                width: 40px;
                                height: 40px;
                                border-radius: 100%;
                                margin-right: 10px;
                            }
                        </style>
                        <!-- Start of Modal -->
            <?php include ('../includes/modal.php'); ?>
            <!-- End of Modal -->
                </div> 
            </div>
            <!-- Footer -->
            <?php include ('../includes/footer.php'); ?>
            <!-- End of Footer -->
            <!-- Start of Bottom -->
            <?php include ('../includes/bottom.php'); ?>
            <!-- End of Bottom -->
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
    </div>
</body>
</html>