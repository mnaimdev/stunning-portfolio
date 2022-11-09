<?php

require "../db.php";

session_start();

$title = $_POST["title"];
$desp = $_POST["desp"];

$uploaded_file = $_FILES["image"];
$after_explode = explode(".", $uploaded_file["name"]);
$name = $uploaded_file["name"];
$extension = end($after_explode);
$allowed_extension = array("jpg", "png", "jpeg");

if (in_array($extension, $allowed_extension)) {
    if ($uploaded_file["size"] <= 1024000) {

        $insert = "INSERT INTO introductions(title, desp, image)VALUES('$title', '$desp', '$name')";
        mysqli_query($db_connection, $insert);

        $id = mysqli_insert_id($db_connection);
        $file_name = $id . "." . $extension;
        $new_location = "../uploads/introductions/" . $file_name;
        move_uploaded_file(
            $uploaded_file["tmp_name"],
            $new_location
        );

        $update = "UPDATE introductions SET image = '$file_name' WHERE id = '$id' ";
        mysqli_query($db_connection, $update);
        header("location: intro.php");
    } else {
        $_SESSION["extension"] = "File size too large! Max size 1 MB";
        header("location: intro.php");
    }
} else {
    $_SESSION["extension"] = "Invalid Extension! Allowed 'jpg', 'jpeg', 'png' ";
    header("location: intro.php");
}
