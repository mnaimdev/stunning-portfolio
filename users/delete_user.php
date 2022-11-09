<?php

session_start();

require "../db.php";

$id = $_GET["id"];

$user_count = "SELECT * FROM users";
$count_res = mysqli_query($db_connection, $user_count);
$row = mysqli_num_rows($count_res);

if ($row > 1) {
    // delete image
    $delete_image = "SELECT * FROM users WHERE id = '$id' ";
    $delete_result = mysqli_query($db_connection, $delete_image);
    $after_assoc = mysqli_fetch_assoc($delete_result);
    $delete_from = "../uploads/users/" . $after_assoc["image"];
    unlink($delete_from);

    // delete user
    $delete_user = "DELETE FROM users WHERE id = '$id' ";
    mysqli_query($db_connection, $delete_user);
    $_SESSION["delete"] = "User Deleted Successfully!";
    header("location: users.php");
} else {
    $_SESSION["user"] = "You must keep 1 user";
    header("location: users.php");
}
