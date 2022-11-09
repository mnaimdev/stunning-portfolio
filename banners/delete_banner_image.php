<?php

session_start();

require "../db.php";

$id = $_GET["id"];

$banner_img = "SELECT * FROM banner_image";
$img_res = mysqli_query($db_connection, $banner_img);
$row = mysqli_num_rows($img_res);

if ($row > 1) {
    $select = "SELECT * FROM banner_image WHERE id = '$id' ";
    $select_res  = mysqli_query($db_connection, $select);
    $after_assoc = mysqli_fetch_assoc($select_res);
    $delete_from = "../uploads/banners/" . $after_assoc["banner_image"];
    unlink($delete_from);

    $delete = "DELETE FROM banner_image WHERE id = '$id' ";
    mysqli_query($db_connection, $delete);
    $_SESSION["delete"] = "Deleted Successfully!";
    header("location: banner_image.php");
} else {
    $_SESSION["banner"] = "You must keep 1 banner image!";
    header("location: banner_image.php");
}
