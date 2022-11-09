<?php

session_start();
require "../db.php";

$id = $_POST["id"];
$uploaded_file = $_FILES["image"];
$after_explode = explode(".", $uploaded_file["name"]);
$extension = end($after_explode);
$allowed_extension = array("jpg", "png", "jpeg", "gif");

if (in_array($extension, $allowed_extension)) {
    if ($uploaded_file["size"] <= 512000) {

        $select_img = "SELECT * FROM users WHERE id = '$id' ";
        $select_img_res = mysqli_query($db_connection, $select_img);
        $after_assoc_img = mysqli_fetch_assoc($select_img_res);
        $delete_from = "../uploads/users/" . $after_assoc_img["image"];
        unlink($delete_from);

        $file_name = $id . "." . $extension;
        $new_location = "../uploads/users/" . $file_name;
        move_uploaded_file($uploaded_file["tmp_name"], $new_location);

        $update_img = "UPDATE users SET image = '$file_name' ";
        $update_img_res = mysqli_query($db_connection, $update_img);
        header("location: profile.php");
    } else {
        $_SESSION["extension"] = "File size too large! Max size 512 KB";
        header("location: profile.php");
    }
} else {
    $_SESSION["extension"] = "Invalid Extension! Allowed Extension (jpg, jpeg, png, gif)";
    header("location: profile.php");
}
