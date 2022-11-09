<?php

session_start();

?>


<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Gymove - Fitness Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/stunning portfolio/dashboard_asset/images/favicon.png">
    <link href="/stunning portfolio/dashboard_asset/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <style>
        .pass-field {
            position: relative;
        }

        .authincation {
            height: 50vh;
        }

        .icon {
            position: absolute;
            top: 28px;
            right: 0;
            width: 40px;
            height: 41px;
            line-height: 40px;
            text-align: center;
            border-radius: 2px;
            cursor: pointer;
            color: white;
            background-color: #1a379d;
            border-radius: -1.25rem;
        }
    </style>

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">

                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="index.html"><img src="/stunning portfolio/dashboard_asset/images/logo-full.png" alt=""></a>
                                    </div>
                                    <h4 class="text-center mb-2 text-white">Sign up your account</h4>
                                    <form action="register_post.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Name</strong></label>
                                            <input type="text" class="form-control" placeholder="username" name="name" value="<?= isset($_SESSION["nam_val"]) ? $_SESSION["nam_val"] : "" ?>">
                                            <?php if (isset($_SESSION["nam_err"])) { ?>
                                                <strong class="text-danger"><?= $_SESSION["nam_err"] ?></strong>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong></label>
                                            <input type="email" class="form-control" placeholder="hello@example.com" name="email" value="<?= isset($_SESSION["eml_val"]) ? $_SESSION["eml_val"] : "" ?>">
                                            <?php if (isset($_SESSION["eml_err"])) { ?>
                                                <strong class="text-danger"><?= $_SESSION["eml_err"] ?></strong>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group pass-field">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" id="pass">
                                            <i class="fa fa-eye icon" onclick="showPassword()"></i>
                                            <?php if (isset($_SESSION["pass_err"])) { ?>
                                                <strong class="text-danger"><?= $_SESSION["pass_err"] ?></strong>
                                            <?php } ?>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Image</strong></label>
                                            <input type="file" class="form-control" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                            <div class="my-2">
                                                <img src="" width="200" id="blah" alt="">
                                            </div>
                                        </div>
                                        <div class="text-center mt-2">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Already have an account? <a class="text-white" href="login.php">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

    unset($_SESSION["nam_err"]);
    unset($_SESSION["eml_err"]);
    unset($_SESSION["pass_err"]);
    unset($_SESSION["nam_val"]);
    unset($_SESSION["eml_val"]);

    ?>

    <!--**********************************
	Scripts
***********************************-->
    <!-- Required vendors -->
    <script src="/stunning portfolio/dashboard_asset/vendor/global/global.min.js"></script>
    <script src="/stunning portfolio/dashboard_asset/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="/stunning portfolio/dashboard_asset/js/custom.min.js"></script>
    <script src="/stunning portfolio/dashboard_asset/js/deznav-init.js"></script>
    <!-- Sweet Alert Link -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function showPassword() {
            const password = document.getElementById("pass");
            if (password.type == "password") {
                password.type = "text";
            } else {
                password.type = "password";
            }
        }
    </script>



    <!-- js cdn -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php if (isset($_SESSION["success"])) { ?>
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '<?= $_SESSION["success"] ?>'
            })
        </script>
    <?php }
    unset($_SESSION["success"]) ?>


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


    <?php if (isset($_SESSION["exist"])) { ?>
        <script>
            Swal.fire(
                "Error",
                "<?= $_SESSION["exist"] ?>",
                "error"
            )
        </script>
    <?php }
    unset($_SESSION["exist"]) ?>

</body>

</html>