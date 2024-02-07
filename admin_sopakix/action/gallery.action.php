<?php
ob_start();
session_start();
include('../common/db_connect.php');

// Add Gallery Start
if (isset($_POST['submit'])) {

    $title = mysqli_real_escape_string($con, $_POST['title']);

    // Image
    $image = $_FILES['upload_image']['name'];
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $ext = ["PNG", "png", "JPEG", "jpeg", "jpg", "JPG"];
    if (in_array($image_extension, $ext)) {
        $img_name = rand() . time() . '.' . $image_extension;
        move_uploaded_file($_FILES['upload_image']['tmp_name'], '../images/gallery/' . $img_name);
    } else {
        $img_name = "No-Image.png";
    }
    // Image

    $query = "INSERT INTO `gallery`(`title`,`image`) VALUES ('$title','$img_name')";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['success'] = "Gallery Image Add Successfully";
        header('location: ../gallery.php');
        exit();
    } else {
        $_SESSION['error'] = "Gallery Image Not Add Successfully";
        header('location: ../gallery.php');
        exit();
    }
}
// Add Gallery End

// Edit Gallery Start

if (isset($_POST['update'])) {

    $image_id = $_POST['image_id'];
    $title = mysqli_real_escape_string($con, $_POST['title']);

    //Image update
    $old_image = $_POST['old_image'];
    $image2 = $_FILES['upload_image']['name'];
    $target_dir = "../images/gallery/";
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

    $query = "UPDATE `gallery` SET `title`='$title',`image`='$filename' WHERE `id`='$image_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['success'] = "Gallery Image Update Successfully";
        header('location: ../gallery.php');
        exit();
    } else {
        $_SESSION['error'] = "Gallery Image Not Update Successfully";
        header('location: ../gallery.php');
        exit();
    }
}

// Edit Gallery End

// Gallery Delete Start

if (isset($_GET['QQ']) != '' && isset($_GET['action']) == 'del') {

    // id decrypt 
    $u_id = base64_decode($_GET['QQ']);
    $id = $u_id / 525325.24;
    // id decrypt 

    $cat_id = $id;

    $check_query = "SELECT * FROM `gallery` WHERE id='$cat_id'";
    $check_query_run = mysqli_query($con, $check_query);
    foreach ($check_query_run as $row) {

        if ($img_path = "../images/gallery/" . $row['image']) {

            $query = "DELETE FROM `gallery` WHERE id='$cat_id'";
            $query_run = mysqli_query($con, $query);

            if ($query_run) {
                unlink($img_path);
                $_SESSION['success'] = "Gallery Image Delete Successfully";
                header('location: ../gallery.php');
                exit();
            } else {
                $_SESSION['error'] = "Gallery Image Not Delete Successfully";
                header('location: ../gallery.php');
                exit();
            }
        }
    }
}

// Gallery Delete End
