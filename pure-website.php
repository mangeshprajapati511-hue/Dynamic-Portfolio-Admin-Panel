<?php include'db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="title icon" type="image/png" href="./final-project/bs-img.png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
  <title>Pure Dynamic Website</title>
  <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
    integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8="
    crossorigin="anonymous"></script>

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
        if (($('#email').val().indexof('.') - $('#email').val().indexof('@')) < 2) {
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

  <!-- This is Nevigation bar -->


  <nav class="navbar navbar-expand-md navbar-light bg-dark sticky-top">

    <a href="#" class="navbar-brand"> <i class="fas fa-child text-warning fa-2x"></i></a>

    <button type="button" class="navbar-toggler bg-light" data-toggle="collapse" data-target="#nav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="nav">

      <ul class="navbar-nav">

        <li class="nav-item"> <a class="nav-link text-light text-uppercase font-weight-bold px-3" href="#">Home</a></li>
        <li class="nav-item"> <a class="nav-link text-light text-uppercase font-weight-bold px-3" href="#">Skills</a>
        </li>
        <li class="nav-item dropdown">

          <a class="nav-link text-light text-uppercase font-weight-bold px-3 dropdown-toggle" data-toggle="dropdown"
            href="#">Projects</a>

          <div class="dropdown-menu">

            <a class="dropdown-item" href="#">Project 1</a>
            <a class="dropdown-item" href="#">Project 2</a>
            <a class="dropdown-item" href="#">Project 3</a>
            <a class="dropdown-item" href="#">Project 4</a>
          </div>
        </li>

        <li class="nav-item"> <a class="nav-link text-light text-uppercase font-weight-bold px-3" href="#">Team</a></li>
        <li class="nav-item"> <a class="nav-link text-light text-uppercase font-weight-bold px-3" href="#">Contact</a>
        </li>
      </ul>

      <form action="" class="form-inline">
        <div class="input-group">

          <input type="text" placeholder="Search" class="form-control">
          <div class="input-group-append">

            <button type="button" class="btn">
              <i class="fas fa-search text-muted"></i>
            </button>

          </div>
        </div>
      </form>
    </div>
  </nav>


  <!-- Banner -->

  <section id="home">
    <div class="container-fluid">
      <div class="row bg-info justify-content-center align-items-center" style="height: 100vh;">
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

  <!--This  is Skill Section -->

  <section id="skills" class="bg-light p-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-center mb-3">
          <h1 class="text-warning display-2">Skills</h1>
          <p class="lead text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>

          <a href="#" class="btn btn-outline-primary">Learn More</a>
        </div>
      </div>
      <div class=" row text-center">

        <?php
        $res = $mysqli->query("SELECT * FROM skill");
        if ($res->num_rows > 0) {
          while ($row = $res->fetch_assoc()) {

            $id = $row['ID'];
        ?>

            <div class="col-lg-4 col-sm-12 max-auto mb-5">
              <i class="<?php echo $row['Icon']; ?> fa-6x text-warning mb-3"></i>
              <h1 class="text-secondary"> <?php echo $row['Tittle']; ?></h1>
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

  <!-- Project Section -->

  <section id="projects">
    <div class="row">
      <div class="col-lg-12 text-center mb-3">
        <h1 class="text-warning display-2">Projects</h1>
        <p class="lead text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elitLorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        <a href="#" class="btn btn-outline-primary">Learn More</a>
      </div>
    </div>
    <div class="row text-center">

      <?php
      $res = $mysqli->query("SELECT * FROM project");
      if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
          $id = $row['ID'];
      ?>

          <div class="col-lg-3">
            <img src="./uploads/<?php echo $row['Image']; ?>" class="img-thumbnail" alt="img not found">
            <h2 class="my-3 text-warning"> <?php echo "<td>{$row['Tittle']}</td>";  ?> </h2>
            <p class="text-muted">
              <?php echo substr($row['Description'], 0, 35); ?>...
            </p>
          </div>
      <?php
        }
      }
      ?>
    </div>
    </div>
  </section>

  <!-- Team Section -->
  <section id="team" class="p-2 p-sm-5 bg-secondary">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12  text-center mb-3">
          <h1 class="text-warning display-2">Team</h1>
          <p class="lead text-light">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Velit, suscipit vero
            quaerat amet qui officia quia enim quisquam culpa cum.
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

                    <h3 class="text-muted"><?php echo "<td>{$row['Name']}</td>"; ?></h3>
                  </div>
                  <div class="card-subtitle"></div>
                  <p class="text-muted">
                    <?php echo substr($row['Description'], 0, 25); ?>.....more
                  </p>
                </div>

                <div class="text-right">
                  <a href="#">
                    <i class="<?php echo "{$row['Icon1']}"; ?> fa-2x mx-2 text-primary"></i>
                  </a>
                  <a href="#">
                    <i class="<?php echo "{$row['Icon2']}"; ?> fa-2x mx-2 text-info"></i>
                  </a>

                  <a href="#">
                    <i class="<?php echo "{$row['Icon3']}"; ?> fa-2x mx-2 text-danger"></i>
                  </a>
                </div>

              </div>
            </div>
        <?php
          }
        }
        ?>
  </section>

  <!-- Progress Section -->
  <section id="progress" class="p-5">
    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-12 text-center mb-3">
          <h1 class="text-warning display-2">Progress</h1>
          <p class="lead text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio nobis
            accusantium voluptatibus. Quo inventore fugiat assumenda repudiandae recusandae optio in.</p>

        </div>
      </div>

      <div class="row justify-content-center">

        <div class="col-lg-6 text-secondary">

          <?php
          $res = $mysqli->query("SELECT * FROM progress");
          if ($res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
          ?>
              <h2><?php echo "<td>{$row['Course']}</td>"; ?></h2>
              <a href="update-delete-page.php?id=<?php echo $row['ID']; ?>">
                <div class="progress bg-secondary mb-3">
                  <div class="progress-bar text-center text-light <?php echo "{$row['Color']}"; ?> "
                    style="width:<?php echo "{$row['Percentage']}"; ?>%;">
                    <?php echo "{$row['Percentage']}"; ?>%
                  </div>
                </div>
              </a>
              </a>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <!-- This is contect Section -->
  <section id="contact" class="p-5 bg-light">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 text-center mb-3">
          <h1 class="text-warning display-2">Contect Us</h1>
          <p class="lead text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio nobis
            accusantium voluptatibus. Quo inventore fugiat assumenda repudiandae recusandae optio in.
          </p>
        </div>
      </div>
    </div>

    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-8 col-sm-10">
        <div class="text-center text-secondary">
          <h2>Got Question ?</h2>
          <p> Stay Connected </p>
        </div>

        <form action="contact.php" method="post" class="text-muted">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" />
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" />
          </div>

          <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" class="form-control" rows="3"></textarea>
          </div>

          <button class="btn btn-outline-warning btn-block" name="submit" id="btnsubmit" type="submit">Submit</button>

        </form>
      </div>
    </div>
  </section>
  <!-- Footer Section -->

  <footer class="bg-secondary">

    <div class="container">

      <div class="row">

        <div class="col-lg-12 text-center">

          <h1 class="text-white font-weight-light text-capitalize p-3">
            Pure Bootstrap Project
          </h1>

          <h3 class="text-light font-weight-light font-italic mb-3">
            Lorem ipsum dolor sit amet consectetur adipisicing.
          </h3>

          <div class="py-2">
            <a href="#">
              <i class="fab fa-facebook fa-2x text-primary mx-3"></i>
            </a>

            <a href="#">
              <i class="fab fa-google-plus fa-2x text-danger mx-3"></i>
            </a>

            <a href="#">
              <i class="fab fa-youtube fa-2x text-danger mx-3"></i>
            </a>

            <a href="#">
              <i class="fab fa-twitter fa-2x text-info mx-3"></i>
            </a>

          </div>

          <p class="text-light py-4 m-0">
            &copy;copyright 2021 - made by creativeWarrious
          </p>

        </div>

      </div>

    </div>

  </footer>

</body>

</html>