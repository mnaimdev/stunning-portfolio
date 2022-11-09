<?php

session_start();
require "../db.php";
require "../session_check.php";
require "../dashboard_parts/header.php";

$select = "SELECT * FROM testimonials";
$select_testimonial = mysqli_query($db_connection, $select);

?>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2>Testimonial</h2>
                </div>
                <div class="card-body">
                    <table class="table table_striped">
                        <tr>
                            <th>SL</th>
                            <th>Image</th>
                            <th>Review</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($select_testimonial as $key => $testimonial) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td>
                                    <img src="../uploads/testimonials/<?= $testimonial["image"] ?>" alt="" width="40" height="40">
                                </td>
                                <td><?= substr($testimonial["review"], 0, 20) . "...more" ?></td>
                                <td><?= $testimonial["name"] ?></td>
                                <td><?= $testimonial["designation"] ?></td>

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
                                            <button data-link="delete_testimonial.php?id= <?= $testimonial["id"] ?>" class="dropdown-item delete_btn">
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

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-primary text-center">Add Testimonial</h2>
                </div>
                <div class="card-body">
                    <form action="testimonial_post.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <textarea name="review" cols="30" rows="10" class="form-control" placeholder="Review"></textarea>
                        </div>
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="mb-3">
                            <input type="text" name="designation" class="form-control" placeholder="Designation">
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