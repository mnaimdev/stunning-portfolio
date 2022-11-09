<?php

// session_start();
require "../db.php";

$uploaded_file = $_FILES["banner_image"];
$after_explode = explode(".", $uploaded_file["name"]);
$name = $uploaded_file["name"];

$extension = end($after_explode);
$allowed_extension = array("jpg", "png");

if (in_array($extension, $allowed_extension)) {
    if ($uploaded_file["size"] <= 51200000) {

        $insert = "INSERT INTO banner_image(banner_image)VALUES('$name')";
        mysqli_query($db_connection, $insert);

        $id = mysqli_insert_id($db_connection);
        $file_name = $id . "." . $extension;
        $new_location = "../uploads/banners/" . $file_name;
        move_uploaded_file($uploaded_file["tmp_name"], $new_location);

        $update_img = "UPDATE banner_image SET banner_image = '$file_name' WHERE id = '$id' ";
        mysqli_query($db_connection, $update_img);
        header("location: banner_image.php");
    } else {
        // $SESSION["extension"] = "File size too large! Max size 5 MB";
        header("location: banner_image.php");
    }
} else {
    // $SESSION["extension"] = "Invalid Extension! Allowed Extension (jpg, png)";
    header("location: banner_image.php");
}
