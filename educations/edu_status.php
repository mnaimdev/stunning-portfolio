<?php

session_start();
require "../db.php";

$id = $_GET['id'];

$select = "SELECT * FROM educations WHERE id = '$id' ";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);

if ($after_assoc["status"] == 1) {
    $select = "SELECT COUNT(*) as active FROM educations WHERE status = 1";
    $select_res = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($select_res);

    if ($after_assoc["active"] <= 3) {
        $_SESSION["limit"] = "Mimimum 3 icon have to active!";
        header("location: education.php");
    } else {
        $update_status = "UPDATE educations SET status = 0 WHERE id = '$id' ";
        mysqli_query($db_connection, $update_status);
        header("location: education.php");
    }
} else {
    $select = "SELECT COUNT(*) as active FROM educations WHERE status = 1";
    $select_res = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($select_res);

    if ($after_assoc["active"] >= 4) {
        $_SESSION["limit"] = "Maximum 4 icon can be active!";
        header("location: education.php");
    } else {
        $update_status = "UPDATE educations SET status = 1 WHERE id = '$id' ";
        mysqli_query($db_connection, $update_status);
        header("location: education.php");
    }
}
