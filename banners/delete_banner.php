<?php

session_start();

require "../db.php";

$id = $_GET["id"];

$banner_count = "SELECT * FROM banners";
$count_res = mysqli_query($db_connection, $banner_count);
$row = mysqli_num_rows($count_res);

if ($row > 1) {
    $delete_banner = "DELETE FROM banners WHERE id = '$id' ";
    mysqli_query($db_connection, $delete_banner);
    $_SESSION["delete"] = "Deleted Successfully!";
    header("location: banner.php");
} else {
    $_SESSION["banner"] = "You must keep 1 banner content!";
    header("location: banner.php");
}
