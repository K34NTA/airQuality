<?php include ('../db_conn.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="image/ico" href="../assets/img/logo.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body, html {
            margin: 0;
            padding: 0;
        }

        .background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('../assets/img/aqi.png');
            background-size: cover;
            background-position: center;
            z-index: -1; 
        }

        .content {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="background-image"></div>
    <div class="row">
        <!-- Outer Row -->
        <div class="justify-content-center">
            <div class="background-image">
                <div class="row">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="col-md-4" >
                            <div class="text-center">
                                <h1 style="color:#ffffff;">
                                    <strong style="font-family: none;">Welcome Back!</strong>
                                </h1>
                            </div>
                            <form class="user" action="logincode.php" method="POST">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                                </div>
                                <!-- <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                                    </div>
                                </div> -->
                                <button type="submit" name="login_btn" class="btn btn-success btn-user btn-block">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include ('message.php'); ?>
    <script>
      var base_url = "<?php echo base_url ?>"; // global location for javascript
    </script>
    <!-- SweetAlert -->
    <script src="<?php echo base_url ?>assets/js/sweetalert.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>