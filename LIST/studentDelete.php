<?php
include '../connection/connection.php';
$sql = "DELETE FROM student WHERE StudentID ='" . $_GET["StudentID"] . "'";
mysqli_query($con,$sql);
header('location =studentlist.php');
?>
