<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../includes/header.php'); ?>
    <title>Activity Log</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
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

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color:#00703C;">Activity Log</h6>
                        </div>
                        <div style="padding: 20px;">
                            <style>
                                table {
                                    width: 100%;
                                    border-collapse: collapse;
                                    font-family: Arial, sans-serif;
                                }

                                th,
                                td {
                                    padding: 8px;
                                    text-align: center;
                                    border: 1px solid black;
                                    color: black;
                                }

                                .good {
                                    background-color: #58D68D;
                                }

                                .unhealthy {
                                    background-color: #F5B041;
                                }

                                .emergency {
                                    background-color: #EC7063;
                                }
                                

                              
                           
                            </style>
                            
                            <table>
                                <thead>
                                    <tr>
                                        <th>Pollutant</th>
                                        <th>Good</th>
                                        <th>Unhealthy</th>
                                        <th>Emergency</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>PM10 (µg/Nm3)</td>
                                        <td class="good">0 - 154</td>
                                        <td class="unhealthy">155 - 424</td>
                                        <td class="emergency">425 and above</td>
                                    </tr>
                                    <tr>
                                        <td>O3 (ppm)</td>
                                        <td class="good">0.000 - 0.084</td>
                                        <td class="unhealthy">0.085 - 0.374</td>
                                        <td class="emergency">0.375 and above</td>
                                    </tr>
                                    <tr>
                                        <td>CO (ppm)</td>
                                        <td class="good">0.0 - 9.4</td>
                                        <td class="unhealthy">9.5 - 30.4</td>
                                        <td class="emergency">30.5 and above</td>
                                    </tr>
                                    <tr>
                                        <td>NO2 (ppm)</td>
                                        <td class="good">0.00 - 0.65</td>
                                        <td class="unhealthy">0.65 - 1.24</td>
                                        <td class="emergency">1.25 and above</td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Carbon Monoxide</th>
                                            <th>Nitrogen Dioxide</th>
                                            <th>Ground-level Ozone</th>
                                            <th>Particulate Matter</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Your table rows should be added here -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Reset data button -->
                    <form method="POST" action="">
                        <button id="resetDataBtn" class="btn btn-danger">Reset Data</button>
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            include_once('../includes/header.php');

                            $query = "TRUNCATE TABLE gasses";

                            if (mysqli_multi_query($con, $query)) {
                                $_SESSION['status'] = "Truncate Successfully.";
                                $_SESSION['status_code'] = "success";
                            } else {
                                $_SESSION['status'] = "Error" . mysqli_error($con);
                                $_SESSION['status_code'] = "error";
                            }

                            mysqli_close($con);
                        }
                        ?>
                    </form>
                </div>
            </div>
            <?php include('../includes/footer.php'); ?>
            
        </div>
       

    </div>
   
<script type="text/javascript">
    $(document).ready(function() {
    // Initialize DataTable with buttons
    var dataTable = $('#dataTable').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'pdf'],
        ajax: {
            url: '../visualization/ajax_chart.php',
            dataType: 'json',
            dataSrc: ''
        },
        columns: [
            {
                data: null,
                render: function (data, type, row, meta) {
                    return meta.row + 1;
                }
            },
            { data: 'carbon_monoxide' },
            { data: 'nitrogen_dioxide' },
            { data: 'ground_level_ozone' },
            { data: 'particulate_matter' }
        ]
    });

   

   
});

</script>


</body>

</html>
