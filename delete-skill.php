<?php

include "db.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (!($stmt = $mysqli->prepare("DELETE FROM skill WHERE id = ?"))) {
        echo "Prepare Failed:(" . $mysqli->errno . ")" . $mysqli->error;
        die;
    }
    if (!($stmt->bind_param("i", $id))) {
        echo "Binding failed:(" . $mysqli->errno . ")" . $mysqli->error;
        die;
    }

    if ($stmt->execute()) {
        echo "<script>
            alert('Skill Deleted Successfully');
           location.href='skill-table.php';
          </script>";
    } else {
        echo "Delete Failed";
    }
}
?>
