<?php
include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (!($stmt = $mysqli->prepare("SELECT * FROM project WHERE id = ?"))) {
        echo "Failed Prepared(" . $mysqli->errno . ")" . $mysqli->error;
        die();
    }

    if (!($stmt->bind_param("i", $id))) {
        echo "Failed binding(" . $mysqli->errno . ")" . $mysqli->error;
    }

    $stmt->execute();
    $res = $stmt->get_result();    
    if ($res->num_rows > 0) {
        
        $row = $res->fetch_assoc(); 
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $id          = $_POST['id'];
        $tittle      = $_POST['tittle'];
        $description = $_POST['description'];
        $image       = $_FILES['image']['name'];
        $imagetmp    = $_FILES['image']['tmp_name'];


        if (!(empty($_FILES['image']['name']))) {
            $uploads     = "uploads/" . $image;
            move_uploaded_file($imagetmp, $uploads);
            if (!($stmt = $mysqli->prepare("UPDATE project SET tittle = ?,description = ?,image = ? WHERE id = ? "))) {
                echo "Prepare Failed(" . $mysqli->errno . ")" . $mysqli->error;
                die();
            }

            if (!($stmt->bind_param("sssi", $tittle, $description, $image, $id))) {
                echo "Binding Failed(" . $mysqli->errno . ")" . $mysqli->error;
                die();
            }
        } else {
            if (!($stmt = $mysqli->prepare("UPDATE project SET tittle = ?,description = ?  WHERE id = ? "))) {
                echo "Prepare Failed(" . $mysqli->errno . ")" . $mysqli->error;
                die();
            }

            if (!($stmt->bind_param("ssi", $tittle, $description, $id))) {
                echo "Binding Failed(" . $mysqli->errno . ")" . $mysqli->error;
                die();
            }
        }

        if ($stmt->execute()) {
            header("Location:project-table.php");
        } else
            echo "failed:(" . $mysqli->errno . ")" . $mysqli->error;
        die;
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
        integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8="
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $("#btnsubmit").click(function() {
                if ($("#tittle").val() == "") {
                    alert("Please Enter Project Name!!");
                    return false;
                }
                if ($("#tittle").val().length < 3) {
                    alert("Please Enter Name atleast 3 char long!!");
                    return false;
                }

                if ($.isNumeric($("#tittle").val())) {
                    alert("Project Name Should be Alfhabetic !!");
                    return false;
                }

                if ($("#description").val() == "") {
                    alert("Please Enter Project description description!!");
                    return false;
                }

                if ($.isNumeric($("#description").val())) {
                    alert("Please Enter Alfabetic Project description!!");
                    return false;
                }
                if ($("#description").val().length < 30) {
                    alert("Please Enter Name atleast 30 char long!!");
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
                        <h4 class="mb-0 font-weight-bold">Update Project</h4>
                    </div>

                    <div class="card-body p-4" style="background:#f2f2f2;">

                        <form action="edit-project.php" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="id" id="id" value="<?php echo $row['ID']; ?>">

                            <div class="form-group">
                                <label class="font-weight-bold">Title</label>
                                <input type="text" name="tittle" id="tittle" class="form-control"
                                    value="<?php echo $row['Tittle']; ?>"
                                    placeholder="Enter Title Name">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Description</label>
                                <input type="text" name="description" id="description" class="form-control"
                                    value="<?php echo $row['Description']; ?>"
                                    placeholder="Enter Description">
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Image</label>
                                <input type="file" name="image" id="id" class="form-control">
                            </div>

                            <button type="submit" name="submit" id="btnsubmit" class="btn btn-success btn-block mt-3">
                                Submit
                            </button>

                            <a href="project-table.php" class="btn btn-primary btn-block mt-3">
                                Back
                            </a>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>

</body>