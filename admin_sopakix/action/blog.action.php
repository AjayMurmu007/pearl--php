<?php
ob_start();
session_start();
include('../common/db_connect.php');

// Add Blog Start
if (isset($_POST['blog_add_btn'])) {

    // echo"<pre>";
    // print_r($_POST);
    // print_r($_FILES);
    // exit();
    // echo"</pre>";

    $title = mysqli_real_escape_string($con, $_POST['title']);
    $blog_date = mysqli_real_escape_string($con, $_POST['blog_date']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    // Image
    $image = $_FILES['upload_image']['name'];
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $ext = ["PNG", "png", "JPEG", "jpeg", "jpg", "JPG"];
    if (in_array($image_extension, $ext)) {
        $img_name = rand() . time() . '.' . $image_extension;
        move_uploaded_file($_FILES['upload_image']['tmp_name'], '../images/blog/' . $img_name);
    } else {
        $img_name = "No-Image.png";
    }
    // Image

    $query = "INSERT INTO `blog`(`title`,`blog_date`,`message`,`image`) VALUES ('$title','$blog_date','$message','$img_name')";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['success'] = "Blog Add Successfully";
        header('location: ../blog.php');
        exit();
    } else {
        $_SESSION['error'] = "Blog Not Add Successfully";
        header('location: ../blog.php');
        exit();
    }
}
// Add Blog End

// Edit Blog Start

if (isset($_POST['blog_update_btn'])) {

    $blog_id = $_POST['blog_id'];
    $title = mysqli_real_escape_string($con, $_POST['title']);
    $blog_date = mysqli_real_escape_string($con, $_POST['blog_date']);
    $message = mysqli_real_escape_string($con, $_POST['message']);

    //Image update
    $old_image = $_POST['old_image'];
    $image2 = $_FILES['upload_image']['name'];
    $target_dir = "../images/blog/";
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

    $query = "UPDATE `blog` SET `title`='$title',`blog_date`='$blog_date',`message`='$message',`image`='$filename' WHERE `id`='$blog_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['success'] = "Blog Edit Successfully";
        header('location: ../blog.php');
        exit();
    } else {
        $_SESSION['error'] = "Blog Not Edit Successfully";
        header('location: ../blog.php');
        exit();
    }
}

// Edit Blog End

// Blog Delete Start

if (isset($_GET['QQ']) != '' && isset($_GET['action']) == 'del') {

    // id decrypt 
    $u_id = base64_decode($_GET['QQ']);
    $id = $u_id / 525325.24;
    // id decrypt 

    $blog_id = $id;

    $check_query = "SELECT * FROM `blog` WHERE id='$blog_id'";
    $check_query_run = mysqli_query($con, $check_query);
    foreach ($check_query_run as $row) {

        if ($img_path = "../images/blog/" . $row['image']) {

            $query = "DELETE FROM `blog` WHERE id='$blog_id'";
            $query_run = mysqli_query($con, $query);

            if ($query_run) {
                unlink($img_path);
                $_SESSION['success'] = "Blog Delete Successfully";
                header('location: ../blog.php');
                exit();
            } else {
                $_SESSION['error'] = "Blog Not Delete Successfully";
                header('location: ../blog.php');
                exit();
            }
        }
    }
}

// Blog Delete End
