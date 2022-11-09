<?php

session_start();

require "../db.php";

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $insert = "INSERT INTO messages(name, email, message) VALUES('$name', '$email', '$message')";
    mysqli_query($db_connection, $insert);
    $_SESSION["success"] = "Message Sent!";
    header("location: ../index.php#contact");
} else {
    $_SESSION["invalid"] = "Enter a valid email!";
    header("location: ../index.php#contact");
}
