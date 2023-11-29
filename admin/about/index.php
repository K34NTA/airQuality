<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../includes/header.php'); ?>
    <title>About</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url ?>assets/js/datatables.min.js"></script>
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
                            <h6 class="m-0 font-weight-bold" style="color:#00703C;">Air Pollutant Effects</h6>
                        </div>
                        <div>
                            <div id="content" style="color:#00703C;">
                                <div class="container-fluid" style="padding-top: 10px;">
                                    <h6 class="m-0 font-weight-bold">Carbon Monoxide (CO)</h6>
                                    <ul>
                                        <li>Inhalation of carbon monoxide can lead to headaches, dizziness, and confusion.</li>
                                        <li>High levels of exposure can cause impaired vision, reduced manual dexterity, and loss of consciousness.</li>
                                        <li>Prolonged or severe exposure to carbon monoxide can result in neurological damage, cardiovascular problems, and even death.</li>
                                    </ul>

                                    <h6 class="m-0 font-weight-bold">Nitrogen Dioxide (NO2)</h6>
                                    <ul>
                                        <li>Short-term exposure to nitrogen dioxide can cause respiratory irritation, coughing, wheezing, and shortness of breath.</li>
                                        <li>Prolonged exposure to high levels of nitrogen dioxide can contribute to the development or worsening of respiratory conditions, such as asthma and bronchitis.</li>
                                        <li>In individuals with pre-existing cardiovascular diseases, nitrogen dioxide exposure may increase the risk of heart attacks.</li>
                                    </ul>

                                    <h6 class="m-0 font-weight-bold">Ground-Level Ozone (O3)</h6>
                                    <ul>
                                        <li>Inhalation of ground-level ozone can cause throat irritation, coughing, chest discomfort, and shortness of breath.</li>
                                        <li>Prolonged exposure to high levels of ozone can lead to reduced lung function, increased respiratory infections, and the aggravation of asthma and other respiratory conditions.</li>
                                        <li>Ozone exposure is particularly harmful to children, the elderly, and individuals with respiratory diseases.</li>
                                    </ul>

                                    <h6 class="m-0 font-weight-bold">Particulate Matter (PM)</h6>
                                    <ul>
                                        <li>Inhalation of particulate matter can irritate the respiratory system, causing coughing, wheezing, and shortness of breath.</li>
                                        <li>Fine particulate matter (PM2.5) can penetrate deep into the lungs and enter the bloodstream, leading to cardiovascular problems, including heart attacks and strokes.</li>
                                        <li>Long-term exposure to high levels of particulate matter has been associated with the development of respiratory and cardiovascular diseases, and it can also worsen existing conditions.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color:#00703C;">Student's Information</h6>
                        </div>
                        <div>
                            <div id="content" style="color:#00703C;">
                                <div class="row" style="padding-left:20px">
                                    <div class="col-sm-6">
                                        <img src="../../assets/img/tayco.png" alt="Person's Photo" style="height: 200px; width: 200px;">
                                        <h2>Kent Angelo Tayco</h2>
                                        <h4>Student</h4>
                                        <p>A 4th year Computer Engineering student from La Salle University -  Ozamiz</p>
                                        <ul>
                                        <li><strong>Address:</strong> Dumingag, Zamboanga del Sur</li>
                                        <li><strong>Personal Email:</strong> kntngltyc@gmail.com</li>
                                        <li><strong>Schoool Email:</strong> kent.tayco@lsu.edu.ph</li>
                                        <li><strong>Phone:</strong> +63 929 296 3167</li>
                                        <li><strong>Website:</strong> <a href="https://www.linkedin.com/in/kent-angelo-tayco-a52262270/">LinkedIn</a></li>
                                        <!-- Add more details as needed -->
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="../../assets/img/roque.png" alt="Person's Photo" style="height: 200px; width: 200px;">
                                        <h2>Paul Roque</h2>
                                        <h4>Student</h4>
                                        <p>A 4th year Computer Engineering student from La Salle University -  Ozamiz</p>
                                        <ul>
                                        <li><strong>Address:</strong> Aloran, Misamis Occidental</li>
                                        <li><strong>Personal Email:</strong> paulfrq1986@gmail.com</li>
                                        <li><strong>School Email:</strong> paul.roque@lsu.edu.ph</li>
                                        <li><strong>Phone:</strong> +63 995 657 4209</li>
                                        <li><strong>Website:</strong> <a href="https://www.facebook.com/wmnnwlhtscuclh">Facebook</a></li>
                                        <!-- Add more details as needed -->
                                        </ul>
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