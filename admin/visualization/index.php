<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ('../includes/header.php'); ?>
    <title>Data Visualization</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
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
                    <h1 class="h3 mb-4 text-gray-800"><strong>Data Visualization</strong></h1>
                    <div class="row">

                        <div class="col-lg-6">

                            <!-- Carbon Monoxide -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Carbon Monoxide</h6>
                                </div>
                                <div class="card-body">
                                    <!-- <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div> -->
                                </div>
                            </div>


                            <!-- Nitrogen Dioxide -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Nitrogen Dioxide</h6>
                                </div>
                                <div class="card-body">
                                    <!-- <div class="chart-bar">
                                        <canvas id="myBarChart"></canvas>
                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <!-- Ground-level Ozone -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Ground-level Ozone</h6>
                                </div>
                                <div class="card-body">
                                <!-- <canvas id="myChart"></canvas>
                                <script>
                                    var ctx = document.getElementById('myChart').getContext('2d');
                                    var myChart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                                        datasets: [{
                                            label: 'Sales',
                                            data: [1200, 1800, 800, 1500, 2000, 1300],
                                            fill: false,
                                            borderColor: 'rgba(54, 162, 235, 1)',
                                            tension: 0.1
                                        }]
                                        },
                                        options: {
                                        scales: {
                                            y: {
                                            beginAtZero: true
                                            }
                                        }
                                        }
                                    });
                                </script> -->
                                </div>
                            </div>

                            <!-- Particulate Matter-->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Particulate Matter</h6>
                                </div>
                                <div class="card-body">
                                    <!-- <canvas id="myChart2"></canvas>
                                    <script>
                                        var ctx = document.getElementById('myChart2').getContext('2d');
                                        var myChart2 = new Chart(ctx, {
                                            type: 'line',
                                            data: {
                                            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
                                            datasets: [{
                                                label: 'Data 1',
                                                data: [10, 20, 15, 25, 18, 30],
                                                fill: false,
                                                borderColor: 'rgba(54, 162, 235, 1)',
                                                tension: 0.1
                                            },
                                            {
                                                label: 'Data 2',
                                                data: [5, 15, 10, 20, 12, 25],
                                                fill: false,
                                                borderColor: 'rgba(255, 99, 132, 1)',
                                                tension: 0.1
                                            }]
                                            },
                                            options: {
                                            scales: {
                                                y: {
                                                beginAtZero: true
                                                }
                                            }
                                            }
                                        });
                                    </script> -->

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