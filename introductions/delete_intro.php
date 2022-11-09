<?php

require "../db.php";

session_start();

$id = $_GET["id"];

$intro_count = "SELECT * FROM introductions";
$count_res = mysqli_query($db_connection, $intro_count);
$row = mysqli_num_rows($count_res);

if ($row > 1) {
    $select = "SELECT * FROM introductions WHERE id = '$id' ";
    $select_res = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($select_res);
    $delete_from = "../uploads/introductions/" . $after_assoc["image"];
    unlink($delete_from);

    $delete = "DELETE FROM introductions WHERE id = '$id' ";
    mysqli_query($db_connection, $delete);
    $_SESSION["delete"] = "Deleted Successfully!";
    header("location: intro.php");
} else {
    $_SESSION["intro"] = "You must keep 1 intro!";
    header("location: intro.php");
}
