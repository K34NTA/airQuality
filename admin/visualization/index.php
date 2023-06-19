<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="image/ico" href="https://www.datatables.net/favicon.ico">
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
                                <script type="text/javascript">
                                    // Chart
                                    const dataLine = {
                                        type: 'line',
                                        data: {
                                            labels: ["6am", "7am","8am", "9am", "10am", "11am", "12pm", "1pm", "2pm", "3pm","4pm", "5pm", "6pm", "7pm", "8pm", "9pm", "10pm","11pm", "12pm", "1am", "2am", "3am", "4am", "5am"],
                                            datasets: [{
                                                label: "Carbon Monoxide (PPM)",
                                                data: [65, 59, 80, 81, 56, 46, 40, 65, 59, 45, 81, 56, 55, 40, 65, 59, 80, 81, 56, 55, 40, 65, 78, 12, 81, 56, 55, 40],
                                                backgroundColor: 'rgba(255, 99, 71, 0.2)',
                                                fill: true,
                                                borderColor: 'rgba(255, 99, 132, 0.8)',
                                                borderWidth: 2,
                                                tension: 0.4
                                            },
                                            {
                                                label: "Nitrogen Dioxide (PPM)",
                                                data: [25, 31, 40, 51, 16, 55, 40, 65, 59, 80, 81, 56, 55, 70, 45, 39, 50, 91, 76, 35, 30, 55, 59, 80, 81, 56, 55, 40],
                                                backgroundColor: 'rgba(114, 255, 0, 0.2)',
                                                fill: true,
                                                borderColor: 'rgba(114, 255, 0, 1)',
                                                borderWidth: 2,
                                                tension: 0.4
                                            },
                                            {
                                                label: "Ground-level Ozone (PPM)",
                                                data: [28, 45, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86, 27, 90],
                                                backgroundColor: 'rgba(0, 137, 132, .2)',
                                                fill: true,
                                                borderColor: 'rgba(50, 150, 255, 1)',
                                                borderWidth: 2,
                                                tension: 0.4
                                            },
                                            {
                                                label: "Particulate Matter (PPB)",
                                                data: [28, 48, 40, 13, 45, 27, 90, 28, 45, 40, 45, 86, 27, 90, 28, 78, 78, 67, 78, 98, 12, 76, 76, 43, 23, 23, 25, 40],
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
                                    };

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