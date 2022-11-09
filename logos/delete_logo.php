<?php

session_start();

require "../db.php";

$id = $_GET["id"];

$logo_count = "SELECT * FROM logos";
$count_res = mysqli_query($db_connection, $logo_count);
$row = mysqli_num_rows($count_res);

if ($row > 1) {
    $select = "SELECT * FROM logos WHERE id = '$id' ";
    $select_res = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($select_res);
    $delete_from = "../uploads/logos/" . $after_assoc["logo"];
    unlink($delete_from);

    $delete_logo = "DELETE FROM logos WHERE id = '$id' ";
    mysqli_query($db_connection, $delete_logo);
    $_SESSION["delete"] = "Deleted Successfully!";
    header("location: logo.php");
} else {
    $_SESSION["logo"] = "You must keep 1 logo";
    header("location: logo.php");
}
