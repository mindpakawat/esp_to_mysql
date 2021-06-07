<!DOCTYPE html>
<html>

<body>
    <?php



    $servername = "sql207.ezyro.com";
    // REPLACE with your Database name
    $dbname = "";
    // REPLACE with Database user
    $username = "";
    // REPLACE with Database user password
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, turbid, ammonia, pH, temperature, oxygen, reading_time FROM SensorData ORDER BY id DESC";

    echo '<table cellspacing="5" cellpadding="5">
<tr>
<td>ID</td>
<td>turbid</td>
<td>ammonia</td>
<td>pH</td>
<td>temperature</td>
<td>oxygen</td>
<td>Timestamp</td>
</tr>';

    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $row_id = $row["id"];
            $row_turbid = $row["turbid"];
            $row_ammonia = $row["ammonia"];
            $row_pH = $row["pH"];
            $row_temperature = $row["temperature"];
            $row_oxygen = $row["oxygen"];
            $row_reading_time = $row["reading_time"];


            echo '<tr>
<td>' . $row_id . '</td>
<td>' . $row_turbid . '</td>
<td>' . $row_ammonia . '</td>
<td>' . $row_pH . '</td>
<td>' . $row_temperature . '</td>
<td>' . $row_oxygen . '</td>
<td>' . $row_reading_time . '</td>
</tr>';
        }
        $result->free();
    }

    $conn->close();
    ?>
    </table>
</body>

</html>