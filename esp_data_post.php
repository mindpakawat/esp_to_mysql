<?php
/*CREATE TABLE SensorData (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    turbid VARCHAR(30) NOT NULL,
    ammonia VARCHAR(30) NOT NULL,
    pH VARCHAR(10),
    temperature VARCHAR(10),
    oxygen VARCHAR(10),
    reading_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )*/
$servername = "localhost";
// REPLACE with your Database name
$dbname = "";
// REPLACE with Database user
$username = "";
// REPLACE with Database user password
$password = "";

$api_key_value = "0001";
$api_key= $turbid = $ammonia = $pH = $temperature = $oxygen = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $api_key = test_input($_POST["api_key"]);
    if($api_key == $api_key_value) {
        $turbid = test_input($_POST["turbid"]);
        $ammonia = test_input($_POST["ammonia"]);
        $pH = test_input($_POST["pH"]);
        $temperature = test_input($_POST["temperature"]);
        $oxygen = test_input($_POST["oxygen"]);
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO SensorData (turbid, ammonia, pH, temperature, oxygen)
        VALUES ('" . $turbid . "', '" . $ammonia . "', '" . $pH . "', '" . $temperature . "', '" . $oxygen . "')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        }
        else {
            echo "Error: " . $sql . "" . $conn->error;
        }
        $conn->close();
    }
    else {
        echo "Wrong API Key provided.";
    }
}
else {
    echo "No data posted with HTTP POST.";
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
