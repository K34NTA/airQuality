<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ('../includes/header.php'); ?>
    <title>Activity Log</title>
    <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="<?php echo base_url ?>assets/js/datatables.min.js"></script>
    <style>
        /* CSS styles */
        table {
            border-collapse: collapse;
            width: 50%;
            padding: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            text-align: left;
        }

        #average-chart-container {
            width: 95%;
            margin: 20px;
        }
    </style>
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
                    <!-- <h1 class="h3 mb-4 text-gray-800"><strong>Activity Log</strong></h1> -->

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color:#00703C;">Activity Log</h6>
                        </div>
                        <div style="padding: 20px;">
                            <style>
                                table {
                                    width: 100%;
                                    border-collapse: collapse;
                                    font-family: Arial, sans-serif;
                                }


                                th, td {
                                    padding: 8px;
                                    text-align: center;
                                    border: 1px solid black;
                                    color: black;
                                }

                                .good {
                                    background-color: #58D68D;
                                }

                                .unhealthy {
                                    background-color: #F5B041 ;
                                }

                                .emergency {
                                    background-color: #EC7063;
                                }
                            </style>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Pollutant</th>
                                        <th>Good</th>
                                        <th>Unhealthy</th>
                                        <th>Emergency</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>PM10 (µg/Nm3)</td>
                                        <td class="good">0 - 154</td>
                                        <td class="unhealthy">155 - 424</td>
                                        <td class="emergency">425 and above</td>
                                    </tr>
                                    <tr>
                                        <td>O3 (ppm)</td>
                                        <td class="good">0.000 - 0.084</td>
                                        <td class="unhealthy">0.085 - 0.374</td>
                                        <td class="emergency">0.375 and above</td>
                                    </tr>
                                    <tr>
                                        <td>CO (ppm)</td>
                                        <td class="good">0.0 - 9.4</td>
                                        <td class="unhealthy">9.5 - 30.4</td>
                                        <td class="emergency">30.5 and above</td>
                                    </tr>
                                    <tr>
                                        <td>NO2 (ppm)</td>
                                        <td class="good">0.00 - 0.65</td>
                                        <td class="unhealthy">0.65 - 1.24</td>
                                        <td class="emergency">1.25 and above</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>  
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Carbon Monoxide</th>
                                            <th>Nitrogen Dioxide</th>
                                            <th>Ground-level Ozone</th>
                                            <th>Particulate Matter</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Time</th>
                                            <th>Carbon Monoxide</th>
                                            <th>Nitrogen Dioxide</th>
                                            <th>Ground-level Ozone</th>
                                            <th>Particulate Matter</th>
                                        </tr>
                                    </tfoot>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="search-container">
                    <label for="search">Search by time:</label>
                    <input type="date" id="search" placeholder="Enter time (YYYY-MM-DD)">
                    <button id="search-button">Search</button>
                </div>


        <table id="data-table">
            <thead>
                <tr>
                    <th>Date & time</th>
                    <th>Carbon monoxide</th>
                    <th>Nitrogen dioxide</th>
                    <th>Ground level ozone</th>
                    <th>Particulate matter</th>
                </tr>
            </thead>
            <tbody>
                <!-- Table rows will be dynamically added here -->
            </tbody>
        </table>
        <div id="average-chart-container">
            <canvas id="average-chart"></canvas>
        </div>

            <script>

                // Function to fetch data from the server and populate the table and chart
                function fetchDataAndPopulate() {
                    fetch('backends.php') // Replace with the URL to your PHP script
                        .then(response => response.json())
                        .then(data => {
                            // Sort the data by the 'time' field in descending order
                            data.sort((a, b) => new Date(b.time) - new Date(a.time));

                            // Get only the latest data (you can adjust the number of records you want to display)
                            const latestData = data.slice(0, 1);

                            // Populate the table and chart with the latest data
                            populateTableAndGraph(latestData);
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                        });
                }


                // Function to populate the table and calculate daily averages
                function populateTableAndGraph(data) {
                    const tableBody = document.querySelector('#data-table tbody');
                    const averageData = {};

                    // Clear existing table data
                    tableBody.innerHTML = '';

                    // Loop through the data
                    data.forEach(item => {
                        const { time, carbon_monoxide, nitrogen_dioxide, ground_level_ozone, particulate_matter } = item;

                        // Add a row to the table
                        const row = document.createElement('tr');
                        row.innerHTML = `<td>${time}</td><td>${carbon_monoxide}</td><td>${nitrogen_dioxide}</td><td>${ground_level_ozone}</td><td>${particulate_matter}</td>`;
                        tableBody.appendChild(row);

                        // Calculate daily totals and counts
                        if (averageData[time] === undefined) {
                            averageData[time] = { total1: 0, total2: 0, total3: 0, total4: 0, count: 0 };
                        }
                        averageData[time].total1 += carbon_monoxide;
                        averageData[time].total2 += nitrogen_dioxide;
                        averageData[time].total3 += ground_level_ozone;
                        averageData[time].total4 += particulate_matter;
                        averageData[time].count++;
                    });

                    // Calculate daily averages for each value
                    const date = Object.keys(averageData);
                    const averages1 = date.map(time => (averageData[time].total1 / averageData[time].count).toFixed(2));
                    const averages2 = date.map(time => (averageData[time].total2 / averageData[time].count).toFixed(2));
                    const averages3 = date.map(time => (averageData[time].total3 / averageData[time].count).toFixed(2));
                    const averages4 = date.map(time => (averageData[time].total4 / averageData[time].count).toFixed(2));

                    // Create a bar chart using Chart.js
                    const ctx = document.getElementById('average-chart').getContext('2d');
                    if (window.myChart) {
                        window.myChart.destroy();
                    }
                    window.myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: date,
                            datasets: [
                                {
                                    label: 'Carbon monoxide',
                                    data: averages1,
                                    backgroundColor: 'rgba(0, 116, 217, 0.7)',
                                },
                                {
                                    label: 'Nitrogen dioxide',
                                    data: averages2,
                                    backgroundColor: 'rgba(255, 0, 0, 0.7)',
                                },
                                {
                                    label: 'Ground level ozone',
                                    data: averages3,
                                    backgroundColor: 'rgba(0, 255, 0, 0.7)',
                                },
                                {
                                    label: 'Particulate matter',
                                    data: averages4,
                                    backgroundColor: 'rgba(255, 255, 0, 0.7)',
                                },
                            ],
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true,
                                },
                            },
                        },
                    });
                }

