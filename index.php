<?php
include "connection.php";
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
    <div class="container my-5 col-md-8 col-lg-6 col-xl-4">
        <div class="form-container py-4 px-3 border border-3 border-dark-subtle rounded-4">
            <form action="insert.php" method="post">
                <div class="mb-3">
                    <label for="note-title" class="form-label fw-bold">Note Title</label>
                    <input type="text" name="title" class="form-control" id="note-title" required>
                </div>
                <div class="mb-4">
                    <label for="note-description" class="form-label fw-bold">Note Description</label>
                    <input type="text" name="description" class="form-control" id="note-description" required>
                </div>
                <button type="submit" class="btn btn-primary px-4 bg-gradient" name="add">Add</button>
            </form>
        </div>
        <div class="table-container my-4">
            <table class="table table-secondary table-hover">
                <?php
                $sql = "SELECT * FROM `todo`";
                $query = mysqli_query($conn, $sql);
                $row = mysqli_num_rows($query);
                if (!empty($row)) {
                    echo ('
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Operation</th>
                        </tr>
                    </thead>
                    ');
                    while ($result = mysqli_fetch_array($query)) {
                        $id = $result['id'];
                        $title = $result['title'];
                        $description = $result['description'];
                        echo ('
                            <tbody>
                                <tr>
                                    <th scope="row">' . $id . '</th>
                                    <td>' . $title . '</td>
                                    <td>' . $description . '</td>
                                    <td class="d-flex justify-content-evenly align-items-center">
                                        <a href="update.php?update_id=' . $id . '">
                                            <i class="fa-regular fa-pen-to-square text-primary"></i>
                                        </a>
                                        <a href="delete.php?delete_id=' . $id . '">
                                            <i class="fa-regular fa-trash-can text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                            ');
                    }
                }
                ?>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>