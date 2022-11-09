<?php

require "../db.php";

$id = $_GET['id'];

$update = "UPDATE introductions SET status = 0";
mysqli_query($db_connection, $update);

$update_status = "UPDATE introductions SET status = 1 WHERE id = '$id' ";
mysqli_query($db_connection, $update_status);
header("location: intro.php");

// $select = "SELECT * FROM introductions WHERE id = '$id' ";
// $select_res = mysqli_query($db_connection, $select);
// $after_assoc = mysqli_fetch_assoc($select_res);

// if ($after_assoc["status"] == 1) {
//     $update_status = "UPDATE introductions SET status = 0 WHERE id = '$id' ";
//     mysqli_query($db_connection, $update_status);
//     header("location: intro.php");
// } else {
//     $update_status = "UPDATE introductions SET status = 1 WHERE id = '$id' ";
//     mysqli_query($db_connection, $update_status);
//     header("location: intro.php");
// }
