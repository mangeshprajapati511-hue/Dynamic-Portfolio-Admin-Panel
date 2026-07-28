 <?php

    $mysqli = new mysqli('localhost', 'root', '', 'proj_2');

    if ($mysqli->connect_errno) {
        echo 'Failed to connect to Mysql:' . $mysqli->connect_error;
        die;
    }

    ?> 