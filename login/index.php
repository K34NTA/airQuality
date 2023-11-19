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
   body {
    margin: 0;
    padding: 0;
    height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background-image: url('../assets/img/aqi.png');
    background-size: cover; /* Use cover for responsive background images */
}

@media only screen and (max-width: 600px) {
    body {
        background-size: contain; /* Adjust as needed */
    }
}


        @keyframes borderAnimation {
            0% {
                border-color: rgb(255, 0, 0);
            }
            25% {
                border-color: rgb(0, 255, 0);
            }
            50% {
                border-color: rgb(0, 0, 255);
            }
            75% {
                border-color: rgb(255, 255, 0);
            }
            100% {
                border-color: rgb(255, 0, 255);
            }
        }

        .login-form {
            background-color: rgba(18, 250, 219, 0.3);
            padding: 20px;
            border-radius: 30px;
            max-width: 400px;
            width: 100%;
            border: 6px solid transparent;
            animation: borderAnimation 5s infinite; 
        }

      

        .content {
            padding: 20px;
        }
        
    </style>
</head>

<body>
    <div class="login-form">
        <div class="text-center">
         <h1 style="color:hwb(0 100% 0%);">
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
            <button type="submit" name="login_btn" class="btn btn-success btn-user btn-block">Login</button>
        </form>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>