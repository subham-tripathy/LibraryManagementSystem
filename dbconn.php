<?php
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "subham1010";
$db = "lms";


$conn = mysqli_connect($dbservername, $dbusername, $dbpassword, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>