<?php
// Include config file
require_once "../config.php";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Prepare an insert statement
    $sql = "INSERT INTO products (Title, Description, Price) VALUES ('{$_POST["Title"]}','{$_POST["Description"]}', '{$_POST["Price"]}')";
    // echo $sql;
    if (mysqli_query($link, $sql)) {
        echo "Records added successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }

    header("location: index.php");

    // Close connection - manually
    // mysqli_close($link);
}