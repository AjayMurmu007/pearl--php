<?php
ob_start();
session_start();
include('../common/db_connect.php');
if (isset($_POST['update'])) {

    $name = $_POST['username'];
    $password = $_POST['password'];
    $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE `admin` SET `username`='$name',`password`='$hashedpassword'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['success'] = "Profile Update Successfully";
        header('location: ../profile_update.php');
        exit();
    } else {
        $_SESSION['error'] = "Profile Not Update Successfully";
        header('location: ../profile_update.php');
        exit();
    }
}
