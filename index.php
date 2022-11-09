<?php

session_start();

require "db.php";

// logo
$select = "SELECT * FROM logos WHERE status = 1 ";
$select_res = mysqli_query($db_connection, $select);
$after_assoc = mysqli_fetch_assoc($select_res);

// banner content
$select = "SELECT * FROM banners WHERE status = 1 ";
$select_banner = mysqli_query($db_connection, $select);
$after_assoc_banner = mysqli_fetch_assoc($select_banner);

// banner image
$select = "SELECT * FROM banner_image WHERE status = 1";
$select_banner_img = mysqli_query($db_connection, $select);
$after_assoc_banner_img = mysqli_fetch_assoc($select_banner_img);

// social icon
$select = "SELECT * FROM socials WHERE status = 1 ";
$select_social_icon = mysqli_query($db_connection, $select);

// education
$select = "SELECT * FROM educations WHERE status = 1";
$select_edu = mysqli_query($db_connection, $select);

// introduction
$select = "SELECT * FROM introductions WHERE status = 1";
$select_intro = mysqli_query($db_connection, $select);
$after_assoc_intro = mysqli_fetch_assoc($select_intro);

// service
$select = "SELECT * FROM services WHERE status = 1";
$select_service = mysqli_query($db_connection, $select);

// work
$select = "SELECT * FROM works";
$select_work = mysqli_query($db_connection, $select);

// count
$select = "SELECT * FROM counts";
$select_count = mysqli_query($db_connection, $select);

// testimonial
$select = "SELECT * FROM testimonials";
$select_testimonial = mysqli_query($db_connection, $select);

// contact
$select = "SELECT * FROM contacts WHERE status = 1";
$select_contact = mysqli_query($db_connection, $select);
$after_assoc_contact = mysqli_fetch_assoc($select_contact);

// brand
$select = "SELECT * FROM brands";
$select_brand = mysqli_query($db_connection, $select);

?>


