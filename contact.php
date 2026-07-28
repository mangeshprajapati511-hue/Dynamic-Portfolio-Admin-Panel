<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="title icon" type="image/png" href="./final-project/bs-img.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">

    <title>Contact</title>

    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>

    <script>
        $(document).ready(function() {

            $("#btnsubmit").click(function() {

                if ($("#name").val() == "") {
                    alert("Please Enter Your Name!!");
                    return false;
                }

                if ($.isNumeric($("#name").val())) {
                    alert("Name Should be Alfhabetic !!");
                    return false;
                }

                if ($("#email").val() == "") {
                    alert("Please Enter Your Email ID!!");
                    return false;
                }

                if (($('#email').val().indexOf('.') - $('#email').val().indexOf('@')) < 2) {
                    alert("Please enter a valid email");
                    return false;
                }

                if ($("#message").val() == "") {
                    alert("Please Enter Your Message!!");
                    return false;
                }

                if ($("#message").val().length < 30) {
                    alert("Message atleast 30 char long!!");
                    return false;
                }

            })

        });
    </script>

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


    <!-- Contact Section -->

    <section class="p-5 bg-light">

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12 text-center mb-3">

                    <h1 class="text-warning display-2">Contect Us</h1>

                    <p class="lead text-secondary">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>

                </div>
            </div>

        </div>


        <div class="row justify-content-center">

            <div class="col-lg-6 col-md-8 col-sm-10">

                <div class="text-center text-secondary">
                    <h2>Got Question ?</h2>
                    <p>Stay Connected</p>
                </div>

                <form action="contact-process.php" method="post" class="text-muted">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea name="message" id="message" class="form-control" rows="3"></textarea>
                    </div>

                    <button class="btn btn-outline-warning btn-block" name="submit" id="btnsubmit" type="submit">
                        Submit
                    </button>

                </form>

            </div>

        </div>

    </section>


    <!-- Footer -->
<?php include'footer.php'; ?>

</body>

</html>