<?php
include "connection.php";

if(isset($_POST['add'])){
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO `todo`(`title`, `description`) VALUES ('$title', '$description')";
    $query = mysqli_query($conn, $sql);
    
    if(!$query){
        die("Insertion error: ". mysqli_connect_error($query));
    }
    else{
        header("Location: index.php");
    }
}
?>
