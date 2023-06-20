<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ('../includes/header.php'); ?>
    <title>Data Visualization</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                    <h1 class="h3 mb-4" style="color:#00703C; padding-left: 15px;"><strong>Data Visualization</strong></h1>
                    <div class="row">

                        <div class="col-lg-10">

                            <!-- Data Visualization -->
                            <div class="card shadow mb-4">
                                <!-- <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold" style="color:#00703C;"> Data Visualization</h6>
                                </div> -->
                                <div class="card-body">
                                    <div>
                                        <canvas id="line-chart"></canvas>
                                    </div>
                                </div>

                                <?php include 'chart_data.php'; ?> <!-- Include the PHP file that generates the chart -->

                                <script>
                                    var dataLine = <?php echo $dataLineJson; ?>;
                                    new Chart(document.getElementById('line-chart'), dataLine);
                                </script>
                            </div>

                        </div>

                        <div class="col-lg-2">
                            <!-- Legend -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold" style="color:#00703C;">Definition of gasses</h6>
                                </div>
                                <div class="card-body">
                                    <p>Carbon Monoxide</p>
                                    <p>Nitrogen Dioxide</p>
                                    <p>Ground-level-Ozone</p>
                                    <p>Particulate Matter</p>
                                </div>
                            </div>
                        </div>
                    </div>
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

    <!-- Start of Modal -->
    <?php include ('../includes/modal.php'); ?>
    <!-- End of Modal -->

    <!-- Start of Bottom -->
    <?php include ('../includes/bottom.php'); ?>
    <!-- End of Bottom -->
    
</body>

</html>