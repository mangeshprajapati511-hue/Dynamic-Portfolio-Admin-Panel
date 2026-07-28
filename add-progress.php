<?php

include "db.php";

if (isset($_POST['submit'])) {
    $course      = $_POST['course'];
    $percentage  = $_POST['percentage'];
    $color       = $_POST['color'];

    if (!($stmt = $mysqli->prepare("INSERT INTO progress(course,percentage,color)VALUES(?,?,?)"))) {
        echo "Prepare failed:(" . $mysqli->errno . ")" . $mysqli->error;
        die;
    }

    if (!($stmt->bind_param("sis", $course, $percentage, $color))) {
        echo "Binding parameters failed:(" . $mysqli->errno . ")" . $mysqli->error;
        die;
    }

    if ($stmt->execute()) {
        header("Location:progress-table.php");
        exit();
    } else {
        echo "Failed Execution:" . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#btnsubmit").click(function() {
                if ($("#course").val().trim() == "") {
                    alert("Please enter course name!");
                    return false;
                }
                if ($("#percentage").val() == "" || $("#percentage").val() < 0 || $("#percentage").val() > 100) {
                    alert("Please enter a valid percentage (0-100)!");
                    return false;
                }

                if ($("#color").val().trim() == "") {
                    alert("Please enter color!");
                    return false;
                }

            });
        });
    </script>
</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow border-0">

                    <div class="card-header bg-primary text-white text-center py-3">
                        <h4 class="mb-0 font-weight-bold">Add Progress</h4>
                    </div>

                    <div class="card-body p-4" style="background:#f2f2f2;">

                        <form action="add-progress.php" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label class="font-weight-bold">course</label>
                                <input type="text" name="course" id="course" class="form-control" placeholder="Enter course Name!!">
                            </div>

                            <div class="form-group"> 
                                <label class="font-weight-bold">Percentage</label>
                                <input type="number" name="percentage" id="percentage" class="form-control" placeholder="Enter Percentage!!">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Color</label>
                                <input type="text" name="color" id="color" class="form-control" placeholder="Enter color class!!">
                            </div>

                            <button type="submit" name="submit" id="btnsubmit" class="btn btn-success btn-block mt-3">
                                Submit
                            </button>

                            <a href="team-table.php" class="btn btn-primary btn-block mt-3">
                                Back
                            </a>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>