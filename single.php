<?php

include 'config/db.php';

$blog_id = $_GET['id'];


$query = mysqli_query($conn, "SELECT * FROM blogs WHERE id=$blog_id") or die(mysqli_error($conn));


$row = mysqli_fetch_assoc($query);

$title = $row['title'];
$description = $row['description'];
$img = $row['blog_img'];

$formattedDate = date("d M, Y h:i A", strtotime($row['posted_date']));

$user_id = $row['user_id'];

$userQuery = mysqli_query($conn, "SELECT * FROM users WHERE id=$user_id") or die(mysqli_error($conn));
$userRow = mysqli_fetch_assoc($userQuery);

$author = $userRow['username'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>IT Elec 102 Exam Demo</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand">Navbar</a>
            <form class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                </ul>
                <button class="btn btn-success text-white" type="submit">Login</button>
                <button class="btn btn-warning text-white" type="submit">Register</button>
            </form>
        </div>
    </nav>

    <div id="main-content" class="container mt-4">
        <div id="blog-img" style="background-image: url('assets/uploads/<?php echo $img ?>')"></div>
        <div class="blog-title">
            <h1 class="mt-3 mb-0"><?php echo $title ?></h1>
            <small>Posted on: <?php echo $formattedDate ?></small>
            <p id="author" class="mb-0">Written by: <strong><?php echo $author ?></strong></p>
        </div>
        <p id="blog-body" class="mt-3">
            <?php echo $description ?>
        </p>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>