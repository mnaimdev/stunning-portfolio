<?php

require "../db.php";

$id = $_GET["id"];

$update = "UPDATE banner_image SET status = 0";
mysqli_query($db_connection, $update);

$update_status = "UPDATE banner_image SET status = 1 WHERE id = '$id' ";
mysqli_query($db_connection, $update_status);
header("location:banner_image.php");
