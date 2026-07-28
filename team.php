<?php include'db.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="title icon" type="image/png" href="./final-project/bs-img.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">

    <title>Team</title>
</head>

<body>

    <!-- Navbar -->

    <nav class="navbar navbar-expand-md navbar-light bg-dark sticky-top">

        <a href="#" class="navbar-brand">
            <i class="fas fa-child text-warning fa-2x"></i>
        </a>

        <button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav">

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link text-light text-uppercase font-weight-bold px-3" href="index.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light text-uppercase font-weight-bold px-3" href="skills.php">Skills</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light text-uppercase font-weight-bold px-3" href="projects.php">Projects</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light text-uppercase font-weight-bold px-3" href="team.php">Team</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-light text-uppercase font-weight-bold px-3" href="contact.php">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light text-uppercase font-weight-bold px-3" href="progress.php">Progress</a>
                </li>


            </ul>

        </div>

    </nav>


    <!-- Team Section -->

    <section class="p-2 p-sm-5 bg-secondary">

        <div class="container-fluid">

            <div class="row">

                <div class="col-lg-12 text-center mb-3">
                    <h1 class="text-warning display-2">Team</h1>

                    <p class="lead text-light">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit, suscipit vero quaerat amet qui officia quia enim quisquam culpa cum.
                    </p>
                </div>

            </div>


            <div class="row">

                <?php
                $res = $mysqli->query("SELECT * FROM team");
                if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                ?>

                        <div class="col-lg-4 mb-4">

                            <div class="card">

                                <img src="./uploads/<?php echo $row['Image']; ?>" class="img-thumbnail" alt="img not found">

                                <div class="card-body">

                                    <div class="card-title">
                                        <h3 class="text-muted">
                                            <?php echo $row['Name']; ?>
                                        </h3>
                                    </div>

                                    <p class="text-muted">
                                        <?php echo substr($row['Description'], 0, 25); ?>.....more
                                    </p>

                                </div>

                                <div class="text-right">

                                    <a href="#">
                                        <i class="<?php echo $row['Icon1']; ?> fa-2x mx-2 text-primary"></i>
                                    </a>

                                    <a href="#">
                                        <i class="<?php echo $row['Icon2']; ?> fa-2x mx-2 text-info"></i>
                                    </a>

                                    <a href="#">
                                        <i class="<?php echo $row['Icon3']; ?> fa-2x mx-2 text-danger"></i>
                                    </a>

                                </div>

                            </div>

                        </div>

                <?php
                    }
                }
                ?>

            </div>

        </div>

    </section>


    <!-- Footer -->

   <footer class="bg-light">

        <div class="container">

            <div class="row">

                <div class="col-lg-12 text-center">

                    <h1 class="text-secondary font-weight-light text-capitalize p-1">
                        Pure Bootstrap Project
                    </h1>

                    <!-- <h3 class="text-light font-weight-light font-italic mb-3">
                        Lorem ipsum dolor sit amet consectetur adipisicing.
                    </h3> -->

                    <div class="py-2">

                        <a href="#">
                            <i class="fab fa-facebook fa-2x text-primary mx-3"></i>
                        </a>

                        <a href="#">
                            <i class="fab fa-google-plus fa-2x text-danger mx-3"></i>
                        </a>

                        <a href="#">
                            <i class="fab fa-youtube fa-2x text-danger mx-2"></i>
                        </a>

                        <a href="#">
                            <i class="fab fa-twitter fa-2x text-info mx-2"></i>
                        </a>

                    </div>

                    <p class="text-secondary mb-2 m-0">
                        &copy;copyright 2026 - made by mangeshprajapati
                    </p>

                </div>

            </div>

        </div>

    </footer>
</body>

</html>