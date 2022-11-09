<?php

require "../db.php";

$location = $_POST["location"];
$address = $_POST["address"];
$phone = $_POST["phone"];
$email = $_POST["email"];

$insert = "INSERT INTO contacts(location, address, phone, email)VALUES('$location', '$address', '$phone', '$email')";
mysqli_query($db_connection, $insert);
header("location: contact.php");
