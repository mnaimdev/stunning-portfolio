<?php

session_start();
require "../db.php";
require "../session_check.php";
require "../dashboard_parts/header.php";

$select = "SELECT * FROM services";
$select_icon = mysqli_query($db_connection, $select);

?>

<?php

$fonts = [
    'fa-facebook',
    'fa-facebook-f',
    'fa-facebook-official',
    'fa-facebook-square',
    'fa-instagram',
    'fa-twitch',
    'fa-twitter',
    'fa-code',
    'fa-lightbulb-o',
    'fa-headphones',
    'fa-free-code-camp',
    'fa-desktop',
    'fa-edit',
    'fa-twitter-square',
    'fa-linkedin',
    'fa-linkedin-square',
    'fa-youtube',
    'fa-youtube-play',
    'fa-youtube-square',
    'fa-github',
    'fa-github-alt',
    'fa-github-square',
    'fa-pinterest',
    'fa-pinterest-p',
    'fa-pinterest-square'
]


?>

<div class="container">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3>Services</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>SL</th>
                        <th>Icon</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    <?php foreach ($select_icon as $key => $icon) { ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td>
                                <i style="font-family: fontawesome; font-size: 20px" class="<?= $icon["icon"] ?>"></i>
                            </td>
                            <td>
                                <?= $icon["title"] ?>
                            </td>
                            <td>
                                <?= $icon["desp"] ?>
                            </td>
                            <td>
                                <a href="service_status.php?id= <?= $icon["id"] ?>">
                                    <span class="badge text-bg-<?= $icon["status"] == 1 ? "success" : "secondary" ?>">
                                        <?= $icon["status"] == 1 ? "Active" : "Deactive" ?>
                                    </span>
                                </a>
                            </td>

                            <td>

                                <div class="dropdown">
                                    <button type="button" class="btn btn-success light sharp" data-toggle="dropdown">
                                        <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <circle fill="#000000" cx="5" cy="12" r="2" />
                                                <circle fill="#000000" cx="12" cy="12" r="2" />
                                                <circle fill="#000000" cx="19" cy="12" r="2" />
                                            </g>
                                        </svg>
                                    </button>
                                    <div class="dropdown-menu">
                                        <button data-link="delete_service.php?id= <?= $icon["id"] ?>" class="dropdown-item delete_btn">
                                            Delete
                                        </button>
                                    </div>
                                </div>

                            </td>

                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3>Add Service</h3>
            </div>
            <div class="card-body">
                <form action="service_post.php" method="POST">
                    <div class="mb-3">
                        <?php foreach ($fonts as $key => $font) { ?>
                            <i data-icon=<?= $font ?> style="font-family: fontawesome; font-size: 30px; margin-right: 10px; font-style: none; cursor: pointer" class="<?= $font ?> font-icon"></i>
                        <?php } ?>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" name="icon" id="icon" placeholder="Icon">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="title" placeholder="Title">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="desp" placeholder="Description">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Service</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Sweet Alert Link -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php

require "../dashboard_parts/footer.php";

?>

<script>
    $(".font-icon").click(function() {
        var icon_class = $(this).attr("data-icon");
        $("#icon").attr("value", icon_class);
    })
</script>


<!-- limit status active -->
<?php if (isset($_SESSION["limit"])) { ?>
    <script>
        Swal.fire(
            "Error",
            "<?= $_SESSION["limit"] ?>",
            "error"
        )
    </script>
<?php }
unset($_SESSION["limit"]) ?>


<!-- delete service confirm -->
<script>
    $(".delete_btn").click(function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var link = $(this).attr("data-link");
                location.href = link;
            }
        })
    })
</script>


<!-- delete service sweet alert -->
<?php if (isset($_SESSION["delete"])) { ?>
    <script>
        Swal.fire(
            "Deleted",
            "<?= $_SESSION["delete"] ?>",
            "success"
        )
    </script>
<?php }
unset($_SESSION["delete"]) ?>