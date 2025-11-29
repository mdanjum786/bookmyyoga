<?php
// $mysqli = new mysqli("localhost", "u880311186_inifity_ciy", "Nazre@321");
// if ($mysqli->connect_error) {
//     die("Connection failed: " . $mysqli->connect_error);
// }
// echo "Connected successfully";

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$servername = "localhost";
$username = "u880311186_infinite_yogac";
$password = "Nazre@321";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>