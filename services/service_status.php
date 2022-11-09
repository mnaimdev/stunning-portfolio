<?php

require "../db.php";
session_start();

$id = $_GET["id"];

$select = "SELECT * FROM services WHERE id = '$id' ";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);

// active convert to deactive
if ($after_assoc["status"] == 1) {

    $select = "SELECT COUNT(*) as active FROM services WHERE status = 1";
    $select_res = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($select_res);

    if ($after_assoc["active"] <= 3) {
        $_SESSION["limit"] = "Minimum 3 services have to active!";
        header("location: service.php");
    } else {
        $update_status = "UPDATE services SET status = 0 WHERE id = '$id' ";
        mysqli_query($db_connection, $update_status);
        header("location: service.php");
    }
}

// deactive convert to active
else {
    $select = "SELECT COUNT(*) as active FROM services WHERE status = 1";
    $select_res = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($select_res);

    if ($after_assoc["active"] >= 6) {
        $_SESSION["limit"] = "Maximum 6 icon can be active!";
        header("location: service.php");
    } else {
        $update_status = "UPDATE services SET status = 1 WHERE id = '$id' ";
        mysqli_query($db_connection, $update_status);
        header("location: service.php");
    }
}
