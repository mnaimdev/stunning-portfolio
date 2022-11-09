<?php

require "../db.php";

$sub_title = $_POST["sub_title"];
$title = $_POST["title"];
$desp = $_POST["desp"];

$insert_banner = "INSERT INTO banners(sub_title, title, desp) VALUES('$sub_title', '$title', '$desp')";
mysqli_query($db_connection, $insert_banner);
header("location: banner.php");
