<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ('../includes/header.php'); ?>
    <title>Data Visualization</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
  <script src="https://d3js.org/d3.v6.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  

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
                    
                    <div class="row">

                        <div class="col-lg-12">

                            <!-- Data Visualization -->
                            <canvas id="lineChart" style="width: 60vw; height: 40vh;"></canvas>
                              <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; text-align: center;">
                                <canvas id="barChart" width="200" height="40"></canvas>
                                
                                <script>
                                  const sensorData = {
                                    CO: [],
                                    NO2: [],
                                    Ozone: [], 
                                    dust: [],
                                  };

                                  const lineChartData = {
                                    labels: [],
                                    datasets: [
                                      
                                      {
                                        label: 'Carbon Monoxide (PPM)',
                                        borderColor: 'rgba(255, 99, 132, 1)',
                                        backgroundColor: 'rgba(255, 99, 132, 0.1)',
                                        fill: true,
                                        data: sensorData.CO,
                                        tension: 0.5,
                                      },
                                      {
                                        label: 'Nitrogen Dioxide (PPM)',
                                        borderColor: 'rgba(54, 162, 235, 1)',
                                        backgroundColor: 'rgba(54, 162, 235, 0.1)',
                                        fill: true,
                                        data: sensorData.NO2,
                                        tension: 0.5,
                                      },
                                      {
                                        label: 'Ground-level Ozone (PPM)', 
                                        borderColor: 'rgba(0, 128, 0, 1)',
                                        backgroundColor: 'rgba(0, 128, 0, 0.1)',
                                        fill: true,
                                        data: sensorData.Ozone,
                                        tension: 0.5,
                                      },
                                      {
                                        label: 'Particulate Matter (µg/Nm3)',
                                        borderColor: 'rgba(255, 255, 75, 1)',
                                        backgroundColor: 'rgba(255, 255, 75, 0.1)',
                                        fill: true,
                                        data: sensorData.dust,
                                        tension: 0.5,
                                      },
                                    ],
                                  };

                                  const lineChartConfig = {
                                  type: 'line',
                                  data: lineChartData,
                                  options: {
                                    responsive: true,
                                    scales: {
                                      x: {
                                        display: true,
                                        title: {
                                          display: true,
                                          text: 'Real time Data',
                                        },
                                      },
                                      y: {
                                        display: true,
                                        title: {
                                          display: true,
                                          text: 'Sensor Value',
                                        },
                                      },
                                    },
                                      plugins: {
                                        wavyLines: {
                                          tension: 0.3, // Adjust the tension for the wavy effect (0.1 to 0.5)
                                        },
                                      },
                                      animation: {
                                        duration: 3000, // Adjust animation duration for smoothness
                                      },
                                    },
                                  };

                                  const barChartData = {
                                    labels: ['Carbon Monoxide (PPM)', 'Nitrogen Dioxide (PPM)', 'Ground-level Ozone (PPM)', 'Particulate Matter (µg/Nm3)'],
                                    datasets: [
                                      {
                                        backgroundColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(0, 128, 0, 1)', 'rgba(255, 255, 75, 1)'], 
                                        borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(0, 128, 0, 1)', 'rgba(255, 255, 75, 1)'], 
                                        borderWidth: 1,
                                        data: [0, 0, 0, 0],
                                      },
                                    ],
                                  };

                                  const barChartConfig = {
                                    type: 'bar',
                                    data: barChartData,
                                    options: {
                                      responsive: true,
                                      scales: {
                                        x: {
                                          display: true,
                                        },
                                        y: {
                                          display: true,
                                          title: {
                                            display: true,
                                            text: 'Sensor Value',
                                          },
                                        },
                                      },
                                      plugins: {
                                        legend: {
                                          display: false,
                                        },
                                      },
                                    },
                                  };

                                  const sensorColors = {
                                    CO: 'rgba(255, 99, 132, 0.2)',
                                    NO2: 'rgba(54, 162, 235, 0.2)',
                                    Ozone: 'rgba(0, 128, 0, 0.2)',
                                    dust: 'rgba(255, 255, 75, 0.1)',
                                  };

                                  const lineChart = new Chart(document.getElementById('lineChart'), lineChartConfig);
                                  const barChart = new Chart(document.getElementById('barChart'), barChartConfig);

                                
                                  function fetchDataAndUpdateCharts() {
                                $.ajax({
                                  url: 'ajax_chart.php', // Replace with the actual path to your PHP script
                                  type: 'GET',
                                  dataType: 'json',
                                  success: function (data) {
                                    // Update line chart
                                    lineChartData.labels = data.map(entry => entry.time);
                                    lineChartData.datasets[0].data = data.map(entry => entry.carbon_monoxide);
                                    lineChartData.datasets[1].data = data.map(entry => entry.nitrogen_dioxide);
                                    lineChartData.datasets[2].data = data.map(entry => entry.ground_level_ozone);
                                    lineChartData.datasets[3].data = data.map(entry => entry.particulate_matter);
                                    lineChart.update();

                                    // Update bar chart
                                    barChartData.datasets[0].data = [
                                      data[data.length - 1].carbon_monoxide,
                                      data[data.length - 1].nitrogen_dioxide,
                                      data[data.length - 1].ground_level_ozone,
                                      data[data.length - 1].particulate_matter,
                                    ];
                                    barChart.update();

                                    
                                  },
                                  error: function (error) {
                                    console.error('Error fetching data:', error);
                                  },
                                });
                              }

                              setInterval(() => {
                                fetchDataAndUpdateCharts();
                              }, 30000); // milliseconds
                              fetchDataAndUpdateCharts();  

                                </script> 

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