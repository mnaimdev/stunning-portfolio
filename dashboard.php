<?php

session_start();


require "session_check.php";
require "db.php";
require "dashboard_parts/header.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h2 style="color: #1a379d;">Dashboard</h2>
                    </div>
                    <div class="card-body">
                        <p>Welcome to Admin Panel</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php

require "dashboard_parts/footer.php";

?>