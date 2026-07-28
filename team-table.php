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
    <title>Team Table</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
</head>

<body class="bg-light">

    <div class="d-flex">

        <?php
        include "sidebar.php";
        include "db.php";
        ?>

        <div class="container-fluid p-2">

            <table class="table table-dark table-striped table-bordered table-hover text-center">

                <tr class="bg-info">
                    <th colspan="9">
                        <a href="add-team.php" class="btn text-light bg-success btn-md float-left">
                            Add <i class="fas fa-plus-circle"></i>
                        </a>
                    </th>
                    <!-- <th>
                        <a href="logout.php" class="btn text-light bg-success btn-md">
                            Log Out
                        </a>
                    </th> -->
                    <h4 class="text-center bg-success p-3">Team Details</h4>
                </tr>

                <tr class="bg-primary">

                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Icon1</th>
                    <th>Icon2</th>
                    <th>Icon3</th>
                    <th>edit</th>
                    <th>Delete</th>

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
            <td>
                <a href='edit-team.php?id=" . $row['ID'] . "' class='btn btn-secondary bg-primary'>
                <i class='fas fa-edit'></i>
                </a>
            </td>

            <td>
                <a href='delete-team.php?id=" . $row['ID'] . "' 
                class='btn btn-secondary bg-danger'
                onclick=\"return confirm('Are you sure?')\">
                <i class='fas fa-trash'></i>
                </a>
            </td>

            </tr>";
                    }
                }
                ?>

            </table>
            <!-- Footer -->
            <?php include "footer.php" ?>

        </div>

    </div>

</body>

</html>