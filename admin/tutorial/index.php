<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ('../includes/header.php'); ?>
    <title>SB Admin 2 - Blank</title>
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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color:#00703C;">How to properly use the website</h6>
                        </div>
                        <div>
                            <div id="content" style="color:#00703C;">
                                <div class="container-fluid" style="padding-top: 20px;">
                                    <p class="font-weight-bold">1. Dashboard page</p>
                                    <p style="padding-left:20px;"> 1.1 Charts </p>
                                    <p style="padding-left:40px;"> 1.1.1 Line Chart</p>
                                    <center>
                                    <p style="padding-left:60px;"> The first line chart displays three gas data</p>
                                    <p style="padding-left:60px;"> Click on the legends to focus on individual gases</p>
                                    <p style="padding-left:60px;"> To exclude a gas from the chart, click its legend again.</p>                                        
                                    </center>
                                    <p style="padding-left:40px;"> 1.1.2 Dust data line chart</p>
                                    <center>
                                    <p style="padding-left:60px;"> This separate line chart displays dust data. No action needed to view it clearly.</p>                                    
                                    </center>
                                    <p style="padding-left:40px;"> 1.1.3 Bar Chart</p>
                                    <center>
                                    <p style="padding-left:60px;"> Displays the latest sensor data. All data points are presented in the bar chart.</p>                                    
                                    </center>
                                    <p style="padding-left:20px;"> 1.2 User Guide</p>
                                    <center>
                                    <p style="padding-left:60px;"> Find tips on how to interpret and navigate the charts effectively.</p>                                    
                                    </center>
                                    <p class="font-weight-bold">2. Activity Log page</p>
                                    <p style="padding-left:20px;"> 2.1 Tables </p>
                                    <p style="padding-left:40px;"> 2.1.1 Gas Quality Table</p>
                                    <p style="padding-left:40px;"> 2.1.2 Overall Data Table</p>
                                    <p style="padding-left:40px;"> 2.1.3 Date Range Table</p>
                                    <p style="padding-left:20px;"> 2.2.1 Download data</p>
                                    <p class="font-weight-bold">3. Air Quality Index page</p>
                                    <p class="font-weight-bold">4. About page</p>
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