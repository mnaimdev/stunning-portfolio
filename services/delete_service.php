<?php

session_start();

require "../db.php";

$id = $_GET['id'];

$service_count = "SELECT * FROM services";
$count_res = mysqli_query($db_connection, $service_count);
$row = mysqli_num_rows($count_res);

if ($row > 3) {
    $delete = "DELETE FROM services WHERE id = '$id' ";
    mysqli_query($db_connection, $delete);
    $_SESSION["delete"] = "Service Deleted!";
    header("location: service.php");
} else {
    $_SESSION["service"] = "You must keep 3 services!";
    header("location: service.php");
}
