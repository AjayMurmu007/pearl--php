<?php include("common/header.php"); ?>
<?php include("common/sidebar.php"); ?>
<?php include('common/db_connect.php'); ?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <?php include("common/alert_msg.php"); ?>
                        <!-- <h6 class="page-title">Form Validation</h6> -->
                        <div class="card-header" style="background-color:#626ed4;height:45px;">
                            <h4 style="color: white;padding:8px;">ROOM BOOKING DETAILS</h4>
                            <a href="room_booking.php" class="btn btn-dark" style="margin-top:-43px;float:right;margin-right:5px;">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <?php
                if (isset($_GET['rb'])) {

                    // id decrypt 
                    $u_id = base64_decode($_GET['rb']);
                    $id = $u_id / 525325.24;
                    // id decrypt 

                    $query = "SELECT * FROM `room_booked` WHERE `id`='$id'";
                    $query_run = mysqli_query($con, $query);
                    $row_check = mysqli_num_rows($query_run) > 0;
                    if ($row_check) {
                        while ($row = mysqli_fetch_assoc($query_run)) {

                            $room_id = $row['room_id'];

                ?>
                            <div class="col-xl-3">
                                <div class="user-sidebar">

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="mt-n4 position-relative">
                                                <div class="text-center mt-3">
                                                    <img src="images/1.png" alt="" class="avatar-xl rounded-circle img-thumbnail">
                                                    <div class="mt-3">
                                                        <h5 class=""><?php echo $row['name']; ?> </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="card-header">
                                            <h4 class="card-title">Profile Details</h4>
                                        </div> -->
                                        <div class="card-body">
                                            <ul class="list-unstyled mb-0">
                                                <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">Guest Name</span><span><?php echo $row['name']; ?></span></li>
                                                <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">Contact No</span><span><?php echo $row['contact_no']; ?></span></li>
                                                <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">Email</span><span><?php echo $row['email']; ?></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-9">
                                <div class="card">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#about" role="tab">
                                                <i class="bx bx-user-circle font-size-20"></i>
                                                <span class="d-none d-sm-block">Room Booking Details</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- Tab content -->
                                    <div class="tab-content p-4">
                                        <div class="tab-pane active" id="about" role="tabpanel">
                                            <div>
                                                <div>
                                                    <!-- <h5 class="font-size-16 mb-4">Projects</h5> -->
                                                    <ul class="list-unstyled mb-0">
                                                        <?php
                                                        $sql = "SELECT * FROM `room` WHERE `id`='$room_id'";
                                                        $sql_run = mysqli_query($con, $sql);
                                                        $row_check = mysqli_num_rows($sql_run) > 0;
                                                        if ($row_check) {
                                                            while ($res = mysqli_fetch_assoc($sql_run)) {

                                                        ?>
                                                                <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">Room Type</span><span><?php echo $res['title']; ?></span></li>
                                                        <?php
                                                            }
                                                        }
                                                        ?>
                                                        <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">Total Price</span><span> &#8377; <?php echo $row['price']; ?> /-</span></li>
                                                        <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">Check-In</span><span><?php echo $row['check_in']; ?></span></li>
                                                        <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">Check-Out</span><span><?php echo $row['check_out']; ?></span></li>
                                                        <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">Adult</span><span><?php echo $row['adult']; ?></span></li>
                                                        <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">Child</span><span><?php echo $row['child']; ?></span></li>
                                                        <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">No. of Room</span><span><?php echo $row['no_of_room']; ?></span></li>
                                                        <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">Booking Date & Time</span><span><?php echo $row['booked_on']; ?></span></li>
                                                       
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    }
                }
                ?>
            </div>
            <!--end row-->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <?php include("common/footer.php"); ?>