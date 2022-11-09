<?php

session_start();

require "../db.php";

$select = "SELECT * FROM messages";
$select_msg = mysqli_query($db_connection, $select);

?>

<?php

require "../dashboard_parts/header.php";

?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3>Message List</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        <?php foreach ($select_msg as $sl => $msg) { ?>
                            <tr style="background-color: <?= $msg["status"] == 1 ? "white" : "#ddd" ?>">
                                <td><?= $sl + 1 ?></td>
                                <td><?= $msg["name"] ?></td>
                                <td><?= $msg["email"] ?></td>
                                <td>
                                    <a class="btn btn-primary" href="message_view.php?id= <?= $msg["id"] ?>">View</a>

                                    <button class="btn btn-danger delete_btn" data-link="delete_message.php?id= <?= $msg["id"] ?>">Delete</button>

                                </td>
                            </tr>
                        <?php } ?>
                    </table>
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