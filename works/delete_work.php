<?php

session_start();
require "../db.php";

$id = $_GET['id'];

$select = "SELECT * FROM works WHERE id = '$id' ";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);
$delete_from = "../uploads/works/" . $after_assoc["image"];
unlink($delete_from);


$delete_work = "DELETE FROM works WHERE id = '$id' ";
mysqli_query($db_connection, $delete_work);
$_SESSION["delete"] = "Deleted Successfully!";
header("location: work.php");
