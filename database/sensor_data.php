<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "air_quality";

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Database connection is OK<br>";

if (isset($_POST["carbon_monoxide"]) && isset($_POST["nitrogen_dioxide"]) && isset($_POST["ground_level_ozone"]) && isset($_POST["particulate_matter"]))  {

    $c = $_POST["carbon_monoxide"];
    $n = $_POST["nitrogen_dioxide"];
    $g = $_POST["ground_level_ozone"];
    $p = $_POST["particulate_matter"];

    $sql = "INSERT INTO gasses (carbon_monoxide, nitrogen_dioxide, ground_level_ozone, particulate_matter) VALUES ('$c', '$n', '$g', '$p')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}
?>
