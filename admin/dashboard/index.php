<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ('../includes/header.php'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Add Issue</title>
</head>
<body>
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

              <h5 class=" mb-4 text-gray-800" >
                    <strong style="padding-left: 20px;">Project Home:</strong>Recent Updates 
                    <i class="fas fa-wifi" style="transform: rotate(45deg);"></i>
              </h5>
              <div style="display: flex; height: 800px;gap:30px;padding:10px">
                  <div class="card" style="height: 1000px; width: 1150px;background-color:#f8f9fc;border: 1px solid; padding:10px  ">
                    <div class="card" style="height: 460px;background-color:#f8f9fc;border: 1px solid  ">
                      <h6 style= "border-bottom: groove ; padding:10px"><strong> Wed. Jul. 06,2022</h6>
                      <i class="fas fa-user-circle "style="float:left;padding:10px;font-size: 45px; "></i> 
                      <h6 style="text-align: left; padding:17px">
                        <strong>
                          Developer 2
                          <button style="width: 135px; border-radius: 1rem; text-align: center; background-color: #5eb5a6; margin-right: 10px;" class="btn btn-sm text-light">updated</button> 
                          the issue 
                        </strong>
                      </h6>
                    </div>
                    <br><br>
                    <div style="display: flex; height: 300px;px;">
                      <div class="card" style="height: 465px; width: 1130px;background-color:#f8f9fc;border: 1px solid  ">
                        <h6 style= "border-bottom: groove ; padding:10px"><strong> Wed. Jul. 06,2022</h6>
                        <i class="fas fa-user-circle "style="float:left;padding:10px;font-size: 45px; "></i> 
                        <h6 style="text-align: left; padding:17px"> 
                          <strong>Developer 2
                          <button style="width: 135px; border-radius: 1rem; text-align: center; background-color: #5eb5a6; margin-right: 10px;" class="btn btn-sm text-light">updated</button> 
                          the issue </strong>
                        </h6>
                      </div>
                    </div>
                  </div>

                <!-- Content of the First card -->

                <div class="card" style="height: 708px; width: 650px; background-color: #f8f9fc; border: 2px solid #ccc; padding-right: 20px;">
                    <div class="col-xl- col-lg-5">
                        
                    <!-- Card Header - Dropdown -->

                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="width: 630px;">
                                <h6 class="m-0 font-weight-bold text-primary">Status</h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                </div>
                            </div>

                            <!-- Card Body -->

                            <div class="card-body" style=" width: 550px;">
                                <div class="chart-pie;">
                                <canvas id="myPieChart" style="display: block; box-sizing: border-box; height: 494px; width: 494px;" width="370" height="370"></canvas>
                                </div>
                            </div>
                        </div>
                        <div style="padding-bottom:10px;padding-left:26px;">                                                    
                                <input value="Open" style ="width:135px;border-radius:0.5rem; text-align:center;border-style:none; margin-right: 10px;"disabled>
                                <input value="In Progress" style ="width:135px;border-radius:0.5rem; text-align:center;border-style:none; margin-right: 10px;"disabled>
                                <input value="Resolved" style ="width:135px;border-radius:0.5rem; text-align:center;border-style:none; margin-right: 10px;"disabled>
                                <input value="Closed" style ="width:135px;border-radius:0.5rem; text-align:center;border-style:none; margin-right: 12px;"disabled>
                                <br>
                                <button style="width: 135px; border-radius: 1rem; text-align: center; background-color: #ed6e6ec4; margin-right: 10px;" class="btn btn-sm text-light">30%</button>
                                <button style="width: 135px; border-radius: 1rem; text-align: center; background-color: #36b9cc; margin-right: 10px;" class="btn btn-sm text-light">45%</button>
                                <button style="width: 135px; border-radius: 1rem; text-align: center; background-color: #5eb5a6; margin-right: 10px;" class="btn btn-sm text-light">25%</button>
                                <button style="width: 135px; border-radius: 1rem; text-align: center; background-color: #f6c23e; margin-right: 10px;" class="btn btn-sm text-light">20%</button>
                        </div>    
                    </div> 
                          <br>
                        <!-- Content of the second card -->  
                      <h5>
                        <strong> Category </strong>
                                <i class="fa fa-paint-brush" aria-hidden="true" style="float: right; border:ridge;border-radius:33rem;padding:5px;border"></i>
                      </h5>
                      <br>
                  <div class="card">
                      <div class="ui menu"></div>
                          <div style="padding:10px;">
                                  <table >
                            <p class="text-info">API</p>
                              <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 20%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                              <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                              <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>     
                              <td><input value="14 % Closed" style="width: 600px; border-radius: 0.5rem ;border-style: none; text-align:right; " disabled></td>
                              </div>   
                                  </table> 
                          </div>   
                          <hr style="margin: 0; border: none; border-top: 0.5px solid gray;margin-top:1px"></hr>
                    <div style="padding:10px;">
                      <table>
                          <p class="text-info">UI</p>
                            <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                              <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                              <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                              <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>     
                              <td><input value="14 % Closed" style="width: 600px; border-radius: 0.5rem; border-style: none; text-align:right; float: right;" disabled></td>
                            </div>    
                      </table>
                    </div>
                  </div>
              </div>
      </div>  
        
            <!-- Start of Modal -->
            <?php include ('../includes/modal.php'); ?>
            <!-- End of Modal -->

            <!-- Footer -->
            <?php include ('../includes/footer.php'); ?>
            <!-- End of Footer -->

        <style>
          .progress-bar {
            width: 609px;
            height: 28px;
            background-color: #ed6e6ec4;
        }

        .progress-bar-inner {
            height: 100%;
        }
        </style>

      <script>
          // Data for the pie chart
          var data = {
              datasets: [{
                  data: [30, 45, 25, 20], // Replace with your data values
                  backgroundColor: ['#ef8f8f', '#17a2b8', '#5eb5a6', '#f0ad4e'], // Replace with desired colors
              }]
          };

          // Pie chart configuration
          var options = {
              responsive: true
          };

          // Create the pie chart
          var ctx = document.getElementById('myPieChart').getContext('2d');
          new Chart(ctx, {
              type: 'pie',
              data: data,
              options: options
          });
      </script>
                  
      <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

</div>   

</body>
</html>