<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:27:43 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kufa - Personal Portfolio HTML5 Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- font awesome 4.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body class="theme-bg">

    <!-- preloader -->
    <div id="preloader">
        <div id="loading-center">
            <div id="loading-center-absolute">
                <div class="object" id="object_one"></div>
                <div class="object" id="object_two"></div>
                <div class="object" id="object_three"></div>
            </div>
        </div>
    </div>
    <!-- preloader-end -->

    <!-- header-start -->
    <header>
        <div id="header-sticky" class="transparent-header">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="main-menu">
                            <nav class="navbar navbar-expand-lg">
                                <a href="#" class="navbar-brand logo-sticky-none">
                                    <img src="./uploads/logos/<?= $after_assoc["logo"] ?>" alt="Logo">
                                </a>
                                <a href="#" class="navbar-brand s-logo-none">
                                    <img src="./uploads/logos/<?= $after_assoc["logo"] ?>" alt="">
                                </a>
                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
                                    <span class="navbar-icon"></span>
                                    <span class="navbar-icon"></span>
                                    <span class="navbar-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav ml-auto">
                                        <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#service">service</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#portfolio">portfolio</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                    </ul>
                                </div>
                                <div class="header-btn">
                                    <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- offcanvas-start -->
        <div class="extra-info">
            <div class="close-icon menu-close">
                <button>
                    <i class="far fa-window-close"></i>
                </button>
            </div>
            <div class="logo-side mb-30">
                <a href="index-2.html">
                    <img src="img/logo/logo.png" alt="" />
                </a>
            </div>
            <div class="side-info mb-30">
                <div class="contact-list mb-30">
                    <h4>Office Address</h4>
                    <p><?= $after_assoc_contact["location"] ?></p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Phone Number</h4>
                    <p><?= $after_assoc_contact["phone"] ?></p>
                </div>
                <div class="contact-list mb-30">
                    <h4>Email Address</h4>
                    <p><?= $after_assoc_contact["email"] ?></p>
                </div>
            </div>

            <div class="social-icon-right mt-20">
                <?php foreach ($select_social_icon as $icon) { ?>
                    <a target="_blank" href="<?= $icon["link"] ?>"><i style="font-family: fontawesome" class="<?= $icon["icon"] ?>"></i></a>
                <?php } ?>
            </div>

        </div>
        <div class="offcanvas-overly"></div>
        <!-- offcanvas-end -->
    </header>
    <!-- header-end -->

    <!-- main-area -->
    <main>

        <!-- banner-area -->
        <section id="home" class="banner-area banner-bg fix">
            <div class="container">
                <div class="row align-items-center  mb-5">
                    <div class="col-xl-7 col-lg-6">
                        <div class="banner-content">
                            <h6 class="wow fadeInUp" data-wow-delay="0.2s"><?= $after_assoc_banner["sub_title"] ?></h6>
                            <h2 class="wow fadeInUp" data-wow-delay="0.4s"><?= $after_assoc_banner["title"] ?></h2>

                            <p class="wow fadeInUp" data-wow-delay="0.6s"><?= $after_assoc_banner["desp"] ?></p>
                            <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                <ul>
                                    <?php foreach ($select_social_icon as $icon) { ?>

                                        <li>
                                            <a href="<?= $icon["link"] ?>" target="_blank">
                                                <i style="font-family: fontawesome; font-size: 20px" class="<?= $icon["icon"] ?> fab"></i>
                                            </a>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <a href="#" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                        <div class="banner-img text-right">
                            <img width="400" height="800" src="uploads/banners/<?= $after_assoc_banner_img["banner_image"] ?>" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="banner-shape"><img src="img/shape/dot_circle.png" class="rotateme" alt="img"></div>
        </section>
        <!-- banner-area-end -->

        <!-- about-area-->
        <section id="about" class="about-area primary-bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-img">
                            <img width="300" src="uploads/introductions/<?= $after_assoc_intro["image"] ?>" title="me-01" alt="me-01">
                        </div>
                    </div>
                    <div class="col-lg-6 pr-90">
                        <div class="section-title mb-25">
                            <span>Introduction</span>
                            <h2><?= $after_assoc_intro["title"] ?></h2>
                        </div>
                        <div class="about-content">
                            <p><?= $after_assoc_intro["desp"] ?></p>
                            <h3>Education:</h3>
                        </div>
                        <!-- Education Item -->
                        <?php foreach ($select_edu as $edu) { ?>
                            <div class="education">
                                <div class="year"><?= $edu["year"] ?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span><?= $edu["title"] ?></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?= $edu["percentage"] ?>%;" aria-valuenow="<?= $edu["percentage"] ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </section>
        <!-- about-area-end -->

        <!-- Services-area -->
        <section id="service" class="services-area pt-120 pb-50">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>WHAT WE DO</span>
                            <h2>Services and Solutions</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($select_service as $service) { ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                <i style="font-family: fontawesome" class="<?= $service["icon"] ?>"></i>
                                <h3><?= $service["title"] ?></h3>
                                <p>
                                    <?= $service["desp"] ?>
                                </p>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
            </div>
        </section>
        <!-- Services-area-end -->

        <!-- Portfolios-area -->
        <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>Portfolio Showcase</span>
                            <h2>My Recent Best Works</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($select_work as $work) { ?>
                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">
                                <div class="speaker-thumb">
                                    <img height="300" src="uploads/works/<?= $work["image"] ?>" alt="img">
                                </div>
                                <div class="speaker-overlay">
                                    <span><?= $work["category"] ?></span>
                                    <h4><?= $work["sub_title"] ?></a></h4>
                                    <a href="work_details.php?id= <?= $work["id"] ?>" class="arrow-btn">More information <span></span></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <!-- services-area-end -->


        <!-- fact-area -->
        <section class="fact-area">
            <div class="container">
                <div class="fact-wrap">
                    <div class="row justify-content-between">
                        <?php foreach ($select_count as $count) { ?>
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i style="font-family: fontawesome" class="<?= $count["icon"] ?>"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count"><?= $count["count"] ?></span></h2>
                                        <span><?= $count["info"] ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- fact-area-end -->

        <!-- testimonial-area -->
        <section class="testimonial-area primary-bg pt-115 pb-115">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8">
                        <div class="section-title text-center mb-70">
                            <span>testimonial</span>
                            <h2>happy customer quotes</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-xl-9 col-lg-10">
                        <div class="testimonial-active">
                            <?php foreach ($select_testimonial as $test) { ?>
                                <div class="single-testimonial text-center">
                                    <div class="testi-avatar">
                                        <img style="border-radius: 100%" width="100" height="100" src="uploads/testimonials/<?= $test["image"] ?>" alt="img">
                                    </div>
                                    <div class="testi-content">
                                        <h4><span>“</span><?= $test["review"] ?><span>”</span></h4>
                                        <div class="testi-avatar-info">
                                            <h5><?= $test["name"] ?></h5>
                                            <span><?= $test["designation"] ?></span>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial-area-end -->

        <!-- brand-area -->
        <div class="barnd-area pt-100 pb-100">
            <div class="container">
                <div class="row brand-active">
                    <?php foreach ($select_brand as $brand) { ?>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <img style="margin: 10px" width="200" src="uploads/brands/<?= $brand["image"] ?>" alt="img">
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- brand-area-end -->

        <!-- contact-area -->
        <section id="contact" class="contact-area primary-bg pt-120 pb-120">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section-title mb-20">
                            <span>information</span>
                            <h2>Contact Information</h2>
                        </div>
                        <div class="contact-content">
                            <p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p>
                            <h5>OFFICE IN <span><?= $after_assoc_contact["location"] ?></span></h5>
                            <div class="contact-list">
                                <ul>
                                    <li><i class="fas fa-map-marker"></i><span>Address :</span><?= $after_assoc_contact["address"] ?></li>
                                    <li><i class="fas fa-headphones"></i><span>Phone :</span><?= $after_assoc_contact["phone"] ?></li>
                                    <li><i class="fas fa-globe-asia"></i><span>e-mail :</span><?= $after_assoc_contact["email"] ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-form">
                            <form action="./messages/message_post.php" method="POST">
                                <?php if (isset($_SESSION["success"])) { ?>

                                    <div class="alert alert-success text-dark alert-dismissible fade show" role="alert">
                                        <strong><?= $_SESSION["success"] ?></strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                <?php }
                                unset($_SESSION["success"]) ?>
                                <input type="text" name="name" placeholder="Name">
                                <input type="text" name="email" placeholder="Email">
                                <textarea name="message" id="message" placeholder="Send Message"></textarea>
                                <button type="submit" class="btn">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- contact-area-end -->

    </main>
    <!-- main-area-end -->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- footer -->
    <footer>
        <div class="copyright-wrap">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="copyright-text text-center">
                            <p>Copyright© <span>Kufa</span> | All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-end -->





    <!-- JS here -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/one-page-nav-min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/ajax-form.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

<!-- Mirrored from themebeyond.com/html/kufa/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Feb 2020 06:28:17 GMT -->

</html>

<?php if (isset($_SESSION["invalid"])) { ?>
    <script>
        Swal.fire(
            "Invalid",
            "<?= $_SESSION["invalid"] ?>",
            "error"
        )
    </script>
<?php }
unset($_SESSION["invalid"]) ?>