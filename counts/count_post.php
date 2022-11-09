<?php

session_start();
require "../db.php";

$icon = $_POST["icon"];
$count = $_POST["count"];
$info = $_POST["info"];

$insert = "INSERT INTO counts(icon, count, info)VALUES('$icon', '$count', '$info')";
mysqli_query($db_connection, $insert);
header("location: count.php");
