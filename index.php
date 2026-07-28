<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="title icon" type="image/png" href="./final-project/bs-img.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">

    <title>Pure Dynamic Website</title>

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


    <!-- Banner -->

    <section>

        <div class="container-fluid">

            <div class="row bg-info justify-content-center align-items-center" style="height:100vh;">

                <div class="col-sm-10 text-center">

                    <h1 class="display-2 text-capitalize">

                        <span class="text-warning">Pure Bootstrap</span>
                        <span class="text-white font-weight-bold">Website</span>

                    </h1>

                    <h2 class="font-weight-light font-italic text-light">

                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, laboriosam.

                    </h2>

                    <a href="#" class="btn btn-warning btn-lg px-3">Press Here</a>
                    <a href="#" class="btn btn-danger btn-lg px-3">Press Here</a>

                </div>

            </div>

        </div>

    </section>


    <!-- Footer -->

   <?php include'footer.php'; ?>

</body>

</html>