<?php

session_start();

require "../db.php";

$id = $_GET["id"];

$delete = "DELETE FROM counts WHERE id = '$id' ";
mysqli_query($db_connection, $delete);
$_SESSION["delete"] = "Deleted Successfully!";
header("location: count.php");
