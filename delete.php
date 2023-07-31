<?php
include "connection.php";

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql = "DELETE FROM `todo` WHERE id= $id";
    $query = mysqli_query($conn, $sql);
    if (!$query) {
        die("Deletion failed: " . mysqli_connect_error());
    } else {
        header("Location: index.php");
    }
}
?>
