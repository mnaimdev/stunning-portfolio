<?php

session_start();

require "../db.php";
require "../session_check.php";
require "../dashboard_parts/header.php";

$select = "SELECT * FROM contacts";
$select_contact = mysqli_query($db_connection, $select);

?>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Contact List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <th>SL</th>
                            <th>Location</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($select_contact as $key => $contact) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $contact["location"] ?></td>
                                <td><?= $contact["address"] ?></td>
                                <td><?= $contact["phone"] ?></td>
                                <td><?= $contact["email"] ?></td>
                                <td>
                                    <a href="contact_status.php?id=<?= $contact["id"] ?>">
                                        <span class="badge text-bg-<?= $contact["status"] == 1 ? "success" : "secondary" ?>">
                                            <?= $contact["status"] == 1 ? "Active" : "Deactive" ?>
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
                                            <button data-link="delete_contact.php?id= <?= $contact["id"] ?>" class="dropdown-item delete_btn">
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
                    <h3>Contact</h3>
                </div>
                <div class="card-body">
                    <form action="contact_post.php" method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="location" placeholder="Location">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="address" placeholder="Address">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="email" placeholder="Email Address">
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



<!-- <script>
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
</script> -->

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

<?php if (isset($_SESSION["contact"])) { ?>
    <script>
        Swal.fire(
            "Error",
            "<?= $_SESSION["contact"] ?>",
            "error"
        )
    </script>
<?php }
unset($_SESSION["contact"]) ?>