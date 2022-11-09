<?php

session_start();
require "../db.php";
require "../session_check.php";
require "../dashboard_parts/header.php";

$select = "SELECT * FROM works";
$select_work = mysqli_query($db_connection, $select);

?>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2>Works</h2>
                </div>
                <div class="card-body">
                    <table class="table table_striped">
                        <tr>
                            <th>SL</th>
                            <th>Sub Title</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($select_work as $sl => $work) { ?>
                            <tr>
                                <td><?= $sl + 1 ?></td>
                                <td><?= $work["sub_title"] ?></td>
                                <td><?= $work["title"] ?></td>
                                <td><?= substr($work["desp"], 0, 30) . "...more" ?></td>
                                <td>
                                    <img width="40" height="40" src="../uploads/works/<?= $work["image"] ?>" alt="">
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
                                            <button data-link="delete_work.php?id= <?= $work["id"] ?>" class="dropdown-item delete_btn">Delete</button>
                                        </div>
                                    </div>

                                </td>

                            </tr>
                        <?php } ?>

                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-primary text-center">Add Work</h2>
                </div>
                <div class="card-body">
                    <form action="work_post.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="text" name="category" class="form-control" placeholder="Category">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="sub_title" class="form-control" placeholder="Sub Title">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="mb-3">
                            <textarea name="desp" cols="30" rows="10" placeholder="Description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Add Work</button>
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