<?php
include "connection.php";

$id = $_GET['update_id'];
$sql = "SELECT * FROM `todo` WHERE `id` = $id";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "UPDATE `todo` SET `title`= '$title', `description`= '$description' WHERE `id` = $id";
    $query = mysqli_query($conn, $sql);

    if (!$query) {
        die("Updation failed: " . mysqli_connect_error());
    } else {
        header("Location: index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- google font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
    <!-- font-awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>To-Do List</title>
</head>

<body class="bg-dark-subtle">
    <div class="heading-container py-2 bg-primary bg-gradient text-light d-flex justify-content-center align-item-center">
        <h1>To-Do List</h1>
    </div>
    <div class="container my-5">
        <div class="form-container py-4 px-3 border border-3 border-dark-subtle rounded-4">
            <form method="post">
                <div class="mb-3">
                    <label for="note-title" class="form-label fw-bold">Edit Title</label>
                    <input type="text" value=<?php echo ($row['title']) ?> name="title" class="form-control" id="note-title">
                </div>
                <div class="mb-4">
                    <label for="note-description" class="form-label fw-bold">Edit Description</label>
                    <input type="text" value=<?php echo ($row['description']) ?> name="description" class="form-control" id="note-description">
                </div>
                <button type="submit" class="btn btn-success px-4 bg-gradient" name="update">Update</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>