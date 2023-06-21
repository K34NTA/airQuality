<?php
// Establish a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "air_quality";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the database
$sql = "SELECT time, carbon_monoxide, nitrogen_dioxide, ground_level_ozone, particulate_matter FROM gasses";
$result = $conn->query($sql);

// Process the retrieved data and format it for the chart
$labels = [];
$co_data = [];
$no2_data = [];
$ozone_data = [];
$particulate_data = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row["time"];
        $co_data[] = $row["carbon_monoxide"];
        $no2_data[] = $row["nitrogen_dioxide"];
        $ozone_data[] = $row["ground_level_ozone"];
        $particulate_data[] = $row["particulate_matter"];
    }
}

// Close the database connection
$conn->close();

// Construct the chart data using the retrieved data
$dataLine = [
    "type" => "line",
    "data" => [
        "labels" => $labels,
        "datasets" => [
            [
                "label" => "Carbon Monoxide (PPM)",
                "data" => $co_data,
                "backgroundColor" => "rgba(255, 99, 71, 0.2)",
                "fill" => true,
                "borderColor" => "rgba(255, 99, 132, 0.8)",
                "borderWidth" => 2,
                "tension" => 0.4
            ],
            [
                "label" => "Nitrogen Dioxide (PPM)",
                "data" => $no2_data,
                "backgroundColor" => "rgba(114, 255, 0, 0.2)",
                "fill" => true,
                "borderColor" => "rgba(114, 255, 0, 1)",
                "borderWidth" => 2,
                "tension" => 0.4
            ],
            [
                "label" => "Ground-level Ozone (PPM)",
                "data" => $ozone_data,
                "backgroundColor" => "rgba(0, 137, 132, .2)",
                "fill" => true,
                "borderColor" => "rgba(50, 150, 255, 1)",
                "borderWidth" => 2,
                "tension" => 0.4
            ],
            [
                "label" => "Particulate Matter (µg/Nm3)",
                "data" => $particulate_data,
                "backgroundColor" => "rgba(139, 136, 181, .2)",
                "fill" => true,
                "borderColor" => "rgba(139, 136, 181, 1)",
                "borderWidth" => 2,
                "tension" => 0.4
            ]
        ]
    ],
    "options" => [
        "responsive" => true
    ]
];

// Encode the chart data as JSON
$dataLineJson = json_encode($dataLine);
?>
