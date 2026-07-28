<?php

session_start();

$mysqli = new mysqli('localhost', 'root', '', 'proj_2');

if ($mysqli->connect_errno) {
    echo "Connection failed: " . $mysqli->connect_error;
    die;
}

if (isset($_POST['submit'])) {
 
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $_SESSION['loggedIn'] = true;

    $stmt = $mysqli->prepare("SELECT * FROM user WHERE email = ? and password = ?");

    $stmt->bind_param("ss", $email, $password);

    $stmt->execute();

    $result = $stmt->get_result();
    $result->num_rows;

    if ($result->num_rows > 0) {
        $_SESSION['loggedIn'] = true;
        header("Location:dashboard.php");
    } else {
        echo "<script>alert('Please enter correct email and password');</script>";
    }


    $stmt->close();
}


$mysqli->close();

?>
<!DOCTYPE html>
<html>

<head>

    <title>Login Here</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#btnsubmit").click(function() {
                if ($("#email").val().trim() == "") {
                    alert("Please Enter Email ID!!");
                    return false;
                }

                if ($("#password").val().trim() == "") {
                    alert("Please Enter Password!!");
                    return false;
                }

            });
        });
    </script>
</head>

<body class="card-body d-flex bg-info align-items-center justify-content-center" style="height:100vh;">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-5">
                <h2 class="font-weight-bold text-center text-light">Login With Admin Panel</h2>

                <div class="card shadow-lg border-0">

                    <div class="card-body p-4">
                        <h3 class="font-weight-bold text-center text-info">Login Here</h3>

                        <form class="card-body" action="login.php" method="POST">

                            <div class="form-group ">
                                <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email ID">
                            </div>


                            <div class="form-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password">
                            </div>

                            <button type="submit" name="submit" id="btnsubmit" class="btn btn-outline-primary btn-block">Log in</button>

                        </form>

                        <!-- <hr> -->


                        <div class="justify-content-between">

                            <button class="btn btn-outline-info btn-block ">
                                Forgot Password
                            </button>

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
</body>

</html>