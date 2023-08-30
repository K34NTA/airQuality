<?php include ('../db_conn.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="shortcut icon" type="image/ico" href="../assets/img/ccsea.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>

    <link href="<?php echo base_url ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">  
    <link href="<?php echo base_url ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('../assets/img/aqi.png');
            background-size: cover;
         
          
        }

        .container {
            display: flex;
            justify-content: flex-start;
            align-items: center;
            min-height: 100vh;
            margin: 0; 
            padding: 0; 
            width: 90%; 
            z-index: 1;
}
       
        .logo {
            
             width: 80px;
             height: 80px;
             position: fixed;
             top: calc(60px + ((100vh - 1000px) / 2));          
             transform: translateX(-50%);
             z-index: 1;
             left: calc(7cm + 5.8px);
        }
        

        .login-box {
             position: fixed;
             background-color: rgba(56, 68, 4, 0.199);
             border-radius: 20px;
             box-shadow: 0 0 20px rgba(0, 0, 0, 0.144);
             padding: 90px;
             width: 500px;
             height: 900px;
             animation: aura 3s linear infinite;
             text-align: center;
             left: calc(0.5cm + 0.8px);
             z-index: 1;
        } 
        .common-container {
            position: relative;
            width: 100%;
            height: 100vh;
            z-index: 1;
        }   
        .video-container {
            position: relative;
            
            width: 100%;
            height: 102%;
            overflow: relative;
          
            left: calc(0.5cm + 0.8px);
            bottom: calc(-0.12cm + -0.12px);
            z-index: -1;
            
        }

        /* Style the video element */
        #video-bg {
            width: 44%;
            height: 900px;
            object-fit: cover;
            left: calc(0.5cm + 0.8px);
            border-radius: 20px;
            z-index: -1;
            background-color: rgba(56, 68, 4, 0.199);           
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.144);
            
        }

        /* Style the login box */
        .login-box {
            position: absolute;
            z-index: 1;
        } 
        @keyframes aura {
            0% {
                box-shadow: 0 0 200px rgba(111, 199, 128, 0.815);
            }

            50% {
                box-shadow: 0 0 150px rgba(53, 158, 76, 0.836), 0 0 200px rgba(163, 204, 17, 0.932);
            }

             100% {
                box-shadow: 0 0 200px rgba(153, 180, 35, 0.904);
            }
        }
        
    </style>

</head>

<body>
<div class="common-container">
<div class="container">
        <img src="../assets/img/ccsea.png" alt="invoice" class="logo" width="60px" height="60px">
        <div class="video-container">
            <video autoplay muted loop id="video-bg">
                <source src="../assets/video/1.mp4" type="video/mp4">
                <!-- You can provide multiple source elements for different video formats -->
                Your browser does not support the video tag.
            </video>
        </div>       
        <script>
        const videos = [
            "../assets/video/1.mp4",
            "../assets/video/2.mp4",
            "../assets/video/3.mp4"
           
        ];
        const videoElement = document.getElementById('video-bg');
        let currentVideoIndex = 0;

        function playNextVideo() {
            // Fade out the current video
            videoElement.style.opacity = 5;

            // Load and play the next video
            setTimeout(() => {
                videoElement.src = videos[currentVideoIndex];
                videoElement.play().catch(error => {
                    console.error('Error playing video:', error);
                });
                currentVideoIndex = (currentVideoIndex + 1) % videos.length;

                // Fade in the next video
                videoElement.style.opacity = 100;
            }, 100); // Delay to allow fade out effect to complete (1s transition)

            // Repeat for the next video
            setTimeout(playNextVideo, 15000); // Delay between videos (10s)
        }

        // Start playing the first video
        playNextVideo();
    </script>   
        <div class="login-box">
            <div class="text-center">
                <h3 style="color:#06611d;">
                    <strong style="font-family: none;">IoT Real Time Air Quality Monitoring System</strong>
                </h3>
            </div>
            <form class="user" action="logincode.php" method="POST">
           
                                    <form class="user" action="logincode.php" method="POST" style="padding-left: 600px;padding-right: 600px;">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                                        </div>
                                    
                                        <button type="submit" name="login_btn" class="btn btn-success btn-user btn-block">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    </div>
    <?php include ('message.php'); ?>
    <script>
      var base_url = "<?php echo base_url ?>"; 
    </script>   
    <script src="<?php echo base_url ?>assets/js/sweetalert.js"></script>   
    <script src="<?php echo base_url ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>   
    <script src="<?php echo base_url ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>