<?php

session_start();

require "../db.php";
require "../dashboard_parts/header.php";

$id = $_GET['id'];

$update = "UPDATE messages SET status = 1 WHERE id = '$id' ";
mysqli_query($db_connection, $update);

$select = "SELECT * FROM messages WHERE id = '$id' ";
$select_msg = mysqli_query($db_connection, $select);
$after_assoc_msg = mysqli_fetch_assoc($select_msg);

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
                            <td>Name</td>
                            <td><?= $after_assoc_msg["name"] ?></td>
                        </tr>
                        <tr>
                            <td>Message</td>
                            <td><?= $after_assoc_msg["message"] ?></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

require "../dashboard_parts/footer.php";

?>