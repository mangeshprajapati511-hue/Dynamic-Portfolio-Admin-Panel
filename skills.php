<?php include'db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="title icon" type="image/png" href="./final-project/bs-img.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">

    <title>Skills</title>

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


    <!-- Skills Section -->

    <section class="bg-light p-5">

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 text-center mb-3">

                    <h1 class="text-warning display-2">Skills</h1>

                    <p class="lead text-secondary">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>

                    <a href="#" class="btn btn-outline-primary">Learn More</a>

                </div>
            </div>

            <div class="row text-center">

                <?php
                $res = $mysqli->query("SELECT * FROM skill");
                if ($res->num_rows > 0) {
                    while ($row = $res->fetch_assoc()) {
                ?>

                        <div class="col-lg-4 col-sm-12 max-auto mb-5">

                            <i class="<?php echo $row['Icon']; ?> fa-6x text-warning mb-3"></i>

                            <h1 class="text-secondary">
                                <?php echo $row['Tittle']; ?>
                            </h1>

                            <p class="text-muted">
                                <?php echo substr($row['Description'], 0, 45); ?>.....more
                            </p>

                            <a href="#" class="btn btn-outline-warning">Learn More</a>

                        </div>

                <?php
                    }
                }
                ?>

            </div>

        </div>

    </section>


    <!-- Footer -->

   <?php include'footer.php'; ?>

</body>

</html>