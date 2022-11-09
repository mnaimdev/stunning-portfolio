<?php

session_start();

require '../session_check.php';
require '../db.php';
require '../dashboard_parts/header.php';

$id = $_SESSION['id'];
$user = "SELECT * FROM users WHERE id = '$id' ";
$user_res = mysqli_query($db_connection, $user);
$after_assoc_user = mysqli_fetch_assoc($user_res);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        .card {
            height: auto !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-primary text-center">Update Info</h2>
                    </div>
                    <div class="card-body">
                        <form action="profile_info_update.php" method="POST">
                            <div>
                                <label class="form-label mt-2 mb-2">Username</label>
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <input type="text" name="name" class="form-control" value="<?= $after_assoc_user["name"] ?>">
                            </div>
                            <div>
                                <label class="form-label mt-2 mb-2">Old Password</label>
                                <input type="password" name="old_password" class="form-control">

                            </div>
                            <div>
                                <label class="form-label mt-2 mb-2">New Password</label>
                                <input type="password" name="new_password" class="form-control">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-primary text-center">Update Image</h2>
                    </div>
                    <div class="card-body">
                        <form action="profile_img_update.php" method="POST" enctype="multipart/form-data">
                            <div>
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <input type="file" name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                <br>
                                <img src="/stunning portfolio/uploads/users/<?= $after_assoc_user["image"] ?>" id="blah" width="200">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<!-- Sweet Alert Link -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<?php if (isset($_SESSION["extension"])) { ?>
    <script>
        Swal.fire(
            "Error",
            "<?= $_SESSION["extension"] ?>",
            "error"
        )
    </script>
<?php }
unset($_SESSION["extension"]) ?>

<?php if (isset($_SESSION["invalid"])) { ?>
    <script>
        Swal.fire(
            "Error",
            "<?= $_SESSION["invalid"] ?>",
            "error"
        )
    </script>
<?php }
unset($_SESSION["invalid"]) ?>

<?php

require "../dashboard_parts/footer.php";
?>