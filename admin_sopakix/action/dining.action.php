<?php
ob_start();
session_start();
include('../common/db_connect.php');

// Add service Start
if (isset($_POST['submit'])) {

    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    // Image
    $image = $_FILES['upload_image']['name'];
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $ext = ["PNG", "png", "JPEG", "jpeg", "jpg", "JPG"];
    if (in_array($image_extension, $ext)) {
        $img_name = rand() . time() . '.' . $image_extension;
        move_uploaded_file($_FILES['upload_image']['tmp_name'], '../images/dining/' . $img_name);
    } else {
        $img_name = "No-Image.png";
    }
    // Image

    $query = "INSERT INTO `dining`(`title`, `image`, `description`) VALUES ('$title','$img_name','$description')";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['success'] = "Dining Details Add Successfully";
        header('location: ../dining.php');
        exit();
    } else {
        $_SESSION['error'] = "Dining Details Not Add Successfully";
        header('location: ../dining.php');
        exit();
    }
}
// Add service End

// Edit service Start

if (isset($_POST['update'])) {

    $dining_id = $_POST['dining_id'];
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    //Image update
    $old_image = $_POST['old_image'];
    $image2 = $_FILES['upload_image']['name'];
    $target_dir = "../images/dining/";
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

    $query = "UPDATE `dining` SET `title`='$title',`image`='$filename',`description`='$description' WHERE `id`='$dining_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['success'] = "Details Edit Successfully";
        header('location: ../dining.php');
        exit();
    } else {
        $_SESSION['error'] = "Details Not Edit Successfully";
        header('location: ../dining.php');
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

    $check_query = "SELECT * FROM `dining` WHERE id='$cat_id'";
    $check_query_run = mysqli_query($con, $check_query);
    foreach ($check_query_run as $row) {

        if ($img_path = "../images/dining/" . $row['image']) {

            $query = "DELETE FROM `dining` WHERE id='$cat_id'";
            $query_run = mysqli_query($con, $query);

            if ($query_run) {
                unlink($img_path);
                $_SESSION['success'] = "Dining Delete Successfully";
                header('location: ../dining.php');
                exit();
            } else {
                $_SESSION['error'] = "Dining Not Delete Successfully";
                header('location: ../dining.php');
                exit();
            }
        }
    }
}

// service Delete End
