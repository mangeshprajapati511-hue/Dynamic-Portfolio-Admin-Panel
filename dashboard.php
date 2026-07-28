<?php
session_start();

if (!isset($_SESSION['loggedIn'])) {
    header('Location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">


</head>

<body>


    <h3 class="bg-primary text-white p-4 text-center sticky-top">Welcome To Admin Panel</h3>
    <div class="container-fluid">
        <div class="d-flex flex-column flex-md-row">

            <?php include "sidebar.php"; ?>
            <?php include "db.php"; ?>

            <div class="flex-fill p-3">

                <!-- ================= SKILL ================= -->

                <h4 class="bg-success text-white p-3 text-center">Skill Details</h4>

                <div class="table-responsive mb-4">
                    <table class="table table-dark table-striped table-bordered table-hover text-center">

                        <tr class="bg-primary">
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Icon</th>
                        </tr>

                        <?php
                        $res = $mysqli->query("select * from skill");
                        if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) {
                                echo "<tr>
                        <td>{$row['ID']}</td> 
                        <td>{$row['Tittle']}</td> 
                        <td>" . ((strlen($row['Description']) > 50) ? substr($row['Description'], 0, 50) . '...' : $row['Description']) . "</td> 
                        <td><i class='{$row['Icon']}'></i></td>
                     </tr>";
                            }
                        }
                        ?>
                    </table>
                </div>

                <!-- ================= PROJECT ================= -->

                <h4 class="bg-success text-white p-3 text-center">Project Details</h4>

                <div class="table-responsive mb-4">
                    <table class="table table-dark table-striped table-bordered table-hover text-center">

                        <tr class="bg-primary">
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                        </tr>

                        <?php
                        $res = $mysqli->query("select * from project");
                        if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) {
                                echo "<tr>
                        <td>{$row['ID']}</td> 
                        <td>{$row['Tittle']}</td> 
                        <td>" . ((strlen($row['Description']) > 50) ? substr($row['Description'], 0, 50) . '...' : $row['Description']) . "</td>              
                        <td><img src='uploads/" . $row['Image'] . "' width='80'></td>
                     </tr>";
                            }
                        }
                        ?>
                    </table>
                </div>

                <!-- ================= TEAM ================= -->

                <h4 class="bg-success text-white p-3 text-center">Team Details</h4>

                <div class="table-responsive mb-4">
                    <table class="table table-dark table-striped table-bordered table-hover text-center">

                        <tr class="bg-primary">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Icon1</th>
                            <th>Icon2</th>
                            <th>Icon3</th>
                        </tr>

                        <?php
                        $res = $mysqli->query("select * from team");
                        if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) {
                                echo "<tr>
                        <td>{$row['ID']}</td> 
                        <td>{$row['Name']}</td> 
                        <td>" . ((strlen($row['Description']) > 25) ? substr($row['Description'], 0, 25) . '...' : $row['Description']) . "</td>                
                        <td><img src='uploads/" . $row['Image'] . "' width='80'></td>
                        <td><i class='{$row['Icon1']}'></i></td>               
                        <td><i class='{$row['Icon2']}'></i></td>
                        <td><i class='{$row['Icon3']}'></i></td>
                     </tr>";
                            }
                        }
                        ?>
                    </table>
                </div>

                <!-- ================= PROGRESS ================= -->

                <h4 class="bg-success text-white p-3 text-center">Progress Details</h4>

                <div class="table-responsive mb-4">
                    <table class="table table-dark table-striped table-bordered table-hover text-center">

                        <tr class="bg-primary">
                            <th>ID</th>
                            <th>Course</th>
                            <th>Percentage</th>
                            <th>Color</th>
                        </tr>

                        <?php
                        $res = $mysqli->query("select * from progress");
                        if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) {
                                echo "<tr>
                        <td>{$row['ID']}</td>
                        <td>{$row['Course']}</td>
                        <td>{$row['Percentage']}</td>
                        <td>{$row['Color']}</td>
                     </tr>";
                            }
                        }
                        ?>
                    </table>
                </div>

            </div>

        </div>

    </div>

</body>

</html>