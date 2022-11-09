<?php 

require "../db.php";

$title = $_POST["title"];
$year = $_POST["year"];
$percentage = $_POST["percentage"];

$insert = "INSERT INTO educations(title, year, percentage)VALUES('$title', '$year', '$percentage')";
mysqli_query($db_connection, $insert);
header("location: education.php");
