<?php
$servername = "localhost";
$username = "u235219407_caressa";
$password = "Caressa@15";
$database = "u235219407_carpool_caress";


$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>