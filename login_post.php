<?php

session_start();
require "db.php";

$email = $_POST["email"];
$password = $_POST["password"];

$select_user = "SELECT COUNT(*) as exist FROM users WHERE email = '$email' ";
$select_user_result = mysqli_query($db_connection, $select_user);
$after_assoc = mysqli_fetch_assoc($select_user_result);

if ($after_assoc["exist"] == 1) {
    $user_password = "SELECT * FROM users WHERE email = '$email' ";
    $user_password_res = mysqli_query($db_connection, $user_password);
    $after_assoc_pass = mysqli_fetch_assoc($user_password_res);

    if (password_verify($password, $after_assoc_pass["password"])) {
        $_SESSION["login"] = "Successfully Logged In";
        $_SESSION["id"] = $after_assoc_pass["id"];
        $_SESSION["title"] = "Web Developer";
        header("location: dashboard.php");
    } else {
        $_SESSION["invalid"] = "Incorrect Password!";
        header("location: login.php");
    }
} else {
    $_SESSION["invalid"] = "Email Does Not Exist!";
    header("location: login.php");
}
