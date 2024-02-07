<?php
ob_start();
session_start();
?>
<?php

require("../common/db_connect.php");

if (isset($_POST['contact_submit'])) {

    function input_filter($data) // filter input data
    {
        $data = trim($data); // remove wide space
        $data = stripslashes($data); // remove backward slash
        $data = htmlspecialchars($data); // remove special characters
        return $data;
    }

    $name = input_filter($_POST['name']);
    $contact_no = input_filter($_POST['contact_no']);
    $email = input_filter($_POST['email']);
    $location = input_filter($_POST['location']);
    $message = input_filter($_POST['message']);

    $name = mysqli_real_escape_string($con, $name);
    $contact_no = mysqli_real_escape_string($con, $contact_no);
    $email = mysqli_real_escape_string($con, $email);
    $location = mysqli_real_escape_string($con, $location);
    $message = mysqli_real_escape_string($con, $message);

    $query = "INSERT INTO `contact_us`(`name`, `contact_no`, `email`,`location`,`message`) VALUES ('$name','$contact_no','$email','$location','$message')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['success'] = "For Contact Us...!";
        header('location: ../contact_us.php');
        exit();
    } else {
        $_SESSION['error'] = "Details Not Send Successfully";
        header('location: ../contact_us.php');
        exit();
    }
}
