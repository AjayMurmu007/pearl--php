<?php
ob_start();
session_start();
?>
<?php

require("../common/db_connect.php");

if (isset($_POST['book_btn'])) {

    // echo "<pre>";
    // print_r($_POST);
    // exit();
    // echo "</pre>";

    function input_filter($data)
    {
        $data = trim($data); // remove wide space
        $data = stripslashes($data); // remove backward slash
        $data = htmlspecialchars($data); // remove special characters
        return $data;
    }

    $room_id = input_filter($_POST['room_id']);
    $name = input_filter($_POST['name']);
    $contact_no = input_filter($_POST['contact_no']);
    $email = input_filter($_POST['email']);
    $date_of_checkin = input_filter($_POST['date_of_checkin']);
    $date_of_checkout = input_filter($_POST['date_of_checkout']);
    $adult = input_filter($_POST['adult']);
    $child = input_filter($_POST['child']);
    $no_of_room = input_filter($_POST['no_of_room']);
    $total_price = input_filter($_POST['total_room_price']);

    $room_id = mysqli_real_escape_string($con, $room_id);
    $name = mysqli_real_escape_string($con, $name);
    $contact_no = mysqli_real_escape_string($con, $contact_no);
    $email = mysqli_real_escape_string($con, $email);
    $date_of_checkin = mysqli_real_escape_string($con, $date_of_checkin);
    $date_of_checkout = mysqli_real_escape_string($con, $date_of_checkout);
    $adult = mysqli_real_escape_string($con, $adult);
    $child = mysqli_real_escape_string($con, $child);
    $no_of_room = mysqli_real_escape_string($con, $no_of_room);
    $total_price = mysqli_real_escape_string($con, $total_price);

    $query = "INSERT INTO `room_booked`(`room_id`, `name`, `contact_no`, `email`, `check_in`, `check_out`, `adult`, `child`, `no_of_room`, `price`) VALUES ('$room_id','$name','$contact_no','$email','$date_of_checkin','$date_of_checkout','$adult','$child','$no_of_room','$total_price')";

    $query_run = mysqli_query($con, $query);
    if ($query_run) {

        // Room quantity (-) update start
        $qty_update = "SELECT * FROM `room` WHERE `id`='$room_id' ";
        $qty_update_run = mysqli_query($con, $qty_update);
        $qty_update_data = mysqli_fetch_array($qty_update_run);
        $current_qty = $qty_update_data['no_of_room'];

        $new_qty = $current_qty - $no_of_room;

        $update = "UPDATE room SET no_of_room='$new_qty' WHERE id='$room_id'";
        $update_run = mysqli_query($con, $update);
        // Room quantity (-) update end

        $_SESSION['success'] = "For Booking!...";
        // header('location: ../rooms.php?rd');
        header('location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        $_SESSION['error'] = "Booking Not Successfully Done!...";
        // header('location: ../rooms.php');
        header('location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}

?>
