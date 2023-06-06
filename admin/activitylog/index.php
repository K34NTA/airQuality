<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ('../includes/header.php'); ?>
    <title>Activity Log</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url ?>assets/js/datatables.min.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include ('../includes/sidebar.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include ('../includes/topbar.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><strong>Activity Log</strong></h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Entry number</th>
                                            <th>Carbon Monoxide</th>
                                            <th>Nitrogen Dioxide</th>
                                            <th>Ground-level Ozone</th>
                                            <th>Particulate Matter</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Entry number</th>
                                            <th>Carbon Monoxide</th>
                                            <th>Nitrogen Dioxide</th>
                                            <th>Ground-level Ozone</th>
                                            <th>Particulate Matter</th>
                                        </tr>
                                    </tfoot>
                                    <tbody></tbody>
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
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include ('../includes/footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- DataTables JavaScript code -->
    <script type="text/javascript">
        $(document).ready(function() {
            var dataTable = $('#dataTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url': 'backend.php'
                },
                'columns': [{
                        data: 'id'
                    },
                    {
                        data: 'carbon_monoxide'
                    },
                    {
                        data: 'nitrogen_dioxide'
                    },
                    {
                        data: 'ground_level_ozone'
                    },
                    {
                        data: 'particulate_matter'
                    },
                ]
            });
        });
    </script>
    <!-- Start of Modal -->
    <?php include ('../includes/modal.php'); ?>
    <!-- End of Modal -->

    <!-- Start of Bottom -->
    <?php include ('../includes/bottom.php'); ?>
    <!-- End of Bottom -->
    
</body>

</html>
