<?php

include "db.php";


if (isset($_GET['id'])) {

    $id = $_GET['id'];


    if (!($stmt = $mysqli->prepare("SELECT * FROM skill WHERE id = ?"))) {
        echo "Prepare Failed:(" . $mysqli->errno . ")" . $mysqli->error;
        die;
    }
    if (!($stmt->bind_param("i", $id))) {
        echo "Binding failed:(" . $mysqli->errno . ")" . $mysqli->error;
        die;
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
}

if (isset($_POST['submit'])) {
    $id          = $_POST['id'];
    $tittle      = $_POST['tittle'];
    $description = $_POST['description'];
    $icon        = $_POST['icon'];

    if (!($stmt = $mysqli->prepare("UPDATE skill SET tittle = ?,description = ?,icon = ? WHERE id =?"))) {
        echo "Prepare failed:(" . $mysqli->errno . ")" . $mysqli->error;
        die;
    }

    if (!($stmt->bind_param("sssi", $tittle, $description, $icon, $id))) {
        echo "Binding failed:(" . $mysqli->errno . ")" . $mysqli->error;
        die;
    }
    if ($stmt->execute()) {
        echo "<script>
            alert('Skill Added Successfully');
            location.href='skill-table.php';
          </script>";
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
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8="
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $("#btnsubmit").click(function() {
                if ($("#tittle").val() == "") {
                    alert("Please Enter Skill tittle!!");
                    return false;
                }

                if ($.isNumeric($("#tittle").val())) {
                    alert("Please Enter Alfabetic tittle!!");
                    return false;
                }
                if ($("#tittle").val().length < 3) {
                    alert("Please Enter tittle atleast 3 char long!!");
                    return false;
                }

                if ($("#description").val() == "") {
                    alert("Please Enter Skill description!!");
                    return false;
                }

                if ($.isNumeric($("#description").val())) {
                    alert("Please Enter Alfabetic description!!");
                    return false;
                }
                if ($("#description").val().length < 30) {
                    alert("Please Enter description atleast 30 char long!!");
                    return false;
                }

                if ($("#icon").val() == "") {
                    alert("Please Enter Skill icon class!!");
                    return false;
                }

                if ($.isNumeric($("#icon").val())) {
                    alert("Icon class alaways be a text!!");
                    return false;
                }
            })
        });
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">

</head>

<body class="bg-light">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow border-0">

                    <div class="card-header bg-primary text-white text-center py-3">
                        <h4 class="mb-0 font-weight-bold">Edit Skill</h4>
                    </div>

                    <div class="card-body p-4" style="background:#f2f2f2;">

                        <form action="edit-skill.php" method="post">

                            <input type="hidden" name="id" value="<?php echo $row['ID']; ?>">

                            <div class="form-group">
                                <label class="font-weight-bold">Title</label>
                                <input type="text" name="tittle" id="tittle" class="form-control"
                                    value="<?php echo $row['Tittle']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Description</label>
                                <input type="text" name="description" id="description" class="form-control"
                                    value="<?php echo $row['Description']; ?>">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Icon</label>
                                <input type="text" name="icon" id="icon" class="form-control"
                                    value="<?php echo $row['Icon']; ?>">
                            </div>

                            <button type="submit" name="submit" id="btnsubmit" class="btn btn-success btn-block mt-3">
                                Submit
                            </button>

                            <a href="skill-table.php" class="btn btn-primary btn-block mt-3">
                                Back
                            </a>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>