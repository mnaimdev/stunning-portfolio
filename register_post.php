<?php

session_start();

require "db.php";

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$after_hash = password_hash($password, PASSWORD_DEFAULT);

$flag = true;

$upper = preg_match('@[A-Z]@', $password);
$lower = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$spsl = preg_match('@[$, &, * ,#]@', $password);

$uploaded_file = $_FILES["image"];
$after_explode = explode(".", $uploaded_file["name"]);
$extension = end($after_explode);

$image_name = rand(10000, 30000);


$allowed_extension = array("jpg", "png", "gif", "jpeg");



// check if name is empty
if (empty($name)) {
    $_SESSION["nam_err"] = "Please enter your name";
    $flag = false;
}

// check if email is empty
if (empty($email)) {
    $_SESSION["eml_err"] = "Please enter your email";
    $flag = false;
} else {
    // check if email contain valid format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION["eml_err"] = "Please enter valid email";
        $flag = false;
    }
}

// check if password is empty
if (empty($password)) {
    $_SESSION["pass_err"] = "Please enter your password";
    $flag = false;
} else {
    // check if password is valid
    if (!$upper || !$lower || !$number || !$spsl || strlen($password) < 8) {
        $_SESSION['pass_err'] = 'Password contain 1 UpperCase, 1 Lowercase. 1 number and 1 Symbol & min 8 char';
        $flag = false;
    }
}


// check if flag is true
if ($flag) {

    $user_count = "SELECT COUNT(*) as exist FROM users WHERE email = '$email' ";
    $user_count_res = mysqli_query($db_connection, $user_count);
    $after_assoc = mysqli_fetch_assoc($user_count_res);

    if ($after_assoc["exist"] == 1) {
        $_SESSION["exist"] = "Email has already exist!";
        header("location: register.php");
    } else {
        if (in_array($extension, $allowed_extension)) {
            if ($uploaded_file["size"] <= 1024000) {
                $insert = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$after_hash')";
                mysqli_query($db_connection, $insert);

                $user_id = mysqli_insert_id($db_connection);
                $file_name = $user_id . "." . $extension;
                $new_location = "uploads/users/" . $file_name;
                move_uploaded_file($uploaded_file["tmp_name"], $new_location);

                $update = "UPDATE users SET image = '$file_name' WHERE id = $user_id";
                mysqli_query($db_connection, $update);

                $_SESSION["success"] = "Registered Successfully!";
                header("location: login.php");
            } else {
                $_SESSION["extension"] = "File size too large! Maximum size 512 KB";
                header("location: register.php");
            }
        } else {
            $_SESSION["extension"] = "Invalid Extension! Allowed Extensions ('jpg', 'jpeg', 'png', 'gif')";
            header("location: register.php");
        }
    }


    // flag end
} else {
    // check if flag is false
    $_SESSION["nam_val"] = $name;
    $_SESSION["eml_val"] = $email;
    header("location: register.php");
}
