<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ('../includes/header.php'); ?>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    * {
       box-sizing: border-box;
         }

        body {
         margin: 0;
         font-family: Arial;
         font-size: 17px;
            }

        #myVideo {
          position: fixed;
          right: 0;
          bottom: 0;
          min-width: 100%; 
          min-height: 100%;
            }

        .content {
          position: fixed;
          bottom: 0;
          background: rgba(0, 0, 0, 0.5);
          color: #f1f1f1;
          width: 100%;
          padding: 20px;
            }

        #myBtn {
          width: 200px;
          font-size: 18px;
          padding: 10px;
          border: none;
          background: #000;
          color: #fff;
          cursor: pointer;
            }

        #myBtn:hover {
          background: #ddd;
          color: black;
            }
        </style>
    </head>
  <body>
            <video autoplay muted loop id="myVideo">
              <source src=" <?php echo base_url ?>assets/img/video.mp4" type="video/mp4">
</video>

    </video>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <h1 class="h1 text-center text-info mb-4">Employee Portal</h1>
                    <div class="card bg-transparent text-white" style="border-radius: 1rem;">
                        <div class="card-body p-3 text-center">
                            <div class="mb-md-0 mt-md-0 pb-0">
                                <img src="<?php echo base_url ?>assets/img/invoice-logo.png" Width=200 height=100>
                                <br>
                                <br>
                                <br>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input name="username" type="text" value="" class="input form-control" id="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                    <br>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input name="Password" type="Password" value="" class="input form-control" id="Password" placeholder="Password" required="true" aria-label="Password" aria-describedby="basic-addon1">
                                        <div class="input-group-append">
                                            <span class="input-group-text" onclick="password_show_hide();">
                                                <i class="fas fa-eye" id="show_eye"></i>
                                                <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!"><strong>Forgot password?</a></p>
                                <button class="btn btn-outline-success btn-lg px-5" type="submit"><strong>Login</button>
                                <br>
                                <br>
                                <div class=" d-md-flex justify-content-md-end">
                                    <p class="small mb-0 pb-lg-0 font-italic "><a class="text-white-50" href="#!">Click here to view privacy policy</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
