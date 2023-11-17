<?php
include('../dbconn.php');

$qry = "delete from issued where date = '".$_GET['time']."';";
mysqli_query($conn, $qry);
header("location: issueReturn.php")
?>