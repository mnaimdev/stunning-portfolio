<?php

session_start();

require "../db.php";

$id = $_GET["id"];

$select = "SELECT * FROM brands WHERE id = '$id' ";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);
$delete_from = "../uploads/brands/" . $after_assoc["image"];
unlink($delete_from);

$delete = "DELETE FROM brands WHERE id = '$id' ";
mysqli_query($db_connection, $delete);
$_SESSION["delete"] = "Deleted Successfully!";
header("location: brand.php");
