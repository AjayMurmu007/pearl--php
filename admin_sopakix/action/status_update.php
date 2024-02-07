<?php
ob_start();
session_start();
include('../common/db_connect.php');

if (isset($_POST['status_update_btn'])) {

    $status = $_POST['status'];
    $room_id = $_POST['room_id'];
    $no_of_room = $_POST['no_of_room'];



    // Room quantity (+) update start
    $qty_update = "SELECT * FROM `room` WHERE `id`='$room_id' ";
    $qty_update_run = mysqli_query($con, $qty_update);
    $qty_update_data = mysqli_fetch_array($qty_update_run);
    $current_qty = $qty_update_data['no_of_room'];

    $new_qty = $current_qty + $no_of_room;
    // Room quantity (+) update start


    $query = "UPDATE `room` SET `no_of_room`='$new_qty' WHERE `id`='$room_id'";

    $query_run = mysqli_query($con, $query) or die('Query one is failed' . mysqli_error($con));

    if ($query_run == 1) {

        $query2 = "UPDATE `room_booked` SET `status`='$status' WHERE `room_id`='$room_id'";
        $query2_run = mysqli_query($con, $query2) or die('Query two is failed' . mysqli_error($con));

        if ($query2_run) {
            $_SESSION['success'] = "Status Update Successfully";
            header('location: ../room_booking.php');
            exit();
        } else {
            $_SESSION['error'] = "Status Not Update Successfully";
            header('location: ../room_booking.php');
            exit();
        }
    }
}


?>

<!-- Status Update End -->