<?php

session_start();
require "../db.php";

$review = $_POST["review"];
$name = $_POST["name"];
$designation = $_POST["designation"];

$uploaded_file = $_FILES["image"];
$after_explode = explode(".", $uploaded_file["name"]);
$extension = end($after_explode);
$allowed_extension = array("jpg", "png");

if (in_array($extension, $allowed_extension)) {

    $insert = "INSERT INTO testimonials(review, name, designation)VALUES('$review', '$name', '$designation')";
    mysqli_query($db_connection, $insert);

    $id = mysqli_insert_id($db_connection);
    $file_name = $id . "." . $extension;
    $new_location = "../uploads/testimonials/" . $file_name;
    move_uploaded_file($uploaded_file["tmp_name"], $new_location);

    $update = "UPDATE testimonials SET image = '$file_name' WHERE id= '$id' ";
    mysqli_query($db_connection, $update);
    header('location:testimonial.php');
} else {
    $_SESSION["extension"] = "Invalid Extension! Allowed Extension (jpg, jpeg, png, gif) ";
    header("location: testimonial.php");
}
