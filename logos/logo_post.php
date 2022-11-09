<?php

session_start();
require "../db.php";

$uploaded_file = $_FILES["logo"];
$after_explode = explode(".", $uploaded_file["name"]);
$extension = end($after_explode);
$allowed_extension = array("jpg", "png");
$name = $uploaded_file["name"];

if (in_array($extension, $allowed_extension)) {
    if ($uploaded_file["size"] <= 512000) {

        $insert = "INSERT INTO logos(logo)VALUES('$name')";
        mysqli_query($db_connection, $insert);

        $id = mysqli_insert_id($db_connection);
        $file_name = $id . "." . $extension;
        $new_location = "../uploads/logos/" . $file_name;
        move_uploaded_file($uploaded_file["tmp_name"], $new_location);

        $update = "UPDATE logos SET logo = '$file_name' WHERE id= '$id' ";
        mysqli_query($db_connection, $update);
        header('location:logo.php');
    } else {
        $_SESSION["extension"] = "File size too large! Max size 512 KB";
        header("location: logo.php");
    }
} else {
    $_SESSION["extension"] = "Invalid Extension! Allowed Extension (jpg, jpeg, png, gif) ";
    header("location: logo.php");
}
