<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../includes/header.php'); ?>
    <title>Data Visualization</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://d3js.org/d3.v6.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color:#00703C;">Data Visualization</h6>
                        </div>
                        <div>
                            <div id="content" style="color:#00703C;">

                                <!-- Data Visualization -->
                                <canvas id="lineChart" style="width: 60vw; height: 40vh;"></canvas>
                                <!-- New Chart for Particulate Matter -->
                                <canvas id="particulateMatterChart" style="width: 60vw; height: 40vh;"></canvas>

                                <div style="display: flex; justify-content: center; align-items: center; flex-direction: column; text-align: center;">
                                    <canvas id="barChart" width="200" height="40"></canvas>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color:#00703C;">User Guide</h6>
                        </div>
                        <div style="padding-left:20px">
                            <div id="content" style="color:#00703C;">

                                <!-- Instructions for Legend Toggling -->
                                <div style="display: flex; flex-wrap: wrap;">
                                    <div style="flex: 1; margin-right: 20px;">
                                        <p><strong>Interacting with the Charts:</strong></p>
                                        <ul>
                                            <li><strong>Gas Chart:</strong> Represents sensor data for CO (blue), NO2 (orange), and Ozone (teal) over time.</li>
                                            <li><strong>Particulate Matter Chart:</strong> Represents sensor data for Particulate Matter over time.</li>
                                            <li><strong>Bar Chart:</strong> Displays current sensor values for CO, NO2, Ozone, and Particulate Matter.</li>
                                        </ul>
                                    </div>

                                    <!-- Interactive Features -->
                                    <div style="flex: 1;">
                                        <p><strong>Interactive Features:</strong></p>
                                        <ul>
                                            <li><strong>Toggling Legend:</strong> Click on legend items (e.g., "CO," "NO2") to hide. Click again to toggle visibility.</li>
                                            <li><strong>Understanding Units:</strong>
                                                <ul>
                                                    <li>PPM (Parts Per Million): Concentration of one part of a substance per million parts of air.</li>
                                                    <li>µg/Nm³ (Micrograms per Cubi meter): Mass of particles per unit volume of air.</li>
                                                </ul>
                                            </li>
                                            <li><strong>Data Point Color Indications:</strong>
                                                <ul>
                                                    <li><strong>Green:</strong> Good air quality.</li>
                                                    <li><strong>Yellow:</strong> Unhealthy.</li>
                                                    <li><strong>Red:</strong> Emergency or very unhealthy.</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Automatic Data Updates -->
                                <p><strong>Automatic Data Updates:</strong> Charts automatically update every <strong>30 seconds</strong> to reflect the latest sensor data.</p>

                            </div>
                        </div>
                    </div>

                    <script>
                        // Particulate Matter Chart
                        const particulateMatterChartData = {
                            labels: [],
                            datasets: [{
                                label: 'Particulate Matter (µg/m³)',
                                borderColor: 'rgba(128, 0, 128, 1)',
                                backgroundColor: 'rgba(128, 0, 128, 0.1)',
                                fill: true,
                                data: [],
                                tension: 0.5,
                            }, ],
                        };

                        const particulateMatterChartConfig = {
                            type: 'line',
                            data: particulateMatterChartData,
                            options: {
                                responsive: true,
                                scales: {
                                    x: {
                                        display: true,
                                        title: {
                                            display: true,
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

                        const particulateMatterChart = new Chart(document.getElementById('particulateMatterChart'), particulateMatterChartConfig);

                        function getColorForParticulateMatter(value) {
                            if (value <= 154) {
                                return 'rgba(0, 128, 0, 1)'; // Green
                            } else if (value > 155 && value <= 424) {
                                return 'rgba(255, 255, 0, 1)'; // Yellow
                            } else {
                                return 'rgba(255, 255, 0, 1)'; // Red
                            }
                        }
                        // End of Particulate Matter Chart

                        // Line and Bar Charts
                        const sensorData = {
                            CO: [],
                            NO2: [],
                            Ozone: [],
                        };

                        const lineChartData = {
                            labels: [],
                            datasets: [{
                                    label: 'Carbon Monoxide (PPM)',
                                    borderColor: 'rgba(0, 0, 255, 1)',
                                    backgroundColor: 'rgba(0, 0, 255, 0.1)',
                                    fill: true,
                                    data: sensorData.CO,
                                    tension: 0.5,
                                    pointBackgroundColor: [],
                                },
                                {
                                    label: 'Nitrogen Dioxide (PPM)',
                                    borderColor: 'rgba(255, 165, 0, 1)',
                                    backgroundColor: 'rgba(255, 165, 0, 0.1)',
                                    fill: true,
                                    data: sensorData.NO2,
                                    tension: 0.5,
                                    pointBackgroundColor: [],
                                },
                                {
                                    label: 'Ground-level Ozone (PPM)',
                                    borderColor: 'rgba(0, 128, 128, 1)',
                                    backgroundColor: 'rgba(0, 128, 128, 0.1)',
                                    fill: true,
                                    data: sensorData.Ozone,
                                    tension: 0.5,
                                    pointBackgroundColor: [],
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
                            datasets: [{
                                backgroundColor: ['rgba(0, 0, 255, 0.1)', 'rgba(255, 165, 0, 0.1)', 'rgba(0, 128, 128, 0.1)', 'rgba(128, 0, 128, 0.1)'],
                                borderColor: ['rgba(0, 0, 255, 1)', 'rgba(255, 165, 0, 1)', 'rgba(0, 128, 128, 1)', 'rgba(128, 0, 128, 1)'],
                                borderWidth: 1,
                                data: [0, 0, 0, 0],
                            }, ],
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

                        // Add functions to determine point background color based on value ranges
                        function getColorForCO(value) {
                            if (value <= 9.4) {
                                return 'rgba(0, 128, 0, 1)'; // Green
                            } else if (value > 9.5 && value <= 30.4) {
                                return 'rgba(255, 255, 0, 1)'; // Yellow
                            } else {
                                return 'rgba(255, 0, 0, 1)'; // Red
                            }
                        }

                        function getColorForNO2(value) {
                            if (value <= 0.65) {
                                return 'rgba(0, 128, 0, 1)'; // Green
                            } else if (value > 0.66 && value <= 1.24) {
                                return 'rgba(255, 255, 0, 1)'; // Yellow
                            } else {
                                return 'rgba(255, 0, 0, 1)'; // Red
                            }
                        }

                        function getColorForOzone(value) {
                            if (value <= 0.084) {
                                return 'rgba(0, 128, 0, 1)'; // Green
                            } else if (value > 0.085 && value <= 0.374) {
                                return 'rgba(255, 255, 0, 1)'; // Yellow
                            } else {
                                return 'rgba(255, 0, 0, 1)'; // Red
                            }
                        }

                        const lineChart = new Chart(document.getElementById('lineChart'), lineChartConfig);
                        const barChart = new Chart(document.getElementById('barChart'), barChartConfig);
                        
                    function formatDateManilaTime(utcDateTime) {
                        const utcDate = new Date(utcDateTime);
                        const manilaTime = new Date(utcDate.getTime() + (8 * 60 * 60 * 1000)); 
                        
                        return manilaTime.toLocaleString('en-US', {
                            year: 'numeric',
                                                month: 'numeric',
                                                day: '2-digit',
                                                hour: '2-digit',
                                                minute: '2-digit',
                                                hour12: true, 
                        });
                    }

                        function fetchDataAndUpdateCharts() {
                            $.ajax({
                                url: 'ajax_chart.php', 
                                type: 'GET',
                                dataType: 'json',
                                success: function (data) {
                                    // Update line chart
                                    lineChartData.labels = data.map(entry => formatDateManilaTime(entry.time));
                                    lineChartData.datasets[0].data = data.map(entry => entry.carbon_monoxide);
                                    lineChartData.datasets[1].data = data.map(entry => entry.nitrogen_dioxide);
                                    lineChartData.datasets[2].data = data.map(entry => entry.ground_level_ozone);
                                    lineChart.update();

                                    // Inside the success callback of the AJAX request where you update the data, set the point background color
                                    lineChartData.datasets[0].pointBackgroundColor = data.map(entry => getColorForCO(entry.carbon_monoxide));
                                    lineChartData.datasets[1].pointBackgroundColor = data.map(entry => getColorForNO2(entry.nitrogen_dioxide));
                                    lineChartData.datasets[2].pointBackgroundColor = data.map(entry => getColorForOzone(entry.ground_level_ozone));

                                    lineChart.update();

                                    // Update particulate matter chart
                                   particulateMatterChartData.labels = data.map(entry => formatDateManilaTime(entry.time));
                                    particulateMatterChartData.datasets[0].data = data.map(entry => entry.particulate_matter);

                                    // Apply color-coding to the pointBorderColor and pointBackgroundColor properties based on sensor values
                                    particulateMatterChartData.datasets[0].pointBorderColor = data.map(entry => getColorForParticulateMatter(entry.particulate_matter));
                                    particulateMatterChartData.datasets[0].pointBackgroundColor = data.map(entry => getColorForParticulateMatter(entry.particulate_matter));

                                    particulateMatterChart.update();

                                    // Update bar chart
                                    barChartData.datasets[0].data = [
                                        data[0].carbon_monoxide,
                                        data[0].nitrogen_dioxide,
                                        data[0].ground_level_ozone,
                                        data[0].particulate_matter,
                                    ];
                                    barChart.update();

                                },
                                error: function(error) {
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
