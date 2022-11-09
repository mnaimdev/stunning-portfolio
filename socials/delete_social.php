<?php

session_start();

require "../db.php";

$id = $_GET["id"];

$social_count = "SELECT * FROM socials";
$count_res = mysqli_query($db_connection, $social_count);
$row = mysqli_num_rows($count_res);

if ($row > 3) {
    $delete_social = "DELETE FROM socials WHERE id = '$id' ";
    mysqli_query($db_connection, $delete_social);
    $_SESSION["delete"] = "Deleted Successfully!";
    header("location: social.php");
} else {
    $_SESSION["social"] = "You must keep 3 social icons!";
    header("location: social.php");
}
