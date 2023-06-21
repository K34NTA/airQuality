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

                        <div class="col-lg-9">

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

                        <div class="col-lg-3">
                            <!-- Legend -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold" style="color:#00703C;">Gas Definitions</h6>
                                </div>
                                <div class="card-body">
                                    <h6><strong>Carbon Monoxide (CO)</strong></h6>
                                    <p>It is a colorless, odorless gas produced by incomplete combustion of fossil fuels. It is harmful when inhaled as it interferes with oxygen transport.</p>

                                    <h6><strong>Nitrogen Dioxide (NO2)</strong></h6>
                                    <p>It is a reddish-brown gas with a pungent odor. It is formed by burning fossil fuels and contributes to air pollution and respiratory health problems.</p>

                                    <h6><strong>Ground-level Ozone (O3)</strong></h6>
                                    <p>It is a colorless gas formed by the reaction of sunlight with pollutants like nitrogen oxides and volatile organic compounds. It contributes to smog and respiratory issues.</p>

                                    <h6><strong>Particulate Matter (PM)</strong></h6>
                                    <p>It refers to tiny suspended particles in the air, including dust, soot, and liquid droplets. Inhalation of particulate matter can have adverse effects on the respiratory and cardiovascular systems.</p>
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