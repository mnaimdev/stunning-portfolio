<?php

require "../db.php";
session_start();

$id = $_GET["id"];

$select = "SELECT * FROM socials WHERE id = '$id' ";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);

// active convert to deactive
if ($after_assoc["status"] == 1) {

    $select = "SELECT COUNT(*) as active FROM socials WHERE status = 1";
    $select_res = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($select_res);

    if ($after_assoc["active"] <= 3) {
        $_SESSION["limit"] = "Minimum 3 icon have to active!";
        header("location: social.php");
    } else {
        $update_status = "UPDATE socials SET status = 0 WHERE id = '$id' ";
        mysqli_query($db_connection, $update_status);
        header("location: social.php");
    }
}

// deactive convert to active
else {
    $select = "SELECT COUNT(*) as active FROM socials WHERE status = 1";
    $select_res = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($select_res);

    if ($after_assoc["active"] >= 4) {
        $_SESSION["limit"] = "Maximum 4 icon can be active!";
        header("location: social.php");
    } else {
        $update_status = "UPDATE socials SET status = 1 WHERE id = '$id' ";
        mysqli_query($db_connection, $update_status);
        header("location: social.php");
    }
}
