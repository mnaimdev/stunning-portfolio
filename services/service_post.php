<?php

require "../db.php";

$icon = $_POST["icon"];
$title = $_POST["title"];
$desp = $_POST["desp"];

$insert = "INSERT INTO services(title, desp, icon)VALUES('$title', '$desp', '$icon')";
$insert_res = mysqli_query($db_connection, $insert);
header("location: service.php");
