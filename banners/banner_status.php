<?php

require "../db.php";

$id = $_GET['id'];

$update = "UPDATE banners SET status = 0";
mysqli_query($db_connection, $update);

$update_status = "UPDATE banners SET status = 1 WHERE id = $id";
mysqli_query($db_connection, $update_status);
header("location: banner.php");
