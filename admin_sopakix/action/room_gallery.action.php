<?php
ob_start();
session_start();
include('../common/db_connect.php');

// Add room Gallery Start
if (isset($_POST['submit'])) {

    $room = mysqli_real_escape_string($con, $_POST['room']);
    $title = mysqli_real_escape_string($con, $_POST['title']);

    // Image
    $image = $_FILES['upload_image']['name'];
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $ext = ["PNG", "png", "JPEG", "jpeg", "jpg", "JPG"];
    if (in_array($image_extension, $ext)) {
        $img_name = 'Img' .'-'. rand() . time() . '.' . $image_extension;
        move_uploaded_file($_FILES['upload_image']['tmp_name'], '../images/room_images/' . $img_name);
    } else {
        $img_name = "No-Image.png";
    }
    // Image

    $query = "INSERT INTO `room_gallery`(`room_id`, `title`, `image`) VALUES ('$room','$title','$img_name')";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['success'] = "Room Image Add Successfully";
        header('location: ../room_gallery.php');
        exit();
    } else {
        $_SESSION['error'] = "Room Image Not Add Successfully";
        header('location: ../room_gallery.php');
        exit();
    }
}
// Add room Gallery End

// Edit room Gallery Start

if (isset($_POST['update'])) {

    $image_id = $_POST['room_image_id'];
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $room = mysqli_real_escape_string($con, $_POST['room']);

    //Image update
    $old_image = $_POST['old_image'];
    $image2 = $_FILES['upload_image']['name'];
    $target_dir = "../images/room_images/";
    $target_file = $target_dir . basename($_FILES["upload_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (!$image2 == '') {
        $ext = ["PNG", "png", "JPEG", "jpeg", "jpg", "JPG"];
        if (in_array($imageFileType, $ext)) {
            $filename = 'Img' .'-'. rand() . time() . "." . $imageFileType;
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

    $query = "UPDATE `room_gallery` SET `room_id`='$room',`title`='$title',`image`='$filename' WHERE `id`='$image_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['success'] = "Details Image Update Successfully";
        header('location: ../room_gallery.php');
        exit();
    } else {
        $_SESSION['error'] = "Details Image Not Update Successfully";
        header('location: ../room_gallery.php');
        exit();
    }
}

// Edit Service Gallery End

// Service Gallery Delete Start

if (isset($_GET['QQ']) != '' && isset($_GET['action']) == 'del') {

    // id decrypt 
    $u_id = base64_decode($_GET['QQ']);
    $id = $u_id / 525325.24;
    // id decrypt 

    $img_id = $id;

    $check_query = "SELECT * FROM `room_gallery` WHERE id='$img_id'";
    $check_query_run = mysqli_query($con, $check_query);
    foreach ($check_query_run as $row) {

        if ($img_path = "../images/room_images/" . $row['image']) {

            $query = "DELETE FROM `room_gallery` WHERE id='$img_id'";
            $query_run = mysqli_query($con, $query);

            if ($query_run) {
                unlink($img_path);
                $_SESSION['success'] = "Room Gallery Image Delete Successfully";
                header('location: ../room_gallery.php');
                exit();
            } else {
                $_SESSION['error'] = "Room Gallery Image Not Delete Successfully";
                header('location: ../room_gallery.php');
                exit();
            }
        }
    }
}

// Service Gallery Delete End
