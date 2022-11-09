<?php

session_start();
require "../db.php";

$id = $_POST["id"];
$name = $_POST["name"];
$old_password = $_POST["old_password"];
$new_password = $_POST["new_password"];
$after_hash = password_hash($new_password, PASSWORD_DEFAULT);

if (empty($new_password)) {
    $update_name = "UPDATE users SET name = '$name' ";
    $update_name_res = mysqli_query($db_connection, $update_name);
    header("location: profile.php");
} else {
    $select_user = "SELECT * FROM users WHERE id = '$id' ";
    $select_user_res = mysqli_query($db_connection, $select_user);
    $after_assoc_user = mysqli_fetch_assoc($select_user_res);

    if (password_verify($old_password, $after_assoc_user["password"])) {
        $update_user_info = "UPDATE users SET name = '$name', password = '$after_hash' WHERE id = '$id' ";
        $update_user_info_res = mysqli_query($db_connection, $update_user_info);
        header("location: profile.php");
    } else {
        $_SESSION["invalid"] = "Old Password Does Not Match!";
        header("location: profile.php");
    }
}
