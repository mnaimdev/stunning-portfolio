<?php

require "../db.php";

$uploaded_file = $_FILES["image"];
$after_explode = explode(".", $uploaded_file["name"]);
$name = $uploaded_file["name"];
$extension = end($after_explode);
$allowed_extension = array("jpg", "png");

if (in_array($extension, $allowed_extension)) {

    $insert = "INSERT INTO brands(image)VALUES('$name')";
    mysqli_query($db_connection, $insert);

    $id = mysqli_insert_id($db_connection);
    $file_name = $id . "." . $extension;
    $new_location = "../uploads/brands/" . $file_name;
    move_uploaded_file($uploaded_file["tmp_name"], $new_location);

    $update = "UPDATE brands SET image = '$file_name' WHERE id = '$id' ";
    mysqli_query($db_connection, $update);
    header("location: brand.php");
} else {
    $_SESSION["extension"] = "Invalid Extension! Allowed 'jpg', 'png' ";
    header("location: brand.php");
}
