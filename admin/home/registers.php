<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ('../includes/header.php'); ?>
    <title>SB Admin 2 - Register</title>
    
</head>

<body >
<div id="wrapper">
        <!-- Sidebar -->
            <?php include('../includes/sidebar.php'); ?>
        <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                    <?php include ('../includes/topbar.php'); ?>
                <!-- End of Topbar -->
                
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-1">
                <!-- Nested Row within Card Body -->
 
                    <div class="col-lg-0 bg-gradient-light">
                        <div class="p-5 0">
                        <img src="<?php echo base_url ?>assets/img/invoice-logo.png" Width=140 height=70>
                            <div class="text-center">
                                <h1 class="h2 text-gray-700 mb-4">Create Employee Account</h1>
                            </div>
                            <form class="user">
                                <div class="form-group row ">
                                    <div class="col-sm-6 mb-3 mb-sm-0 ">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6 ">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div>                                                                
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0 ">
                                        <input type="text" class="form-control form-control-user" id="exampleAddress"
                                            placeholder="Address">
                                    </div>
                                    <div class="col-sm-6 ">
                                    <input type="text" class="form-control form-control-user" id="exampleIDNumber"
                                            placeholder="ID Number">
                                    </div>                                                                
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0 ">
                                        <input type="text" class="form-control form-control-user" id="exampleLandlineNumber"
                                            placeholder="Landline Number">
                                    </div>          
                                    <div class="col-sm-6 ">
                                    <input type="text" class="form-control form-control-user" id="examplePhoneNumber"
                                            placeholder="Phone Number">
                                    </div>                                                     
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0 ">
                                        <input type="text" class="form-control form-control-user" id="exampleCompany"
                                            placeholder="Company">
                                    </div>
                                    <div class="col-sm-6 ">
                                        <input type="text" class="form-control form-control-user" id="exampleBranch"
                                            placeholder="Branch">
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0 ">
                                        <input type="text" class="form-control form-control-user" id="examplePosition"
                                            placeholder="Position">
                                    </div>  
                                </div>
                                <div class="form-group ">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group ">
                                    <input type="text" class="form-control form-control-user" id="exampleUsername"
                                        placeholder="Username">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0 ">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6  ">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                </div>
                                <br>
                                <div class="d-md-flex justify-content-md-between">
                                    <div style="padding: 0px 40px">
                                        <a href="registers.php" class="btn btn-primary btn-user" style="padding: 15px 50px">
                                        Reset
                                        </a>
                                    </div>
                                    <div style="padding: 0px 40px">
                                        <a href="login.php" class="btn btn-primary btn-user" style="padding: 15px 40px">
                                        Register
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</div>
    </dic>
    </div>

    <!-- Start of Modal -->
    <?php include ('../includes/modal.php'); ?>
    <!-- End of Modal -->

    <!-- Start of Bottom -->
        <?php include ('../includes/bottom.php'); ?>
    <!-- End of Bottom -->

</body>

</html>