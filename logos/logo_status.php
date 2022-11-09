<?php

require "../db.php";

$id = $_GET['id'];

$update = "UPDATE logos SET status = 0";
mysqli_query($db_connection, $update);

$update_status = "UPDATE logos SET status = 1 WHERE id = $id";
mysqli_query($db_connection, $update_status);
header("location: logo.php");






// $id = $_GET["id"];


// $update = "UPDATE logos SET status = 0 ";
// mysqli_query($db_connection, $update);

// $update_status = "UPDATE logos SET status = 1 WHERE id = '$id' ";
// mysqli_query($db_connection, $update_status);
// header("location: logo.php");
