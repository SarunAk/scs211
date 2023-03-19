<?php
// Include config file
require_once "../../config.php";

session_start();
// Attempt select query execution
$sql = "SELECT * FROM customers where user_id = '{$_SESSION["id"]}'";
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
                        <h2 class="pull-left">My Customers </h2>
                    </div>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Email</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $row) { ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['age'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['address'] ?></td>
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