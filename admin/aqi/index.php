<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../includes/header.php'); ?>
    <title>Air Quality Index</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url ?>assets/js/datatables.min.js"></script>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            font-family: Arial, sans-serif;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ccc;
            color: black;
        }

        thead {
            background-color: #f2f2f2;
        }

        th {
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        p {
            margin-top: 10px;
            font-style: italic;
        }
    </style>
</head>

<body id="page-top">

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
                    <!-- <h1 class="h3 mb-4 text-gray-800"><strong>Activity Log</strong></h1> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color:#00703C;">Air Quality Index</h6>
                        </div>
                        <div>
                            <div id="content" style="color:#00703C;">
                                <div class="container-fluid" style="padding-top: 20px;">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Pollutant</th>
                                                <th>Unit, Averaging Time</th>
                                                <th>Good</th>
                                                <th>Fair</th>
                                                <th>Unhealthy for sensitive groups</th>
                                                <th>Very Unhealthy</th>
                                                <th>Acutely unhealthy</th>
                                                <th>Emergency</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>PM10</td>
                                                <td>µg/Nm3, 24-hr</td>
                                                <td>0 - 54 </td>
                                                <td>55 -154</td>
                                                <td>155 - 254 </td>
                                                <td>255 - 354 </td>
                                                <td>355 - 424 </td>
                                                <td>425 - 504 </td>
                                            </tr>
                                            <tr>
                                                <td>O3</td>
                                                <td>ppm, 8-hr</td>
                                                <td>0.000 - 0.064</td>
                                                <td>0.065 - 0.084</td>
                                                <td>0.085 - 0.104</td>
                                                <td>0.105 - 0.124</td>
                                                <td>0.125 - 0.374 </td>
                                                <td>a</td>
                                            </tr>
                                            <tr>
                                                <td>O3</td>
                                                <td>ppm, 1-hr</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>0.125 - 0.164</td>
                                                <td>0.165 - 0.204</td>
                                                <td>0.205 - 0.404</td>
                                                <td>0.405 - 0.504</td>
                                            </tr>
                                            <tr>
                                                <td>CO</td>
                                                <td>ppm, 8-hr</td>
                                                <td>0.0 - 4.4</td>
                                                <td>4.5 - 9.4</td>
                                                <td>9.5 - 12.4</td>
                                                <td>12.5 - 15.4</td>
                                                <td>15.5 - 30.4</td>
                                                <td>30.5 - 40.4</td>
                                            </tr>
                                            <tr>
                                                <td>NO2</td>
                                                <td>ppm, 1-hr</td>
                                                <td>b</td>
                                                <td>b</td>
                                                <td>b</td>
                                                <td>b</td>
                                                <td>0.65 - 1.24</td>
                                                <td>1.25 - 1.64</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div>
                                        <p style="margin-bottom: -15px;font-style:italic;"> a - When 8-hour O3 concentrations surpass 0.374 ppm, AQI values of at least 301 must be determined using 1-hour O3 concentrations.</p>
                                        <p>b - NO2 has no 1-hour term NAAQGV</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include('../includes/footer.php'); ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Start of Modal -->
    <?php include('../includes/modal.php'); ?>
    <!-- End of Modal -->

    <!-- Start of Bottom -->
    <?php include('../includes/bottom.php'); ?>
    <!-- End of Bottom -->

</body>

</html>
