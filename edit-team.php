 <?php

    include "db.php";
    
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        if (!($stmt = $mysqli->prepare("SELECT * FROM team WHERE id = ?"))) {
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
            $name        = $_POST['name'];
            $description = $_POST['description'];
            $icon1       = $_POST['icon1'];
            $icon2       = $_POST['icon2'];
            $icon3       = $_POST['icon3'];
            $image       = $_FILES['image']['name'];
            $imagetmp    = $_FILES['image']['tmp_name'];

            if (!(empty($_FILES['image']['name']))) {
                $uploads     = "uploads/" . $image;
                move_uploaded_file($imagetmp, $uploads);
                if (!($stmt = $mysqli->prepare("UPDATE team SET name = ?,description = ?,image = ?,icon1 = ?,icon2 = ?, icon3 = ? WHERE id = ? "))) {
                    echo "Prepare Failed(" . $mysqli->errno . ")" . $mysqli->error;
                    die();
                }


                if (!($stmt->bind_param("ssssssi", $name, $description, $image, $icon1, $icon2, $icon3, $id))) {
                    echo "Binding Failed(" . $mysqli->errno . ")" . $mysqli->error;
                    die();
                }
            } else {
                if (!($stmt = $mysqli->prepare("UPDATE team SET name = ?,description = ?,icon1 = ?,icon2 = ?,icon3 = ?  WHERE id = ? "))) {
                    echo "Prepare Failed(" . $mysqli->errno . ")" . $mysqli->error;
                    die();
                }

                if (!($stmt->bind_param("sssssi", $name, $description, $icon1, $icon2, $icon3, $id))) {
                    echo "Binding Failed(" . $mysqli->errno . ")" . $mysqli->error;
                    die();
                }
            }

            if ($stmt->execute()) {
                header("Location:team-table.php");
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
     <title>Update Team Member</title>
     <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"
         integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8="
         crossorigin="anonymous"></script>

     <script>
         $(document).ready(function() {
             $("#btnsubmit").click(function() {
                 if ($("#name").val() == "") {
                     alert("Please Enter Team member Name!!");
                     return false;
                 }

                 if ($.isNumeric($("#name").val())) {
                     alert("Team Member Name Should be Alfhabetic !!");
                     return false;
                 }
                 if ($("#name").val().length < 3) {
                     alert("Please Enter Name atleast 3 char long!!");
                     return false;
                 }

                 if ($("#description").val() == "") {
                     alert("Please Enter team description!!");
                     return false;
                 }
                 if ($("#description").val().length < 30) {
                     alert("Team description atleast 30 char long!!");
                     return false;
                 }

                 if ($.isNumeric($("#description").val())) {
                     alert("Please Enter Alfabetic Project description!!");
                     return false;
                 }

                 if ($("#icon1").val() == "") {
                     alert("Please Enter first icon class!!");
                     return false;
                 }
                 if ($.isNumeric($("#icon1").val())) {
                     alert("Icon class Should be Alfhabetic !!");
                     return false;
                 }


                 if ($("#icon2").val() == "") {
                     alert("Please Enter Second icon class!!");
                     return false;
                 }
                 if ($.isNumeric($("#icon2").val())) {
                     alert("Icon class Should be Alfhabetic !!");
                     return false;
                 }
                 if ($("#icon3").val() == "") {
                     alert("Please Enter third icon class!!");
                     return false;
                 }
                 if ($.isNumeric($("#icon3").val())) {
                     alert("Icon class Should be Alfhabetic !!");
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
                         <h4 class="mb-0 font-weight-bold">Add Team Member</h4>
                     </div>

                     <div class="card-body p-4" style="background:#f2f2f2;">

                         <form action="edit-team.php" method="post" enctype="multipart/form-data">
                             <input type="hidden" name="id" id="id" value="<?php echo $row['ID']; ?>">


                             <div class="form-group">
                                 <label class="font-weight-bold">Name</label>
                                 <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['Name']; ?> " placeholder="Enter Team Member Name">
                             </div>

                             <div class="form-group">
                                 <label class="font-weight-bold">Description</label>
                                 <input type="text" name="description" id="description" class="form-control" value="<?php echo $row['Description']; ?> " placeholder="Enter Description">
                             </div>

                             <div class="form-group">
                                 <label class="font-weight-bold">Image</label>
                                 <input type="file" name="image" id="image" class="form-control" value="<?php echo $row['Image']; ?> " placeholder="Upload Image">
                             </div>

                             <div class="form-group">
                                 <label class="font-weight-bold">Icon 1</label>
                                 <input type="text" name="icon1" id="icon1" class="form-control" value="<?php echo $row['Icon1']; ?> " placeholder="Enter First Icon Class">
                             </div>

                             <div class="form-group">
                                 <label class="font-weight-bold">Icon 2</label>
                                 <input type="text" name="icon2" id="icon2" class="form-control" value="<?php echo $row['Icon2']; ?> " required placeholder="Enter First Icon Class">
                             </div>

                             <div class="form-group">
                                 <label class="font-weight-bold">Icon 3</label>
                                 <input type="text" name="icon3" id="icon3" class="form-control" value="<?php echo $row['Icon3']; ?> " required placeholder="Enter First Icon Class">
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