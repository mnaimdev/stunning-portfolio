<?php

require "../db.php";

$name = $_POST["icon"];
$link = $_POST["link"];

$insert = "INSERT INTO socials(icon, link)VALUES('$name', '$link')";
$insert_res = mysqli_query($db_connection, $insert);
header("location: social.php");
