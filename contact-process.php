<?php

include "db.php";

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact(name,email,message)
            VALUES('$name','$email','$message')";

    if ($mysqli->query($sql)) {
        header("Location: contact.php?msg=success");
        exit();
    } else {
        echo "Error : " . $mysqli->error;
    }
}