// Search functionality
const searchInput = document.getElementById('search');
const searchButton = document.getElementById('search-button');

// Function to handle the search action
function performSearch() {
    const searchTerm = searchInput.value.trim();
    if (searchTerm === '') {
        // If the search bar is cleared, fetch and display the latest data
        fetchDataAndPopulate();
    } else {
        // Validate that searchTerm is in YYYY-MM-DD format (you can add more robust validation)
        if (/^\d{4}-\d{2}-\d{2}$/.test(searchTerm)) {
            fetch(`backends.php?search=${searchTerm}`)
                .then(response => response.json())
                .then(data => {
                    populateTableAndGraph(data);
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        } else {
            alert('Please enter a valid date in YYYY-MM-DD format.');
        }
    }
}

// Attach the search function to the input field's keypress event
searchInput.addEventListener('keypress', event => {
    if (event.key === 'Enter') {
        performSearch();
    }
});

// Attach the search function to the button's click event
searchButton.addEventListener('click', performSearch);



                    // Call the function with your data to initialize the page
                    fetchDataAndPopulate();
                </script>
                    <!-- Reset data button -->
                    <!-- <form method="POST" action="">
                        <button id="resetDataBtn" class="btn btn-danger">Reset Data</button>
                        <?php
                        // if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        //     include_once('../includes/header.php');

                        //     $query = "TRUNCATE TABLE gasses";

                        //     if (mysqli_multi_query($con, $query)) {
                        //         $_SESSION['status'] = "Truncate Successfully.";
                        //         $_SESSION['status_code'] = "success";
                        //     } else {
                        //         $_SESSION['status'] = "Error" . mysqli_error($con);
                        //         $_SESSION['status_code'] = "error";
                        //     }

                        //     mysqli_close($con);
                        // }
                        ?>
                    </form> -->
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

    <!-- DataTables JavaScript code -->
    <script type="text/javascript">
        $(document).ready(function() {
            var dataTable = $('#dataTable').DataTable({
                'processing': true,
                'serverSide': true,
                'serverMethod': 'post',
                'ajax': {
                    'url': 'backend.php'
                },
                'columns': [{
                        data: 'time'
                    },
                    {
                        data: 'carbon_monoxide'
                    },
                    {
                        data: 'nitrogen_dioxide'
                    },
                    {
                        data: 'ground_level_ozone'
                    },
                    {
                        data: 'particulate_matter'
                    },
                ]
            });
        });
    </script>
    <!-- Start of Modal -->
    <?php include ('../includes/modal.php'); ?>
    <!-- End of Modal -->

    <!-- Start of Bottom -->
    <?php include ('../includes/bottom.php'); ?>
    <!-- End of Bottom -->
    
</body>

</html>