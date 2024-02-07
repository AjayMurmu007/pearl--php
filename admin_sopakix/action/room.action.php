<?php
ob_start();
session_start();
include('../common/db_connect.php');

// Add Room Start
if (isset($_POST['room_add_btn'])) {

    $title = mysqli_real_escape_string($con, $_POST['title']);
    $rate = mysqli_real_escape_string($con, $_POST['rate']);
    $no_of_room = mysqli_real_escape_string($con, $_POST['no_of_room']);
    $ac = mysqli_real_escape_string($con, $_POST['ac']);
    $wifi = mysqli_real_escape_string($con, $_POST['wifi']);
    $hair_dryer = mysqli_real_escape_string($con, $_POST['hair_dryer']);
    $breakfast = mysqli_real_escape_string($con, $_POST['breakfast']);
    $laundry = mysqli_real_escape_string($con, $_POST['laundry']);
    $ro_water = mysqli_real_escape_string($con, $_POST['ro_water']);
    $feature = mysqli_real_escape_string($con, $_POST['feature']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    // Image
    $image = $_FILES['upload_image']['name'];
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $ext = ["PNG", "png", "JPEG", "jpeg", "jpg", "JPG"];
    if (in_array($image_extension, $ext)) {
        $img_name = rand() . time() . '.' . $image_extension;
        move_uploaded_file($_FILES['upload_image']['tmp_name'], '../images/room/' . $img_name);
    } else {
        $img_name = "No-Image.png";
    }
    // Image

    $query = "INSERT INTO `room`(`title`, `rate`, `no_of_room`, `image`, `ac`, `wifi`, `hair_dryer`, `breakfast`, `laundry`, `ro_water`, `feature`, `description`) VALUES ('$title','$rate','$no_of_room','$img_name','$ac','$wifi','$hair_dryer','$breakfast','$laundry','$ro_water','$feature','$description')";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['success'] = "Room Add Successfully";
        header('location: ../room.php');
        exit();
    } else {
        $_SESSION['error'] = "Room Not Add Successfully";
        header('location: ../room.php');
        exit();
    }
}
// Add Room End

// Edit Room Start

if (isset($_POST['room_update_btn'])) {

    $room_id = $_POST['room_id'];
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $rate = mysqli_real_escape_string($con, $_POST['rate']);
    $no_of_room = mysqli_real_escape_string($con, $_POST['no_of_room']);
    $ac = mysqli_real_escape_string($con, $_POST['ac']);
    $wifi = mysqli_real_escape_string($con, $_POST['wifi']);
    $hair_dryer = mysqli_real_escape_string($con, $_POST['hair_dryer']);
    $breakfast = mysqli_real_escape_string($con, $_POST['breakfast']);
    $laundry = mysqli_real_escape_string($con, $_POST['laundry']);
    $ro_water = mysqli_real_escape_string($con, $_POST['ro_water']);
    $feature = mysqli_real_escape_string($con, $_POST['feature']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    //Image update
    $old_image = $_POST['old_image'];
    $image2 = $_FILES['upload_image']['name'];
    $target_dir = "../images/room/";
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

    $query = "UPDATE `room` SET `title`='$title',`rate`='$rate',`no_of_room`='$no_of_room',`image`='$filename',`ac`='$ac',`wifi`='$wifi',`hair_dryer`='$hair_dryer',`breakfast`='$breakfast',`laundry`='$laundry',`ro_water`='$ro_water',`feature`='$feature',`description`='$description' WHERE `id` = '$room_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['success'] = "Room Edit Successfully";
        header('location: ../room.php');
        exit();
    } else {
        $_SESSION['error'] = "Room Not Edit Successfully";
        header('location: ../room.php');
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

    $room_id = $id;

    $check_query = "SELECT * FROM `room` WHERE id = '$room_id'";
    $check_query_run = mysqli_query($con, $check_query);
    foreach ($check_query_run as $row) {

        if ($img_path = "../images/room/" . $row['image']) {

            $query = "DELETE FROM `room` WHERE id = '$room_id'";
            $query_run = mysqli_query($con, $query);

            if ($query_run) {

                unlink($img_path);
                unlink($icon_path);

                $_SESSION['success'] = "Room Delete Successfully";
                header('location: ../room.php');
                exit();
            } else {

                $_SESSION['error'] = "Room Not Delete Successfully";
                header('location: ../room.php');
                exit();
            }
        }
    }
}

// Room Delete End
