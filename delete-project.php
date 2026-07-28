 <?php

include "db.php";

    if (isset($_GET['id'])) {

        $id = $_GET['id'];
        if (!($stmt = $mysqli->prepare("DELETE FROM project WHERE id = ?"))) {
            echo "Prepare Failed:(" . $mysqli->errno . ")" . $mysqli->error;
            die; 
        }
        if (!($stmt->bind_param("i", $id))) {
            echo "Binding failed:(" . $mysqli->errno . ")" . $mysqli->error;
            die;
        }
        if ($stmt->execute()) {
            header("Location:project-table.php");
            exit(); 
        }
    }
    ?> 