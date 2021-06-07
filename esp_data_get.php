<?php
//Creates new record as per request
    //Connect to database
    $servername = "localhost";
    $dbname = "";
    $username = "";
    $password = "";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }

    if(!empty($_GET['turbid']) && !empty($_GET['ammonia']) && !empty($_GET['pH']) && !empty($_GET['temperature']) && !empty($_GET['oxygen']))
    {
    	$status = $_GET['status'];
    	$station = $_GET['station'];

	    $sql = "INSERT INTO SensorData (turbid, ammonia, pH, temperature, oxygen)
        VALUES ('" . $turbid . "', '" . $ammonia . "', '" . $pH . "', '" . $temperature . "', '" . $oxygen . "')";

		if ($conn->query($sql) === TRUE) {
		    echo "OK";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}


	$conn->close();
?>