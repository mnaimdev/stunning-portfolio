<?php

session_start();
require "../db.php";

$id = $_GET['id'];

$edu_count = "SELECT * FROM educations";
$count_res = mysqli_query($db_connection, $edu_count);
$row = mysqli_num_rows($count_res);

if ($row > 2) {
    $delete_edu = "DELETE FROM educations WHERE id = '$id' ";
    mysqli_query($db_connection, $delete_edu);
    $_SESSION["delete"] = "Deleted Successfully!";
    header("location: education.php");
} else {
    $_SESSION["edu"] = "You must include 2 education!";
    header("location: education.php");
}
