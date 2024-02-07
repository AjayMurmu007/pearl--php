<?php
ob_start();
session_start();
include('../common/db_connect.php');

// Add service Start
if (isset($_POST['submit'])) {

    $title = mysqli_real_escape_string($con, $_POST['title']);

    // Image
    $image = $_FILES['upload_image']['name'];
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $ext = ["PNG", "png", "JPEG", "jpeg", "jpg", "JPG"];
    if (in_array($image_extension, $ext)) {
        $img_name = rand() . time() . '.' . $image_extension;
        move_uploaded_file($_FILES['upload_image']['tmp_name'], '../images/service/' . $img_name);
    } else {
        $img_name = "No-Image.png";
    }
    // Image

    $query = "INSERT INTO `service`(`title`,`image`) VALUES ('$title','$img_name')";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['success'] = "Service Image Add Successfully";
        header('location: ../service.php');
        exit();
    } else {
        $_SESSION['error'] = "Service Image Not Add Successfully";
        header('location: ../service.php');
        exit();
    }
}
// Add service End

// Edit service Start

if (isset($_POST['update'])) {

    $image_id = $_POST['image_id'];
    $title = mysqli_real_escape_string($con, $_POST['title']);

    //Image update
    $old_image = $_POST['old_image'];
    $image2 = $_FILES['upload_image']['name'];
    $target_dir = "../images/service/";
    $target_file = $target_dir . basename($_FILES["upload_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (!$image2 == '') {
        $ext = ["PNG", "png", "JPEG", "jpeg", "jpg", "JPG"];
        if (in_array($imageFileType, $ext)) {
            $filename = rand() . time() . "." . $imageFileType;
        } else {
            $img_name = "No-Image.png";
        }
    } else {
        $filename = $old_image;
    }

    move_uploaded_file($_FILES['upload_image']['tmp_name'], $target_dir . $filename);
    if (!$image2 == '') {
        if (file_exists($target_dir . $old_image)) {
            unlink($target_dir . $old_image);
        }
    }
    //Image update 

    $query = "UPDATE `service` SET `title`='$title',`image`='$filename' WHERE `id`='$image_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['success'] = "Service Image Update Successfully";
        header('location: ../service.php');
        exit();
    } else {
        $_SESSION['error'] = "Service Image Not Update Successfully";
        header('location: ../service.php');
        exit();
    }
}

// Edit service End

// service Delete Start

if (isset($_GET['QQ']) != '' && isset($_GET['action']) == 'del') {

    // id decrypt 
    $u_id = base64_decode($_GET['QQ']);
    $id = $u_id / 525325.24;
    // id decrypt 

    $cat_id = $id;

    $check_query = "SELECT * FROM `service` WHERE id='$cat_id'";
    $check_query_run = mysqli_query($con, $check_query);
    foreach ($check_query_run as $row) {

        if ($img_path = "../images/service/" . $row['image']) {

            $query = "DELETE FROM `service` WHERE id='$cat_id'";
            $query_run = mysqli_query($con, $query);

            if ($query_run) {
                unlink($img_path);
                $_SESSION['success'] = "Service Image Delete Successfully";
                header('location: ../service.php');
                exit();
            } else {
                $_SESSION['error'] = "Service Image Not Delete Successfully";
                header('location: ../service.php');
                exit();
            }
        }
    }
}

// service Delete End
