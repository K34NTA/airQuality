<!DOCTYPE html>
<html lang="en">

<head>
    <?php include ('../includes/header.php'); ?>
    <!-- Include necessary libraries and CSS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div>
        <canvas id="line-chart"></canvas>
    </div>

    <script>
    // Declare the chart variable outside the updateChartData function
    var chart;

    // Function to fetch updated chart data using AJAX
    function updateChartData() {
        $.ajax({
            url: 'ajax.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                // Process the retrieved data
                var labels = data.map(function (item) {
                    return item.time;
                });

                var coData = data.map(function (item) {
                    return item.carbon_monoxide;
                });

                var no2Data = data.map(function (item) {
                    return item.nitrogen_dioxide;
                });

                var ozoneData = data.map(function (item) {
                    return item.ground_level_ozone;
                });

                var particulateData = data.map(function (item) {
                    return item.particulate_matter;
                });

                // Destroy the previous chart if it exists
                if (chart) {
                    chart.destroy();
                }

                // Create a new chart
                chart = new Chart(document.getElementById('line-chart'), {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [
                            {
                                label: 'Carbon Monoxide (PPM)',
                                data: coData,
                                backgroundColor: 'rgba(255, 99, 71, 0.2)',
                                fill: true,
                                borderColor: 'rgba(255, 99, 132, 0.8)',
                                borderWidth: 2,
                                tension: 0.4
                            },
                            {
                                label: 'Nitrogen Dioxide (PPM)',
                                data: no2Data,
                                backgroundColor: 'rgba(114, 255, 0, 0.2)',
                                fill: true,
                                borderColor: 'rgba(114, 255, 0, 1)',
                                borderWidth: 2,
                                tension: 0.4
                            },
                            {
                                label: 'Ground-level Ozone (PPM)',
                                data: ozoneData,
                                backgroundColor: 'rgba(0, 137, 132, .2)',
                                fill: true,
                                borderColor: 'rgba(50, 150, 255, 1)',
                                borderWidth: 2,
                                tension: 0.4
                            },
                            {
                                label: 'Particulate Matter (µg/Nm3)',
                                data: particulateData,
                                backgroundColor: 'rgba(139, 136, 181, .2)',
                                fill: true,
                                borderColor: 'rgba(139, 136, 181, 1)',
                                borderWidth: 2,
                                tension: 0.4
                            }
                        ]
                    },
                    options: {
                        responsive: true
                    }
                });
            }
        });
    }

    // Update the chart initially
    updateChartData();

    // Update the chart every 5 seconds
    setInterval(updateChartData, 3000);
</script>

</body>

</html>
