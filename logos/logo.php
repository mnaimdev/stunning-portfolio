<?php

session_start();
require "../db.php";
require "../session_check.php";
require "../dashboard_parts/header.php";

$select = "SELECT * FROM logos";
$select_res = mysqli_query($db_connection, $select);

?>

<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2>Logo List</h2>
                </div>
                <div class="card-body">
                    <table class="table table_striped">
                        <tr>
                            <th>SL</th>
                            <th>Logo</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($select_res as $key => $logo) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td>
                                    <img src="../uploads/logos/<?= $logo["logo"] ?>" alt="" width="100">
                                </td>

                                <td>
                                    <a href="logo_status.php?id= <?= $logo["id"] ?>">
                                        <span class="badge text-bg-<?= $logo["status"] == 1 ? "success" : "secondary" ?>"><?= ($logo["status"] == 1 ? "Active" : "Deactive") ?></span>
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
                                            <button data-link="delete_logo.php?id= <?= $logo["id"] ?>" class="dropdown-item delete_btn">
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
                    <h2 class="text-primary text-center">Add Logo</h2>
                </div>
                <div class="card-body">
                    <form action="logo_post.php" method="POST" enctype="multipart/form-data">
                        <div>
                            <input type="file" name="logo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                            <br>
                            <img src="" id="blah" width="200">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Update</button>
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

<?php if (isset($_SESSION["logo"])) { ?>
    <script>
        Swal.fire(
            "Error",
            "<?= $_SESSION["logo"] ?>",
            "error"
        )
    </script>
<?php }
unset($_SESSION["logo"]) ?>