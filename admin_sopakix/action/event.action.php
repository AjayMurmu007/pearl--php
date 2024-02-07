<?php
ob_start();
session_start();
include('../common/db_connect.php');

// Add Room Start
if (isset($_POST['event_add_btn'])) {

    $title = mysqli_real_escape_string($con, $_POST['title']);
    $feature = mysqli_real_escape_string($con, $_POST['feature']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    // Image
    $image = $_FILES['upload_image']['name'];
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $ext = ["PNG", "png", "JPEG", "jpeg", "jpg", "JPG"];
    if (in_array($image_extension, $ext)) {
        $img_name = rand() . time() . '.' . $image_extension;
        move_uploaded_file($_FILES['upload_image']['tmp_name'], '../images/event/' . $img_name);
    } else {
        $img_name = "No-Image.png";
    }
    // Image

    $query = "INSERT INTO `event`(`title`, `image`, `feature`, `description`) VALUES ('$title','$img_name','$feature','$description')";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['success'] = "Details Add Successfully";
        header('location: ../event.php');
        exit();
    } else {
        $_SESSION['error'] = "Details Not Add Successfully";
        header('location: ../event.php');
        exit();
    }
}
// Add Room End

// Edit Room Start

if (isset($_POST['event_update_btn'])) {

    $event_id = $_POST['event_id'];
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $feature = mysqli_real_escape_string($con, $_POST['feature']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    //Image update
    $old_image = $_POST['old_image'];
    $image2 = $_FILES['upload_image']['name'];
    $target_dir = "../images/event/";
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

    $query = "UPDATE `event` SET `title`='$title',`image`='$filename',`feature`='$feature',`description`='$description' WHERE `id`='$event_id'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['success'] = "Details Edit Successfully";
        header('location: ../event.php');
        exit();
    } else {
        $_SESSION['error'] = "Details Not Edit Successfully";
        header('location: ../event.php');
        exit();
    }
}

// Edit Room End

// Room Delete Start

if (isset($_GET['QQ']) != '' && isset($_GET['action']) == 'del') {

    // id decrypt 
    $u_id = base64_decode($_GET['QQ']);
    $id = $u_id / 525325.24;
    // id decrypt 

    $event_id = $id;

    $check_query = "SELECT * FROM `event` WHERE id = '$event_id'";
    $check_query_run = mysqli_query($con, $check_query);
    foreach ($check_query_run as $row) {

        if ($img_path = "../images/event/" . $row['image']) {

            $query = "DELETE FROM `event` WHERE id = '$event_id'";
            $query_run = mysqli_query($con, $query);

            if ($query_run) {

                unlink($img_path);
                unlink($icon_path);

                $_SESSION['success'] = "Details Delete Successfully";
                header('location: ../event.php');
                exit();
            } else {

                $_SESSION['error'] = "Details Not Delete Successfully";
                header('location: ../event.php');
                exit();
            }
        }
    }
}

// Room Delete End
