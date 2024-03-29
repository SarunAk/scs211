<?php
// Include config file
require_once "../config.php";
// Prepare a select statement
$sql = "SELECT * FROM products WHERE id = '{$_GET["id"]}'";
// echo $sql;
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) == 0) {
    // URL doesn't contain valid id parameter. Redirect to error page
    header("location: ../error.php");
    exit();
}
/* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Update Record</title>
    <?php include('../layouts/employee-style.php'); ?>
</head>

<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Update Record</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="update.php" method="post">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="Title" class="form-control" value="<?= $row["Title"] ?>">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="Description" class="form-control"><?= $row["Description"] ?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" name="Price" class="form-control" value="<?= $row["Price"] ?>">
                        </div>
                        <input type="hidden" name="id" value="<?= $row["id"] ?>" />
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php include('../layouts/employee-script.php'); ?>
</body>

</html>