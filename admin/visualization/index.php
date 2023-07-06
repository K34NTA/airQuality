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

                                    <script>
                                        // Declare the chart variable outside the updateChartData function
                                        var chart;

                                        // Function to fetch updated chart data using AJAX
                                        function updateChartData() {
                                            $.ajax({
                                                url: 'ajax_chart.php',
                                                method: 'GET',
                                                dataType: 'json',
                                                success: function (data) {
                                                    // Process the retrieved data
                                                    var labels = data.map(function (item) {
                                                        return item.time;
                                                    }).reverse();

                                                    var coData = data.map(function (item) {
                                                        return item.carbon_monoxide;
                                                    });

                                                    var no2Data = data.map(function (item) {
                                                        return item.nitrogen_dioxide;
                                                    });

                                                    var ozoneData = data.map(function (item) {
                                                        return item.ground_level_ozone;
                                                    });

                                                    var particulateData = data.map(function (item) {
                                                        return item.particulate_matter;
                                                    });

                                                    // Destroy the previous chart if it exists
                                                    if (chart) {
                                                        chart.destroy();
                                                    }

                                                    // Create a new chart
                                                    chart = new Chart(document.getElementById('line-chart'), {
                                                        type: 'line',
                                                        data: {
                                                            labels: labels,
                                                            datasets: [
                                                                {
                                                                    label: 'Carbon Monoxide (PPM)',
                                                                    data: coData,
                                                                    backgroundColor: 'rgba(255, 99, 71, 0.2)',
                                                                    fill: true,
                                                                    borderColor: 'rgba(255, 99, 132, 0.8)',
                                                                    borderWidth: 2,
                                                                    tension: 0.4
                                                                },
                                                                {
                                                                    label: 'Nitrogen Dioxide (PPM)',
                                                                    data: no2Data,
                                                                    backgroundColor: 'rgba(114, 255, 0, 0.2)',
                                                                    fill: true,
                                                                    borderColor: 'rgba(114, 255, 0, 1)',
                                                                    borderWidth: 2,
                                                                    tension: 0.4
                                                                },
                                                                {
                                                                    label: 'Ground-level Ozone (PPM)',
                                                                    data: ozoneData,
                                                                    backgroundColor: 'rgba(0, 137, 132, .2)',
                                                                    fill: true,
                                                                    borderColor: 'rgba(50, 150, 255, 1)',
                                                                    borderWidth: 2,
                                                                    tension: 0.4
                                                                },
                                                                {
                                                                    label: 'Particulate Matter (µg/Nm3)',
                                                                    data: particulateData,
                                                                    backgroundColor: 'rgba(139, 136, 181, .2)',
                                                                    fill: true,
                                                                    borderColor: 'rgba(139, 136, 181, 1)',
                                                                    borderWidth: 2,
                                                                    tension: 0.4
                                                                }
                                                            ]
                                                        },
                                                        options: {
                                                            responsive: true
                                                        }
                                                    });
                                                }
                                            });
                                        }

                                        // Update the chart initially
                                        updateChartData();

                                        // Update the chart every 5 seconds
                                        setInterval(updateChartData, 5000);
                                    </script>
                                </div>
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