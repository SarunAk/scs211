<?php
// Include config file
require_once "../../config.php";

session_start();
// Attempt select query execution
$sql = "SELECT * FROM users";
$result = mysqli_query($link, $sql);
// Fetch all data in an array
$data  = mysqli_fetch_all($result, MYSQLI_ASSOC);
// Free result set - manually if need
// mysqli_free_result($result);
// Close connection - manually if need
// mysqli_close($link);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <?php include('../../layouts/employee-style.php'); ?>
</head>

<body>
    <?php include('../../layouts/admin-nav.php'); ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">User Account</h2>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['created_at'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include('../../layouts/employee-script.php'); ?>
</body>

</html>