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

                    <!-- Basis for the data -->
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
                                        <td>Particulate Matter (µg/m³)</td>
                                        <td class="good">0 - 154</td>
                                        <td class="unhealthy">155 - 424</td>
                                        <td class="emergency">425 and above</td>
                                    </tr>
                                    <tr>
                                        <td>Ground-level Ozone (ppm)</td>
                                        <td class="good">0.000 - 0.084</td>
                                        <td class="unhealthy">0.085 - 0.374</td>
                                        <td class="emergency">0.375 and above</td>
                                    </tr>
                                    <tr>
                                        <td>Carbon Monoxide (ppm)</td>
                                        <td class="good">0.0 - 9.4</td>
                                        <td class="unhealthy">9.5 - 30.4</td>
                                        <td class="emergency">30.5 and above</td>
                                    </tr>
                                    <tr>
                                        <td>Nitrogen Dioxide (ppm)</td>
                                        <td class="good">0.00 - 0.65</td>
                                        <td class="unhealthy">0.65 - 1.24</td>
                                        <td class="emergency">1.25 and above</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- Displaying all the data and can be search -->
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

                    <!-- Daily average -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color:#00703C;">Check Daily Average</h6>
                        </div>
                        <div>
                            <div id="content" style="color:#00703C;">
                                <div class="container-fluid" style="padding-top: 10px;">
                                    <div style="padding-left:">
                                        <div id="search-container">
                                            <label for="search">Search by time:</label>
                                            <input type="date" id="search" placeholder="Enter time (YYYY-MM-DD)">
                                            <button id="search-button">Search</button>
                                        </div>
                                        <table id="data-table">
                                            <thead>
                                                <tr>
                                                    <th>Date & Time</th>
                                                    <th>Carbon Monoxide</th>
                                                    <th>Nitrogen Dioxide</th>
                                                    <th>Ground-level Ozone</th>
                                                    <th>Particulate Matter</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Table rows will be dynamically added here -->
                                            </tbody>
                                        </table>
                                        <div id="average-chart-container">
                                            <canvas id="average-chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Download data by specified range -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold" style="color:#00703C;">Download Data</h6>
                        </div>
                        <div>
                            <div id="content" style="color:#00703C;">
                                <div class="container-fluid" style="padding-top: 10px;">
                                    <div style="padding-left:">
                                        <!-- Date Range Search Bar -->
                                        <form id="search-form">
                                            <label for="start-date">Start Date:</label>
                                            <input type="date" name="start-date" id="start-date" required>
                                            
                                            <label for="end-date">End Date:</label>
                                            <input type="date" name="end-date" id="end-date" required>

                                            <button type="button" onclick="searchData()">Search</button>
                                        </form>

                                        <table border="1" id="data-tables">
                                            <thead>
                                                <tr>
                                                    <th>Date & Time</th>
                                                    <th>Carbon monoxide(ppm)</th>
                                                    <th>Nitrogen dioxide(ppm)</th>
                                                    <th>Ground level ozone(ppm)</th>
                                                    <th>Particulate matter (µg/m³)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Include the PHP code for fetching data
                                                include('downloadData.php');
                                                ?>
                                            </tbody>
                                        </table>
                                        <div style="padding-top: 5px; padding-bottom: 10px">
                                            <!-- Download Button -->
                                            <button onclick="downloadData()">Download</button>   
                                        </div>
                                                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <!-- Javascript codes -->
                <script>
                    // Function to search data using AJAX
                    function searchData() {
                        // Get the form data
                        var startDate = document.getElementById('start-date').value;
                        var endDate = document.getElementById('end-date').value;

                        // Create a new XMLHttpRequest object
                        var xhr = new XMLHttpRequest();

                        // Define the request parameters
                        var url = 'downloadData.php'; // Update with the correct endpoint
                        var params = 'start-date=' + startDate + '&end-date=' + endDate;

                        // Configure the request
                        xhr.open('POST', url, true);
                        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

                        // Set up the callback function to handle the response
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState == 4 && xhr.status == 200) {
                                // Update the table body with the new data
                                document.getElementById('data-tables').getElementsByTagName('tbody')[0].innerHTML = xhr.responseText;
                            }
                        };

                        // Send the request
                        xhr.send(params);
                    }


                    // Function to download data as CSV
                    function downloadData() {
                        // Get the last table data
                        var lastTable = document.querySelector('#data-tables'); // Assuming the last table has the ID "data-table"
                        var rows = lastTable.querySelectorAll('tbody tr');

                        // Create a CSV string
                        var csvContent = "data:text/csv;charset=utf-8,";
                        csvContent += "Date & Time,Carbon Monoxide (ppm),Nitrogen Dioxide (ppm),Ground-level Ozone (ppm),Particulate Matter (µg/m³)\n";

                        rows.forEach(function (row) {
                            var cols = row.querySelectorAll('td');
                            var rowData = [];
                            cols.forEach(function (col) {
                                rowData.push(col.innerText);
                            });
                            csvContent += rowData.join(",") + "\n";
                        });

                        // Create a data URI and trigger download
                        var encodedUri = encodeURI(csvContent);
                        var link = document.createElement("a");
                        link.setAttribute("href", encodedUri);
                        link.setAttribute("download", "air_quality_data.csv");
                        document.body.appendChild(link);
                        link.click();
                    }

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

                    function formatDateTime(dateTimeString) {
                        const options = {
                            year: 'numeric',
                            month: 'long',
                            day: '2-digit',
                            hour: '2-digit',
                            minute: '2-digit',
                            hour12: true,
                        };
                        return new Date(dateTimeString).toLocaleString(undefined, options);
                    }


                    // Function to populate the table and calculate daily averages
                    function populateTableAndGraph(data) {
                        const tableBody = document.querySelector('#data-table tbody');
                        const averageData = {};

                        // Clear existing table data
                        tableBody.innerHTML = '';

                        // Initialize arrays to store daily averages
                        const dates = [];
                        const avgCO = [];
                        const avgNO2 = [];
                        const avgOzone = [];
                        const avgPM = [];

                        // Loop through the data
                        data.forEach(item => {
                            const { time, carbon_monoxide, nitrogen_dioxide, ground_level_ozone, particulate_matter } = item;

                            // Extract the date part (YYYY-MM-DD) from the timestamp
                            const date = time.split(' ')[0];

                            // Format the time
                            const formattedTime = formatDateTime(time);

                            // Add a row to the table
                            const row = document.createElement('tr');
                            row.innerHTML = `<td>${formattedTime}</td><td>${carbon_monoxide}</td><td>${nitrogen_dioxide}</td><td>${ground_level_ozone}</td><td>${particulate_matter}</td>`;
                            tableBody.appendChild(row);

                            // Create a date-specific entry in the averageData object
                            if (!averageData[date]) {
                                averageData[date] = {
                                    totalCO: 0,
                                    totalNO2: 0,
                                    totalOzone: 0,
                                    totalPM: 0,
                                    count: 0,
                                };
                            }

                            // Add pollutant values to the corresponding totals
                            averageData[date].totalCO += parseFloat(carbon_monoxide);
                            averageData[date].totalNO2 += parseFloat(nitrogen_dioxide);
                            averageData[date].totalOzone += parseFloat(ground_level_ozone);
                            averageData[date].totalPM += parseFloat(particulate_matter);
                            averageData[date].count++;
                        });

                        // Calculate daily averages and populate the arrays
                        for (const date in averageData) {
                            if (averageData.hasOwnProperty(date)) {
                                const avgCOValue = (averageData[date].totalCO / averageData[date].count).toFixed(2);
                                const avgNO2Value = (averageData[date].totalNO2 / averageData[date].count).toFixed(2);
                                const avgOzoneValue = (averageData[date].totalOzone / averageData[date].count).toFixed(2);
                                const avgPMValue = (averageData[date].totalPM / averageData[date].count).toFixed(2);

                                dates.push(date);
                                avgCO.push(avgCOValue);
                                avgNO2.push(avgNO2Value);
                                avgOzone.push(avgOzoneValue);
                                avgPM.push(avgPMValue);
                            }
                        }

                        // Create a bar chart using Chart.js
                        const ctx = document.getElementById('average-chart').getContext('2d');
                        if (window.myChart) {
                            window.myChart.destroy();
                        }
                        window.myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: dates,
                                datasets: [
                                    {
                                        label: 'Carbon monoxide',
                                        data: avgCO,
                                        backgroundColor: 'rgba(0, 116, 217, 0.7)',
                                    },
                                    {
                                        label: 'Nitrogen dioxide',
                                        data: avgNO2,
                                        backgroundColor: 'rgba(255, 0, 0, 0.7)',
                                    },
                                    {
                                        label: 'Ground level ozone',
                                        data: avgOzone,
                                        backgroundColor: 'rgba(0, 255, 0, 0.7)',
                                    },
                                    {
                                        label: 'Particulate matter',
                                        data: avgPM,
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

    <!-- Start of Modal -->
    <?php include ('../includes/modal.php'); ?>
    <!-- End of Modal -->

    <!-- Start of Bottom -->
    <?php include ('../includes/bottom.php'); ?>
    <!-- End of Bottom -->
    
</body>

</html>