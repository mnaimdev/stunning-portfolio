<?php

session_start();
require "../db.php";
require "../session_check.php";
require "../dashboard_parts/header.php";

$select = "SELECT * FROM counts";
$select_count = mysqli_query($db_connection, $select);

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
    'fa-pinterest-square',
    'fa-thumbs-up',
    'fa-male',
    'fa-calendar',
    'fa-star'

]

?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h2>Count List</h2>
                </div>
                <div class="card-body">
                    <table class="table table_striped">
                        <tr>
                            <th>SL</th>
                            <th>Icon</th>
                            <th>Count</th>
                            <th>Info</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($select_count as $key => $count) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td>
                                    <i style="font-family: fontawesome; font-size: 30px; font-weight: normal; margin-right: 10px" class=" <?= $count["icon"] ?>"></i>
                                </td>
                                <td>
                                    <?= $count["count"] ?>
                                </td>
                                <td>
                                    <?= $count["info"] ?>
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
                                            <button data-link="delete_count.php?id= <?= $count["id"] ?>" class="dropdown-item delete_btn">
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
                    <h2 class="text-primary text-center">Add Logo</h2>
                </div>
                <div class="card-body">
                    <form action="count_post.php" method="POST">
                        <div class="mb-3">
                            <?php foreach ($fonts as $font) { ?>
                                <i data-icon="<?= $font ?>" style="font-family: fontawesome; font-size: 30px; font-weight: normal; margin-right: 10px" class="<?= $font ?> icon_class"></i>
                            <?php } ?>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="icon" id="icon" class="form-control" placeholder="Icon">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="count" class="form-control" placeholder="Count">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="info" class="form-control" placeholder="Info">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
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
    $(".icon_class").click(function() {
        var value = $(this).attr("data-icon");
        $("#icon").attr("value", value);
    })
</script>

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
                const link = $(this).attr("data-link");
                location.href = link;
            }
        })
    })
</script>


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