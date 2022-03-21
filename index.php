<?php

    include 'config/db.php';

    $sql = "SELECT * FROM blogs";
    $result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>IT Elec 102 Exam Demo</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand">Navbar</a>
            <form class="d-flex">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                </ul>
                <button class="btn btn-success text-white" type="submit">Login</button>
                <button class="btn btn-warning text-white" type="submit">Register</button>
            </form>
        </div>
    </nav>

    <div id="main-content" class="container mt-4">
        <div class="row">

        <?php if ($result->num_rows > 0) {  ?>
                <?php while($row = $result->fetch_assoc()) { ?>
                    <div class="col-12 col-sm-6 col-md-3 mt-4">
                        <div class="card">
                            <img src="assets/uploads/<?php echo $row['blog_img'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['title'] ?></h5>
                                <p class="card-text"><?php echo substr($row['description'], 0, 100) . ' ...' ?></p>
                                <a href="#" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
        <?php } else { ?>
            <div class="alert alert-danger" role="alert">
                Sorry, there are no blogs at the moment!
            </div>
        <?php } ?>
        <?php $conn->close(); ?>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>