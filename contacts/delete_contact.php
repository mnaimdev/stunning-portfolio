<?php

session_start();

require "../db.php";

$id = $_GET["id"];

$contact_count = "SELECT * FROM contacts";
$count_res = mysqli_query($db_connection, $contact_count);
$row = mysqli_num_rows($count_res);

if ($row > 1) {
    $delete = "DELETE FROM contacts WHERE id = '$id' ";
    mysqli_query($db_connection, $delete);
    $_SESSION["delete"] = "Deleted Successfully!";
    header("location: contact.php");
} else {
    $_SESSION["contact"] = "You must include your contact!";
    header("location: contact.php");
}
