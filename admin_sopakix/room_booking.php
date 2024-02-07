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
                            <h4 style="color: white;padding:8px;">ROOM BOOKING</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Room Booking Data Table</h4>
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Room Type</th>
                                        <th>No of Room</th>
                                        <th>Guest Name</th>
                                        <th>Contact No</th>
                                        <th>Email</th>
                                        <th>Booking Status</th>
                                        <th>Update Action</th>
                                        <th>View Details</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $s_no = 1;
                                    $query = "SELECT * FROM `room_booked`";
                                    $query_run = mysqli_query($con, $query);
                                    $row_check = mysqli_num_rows($query_run) > 0;
                                    if ($row_check) {
                                        while ($row = mysqli_fetch_assoc($query_run)) {

                                            $room_id = $row['room_id'];

                                            // id encrypt 
                                            $u_id = $row['id'] * 525325.24;
                                            $id = base64_encode($u_id);
                                            // id encrypt

                                    ?>
                                            <tr>
                                                <td><?php echo $s_no; ?></td>
                                                <?php
                                                $sql = "SELECT * FROM `room` WHERE `id`='$room_id'";
                                                $sql_run = mysqli_query($con, $sql);
                                                $row_check = mysqli_num_rows($sql_run) > 0;
                                                if ($row_check) {
                                                    while ($res = mysqli_fetch_assoc($sql_run)) {
                                                ?>
                                                        <td><?php echo $res['title']; ?></td>
                                                <?php
                                                    }
                                                }
                                                ?>
                                                <td><?php echo $row['no_of_room']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['contact_no']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <form action="action/status_update.php" method="POST">
                                                    <td>
                                                        <input type="hidden" name="no_of_room" value="<?php echo $row['no_of_room'] ?>">
                                                        <input type="hidden" name="room_id" value="<?php echo $row['room_id'] ?>">
                                                        <select class="form-control" name="status" style="background-color: #d1e1ec;">
                                                            <option value="0" <?php if ($row['status'] == 0) echo "selected"; ?>>Booked</option>
                                                            <option value="1" <?php if ($row['status'] == 1) echo "selected"; ?>>Available</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button type="submit" name="status_update_btn" onclick="return confirm('Are you sure want to Update?')" class="btn btn-secondary"> <i class="fas fa-sync-alt"></i></button>
                                                    </td>
                                                </form>

                                                <td>
                                                    <a href="room_booking_details.php?rb=<?php echo $id; ?>" class="btn btn-secondary btn-sm" title="Delete">
                                                        <i class="fas fa-align-justify"></i>
                                                    </a>
                                                </td>

                                            </tr>
                                    <?php
                                            $s_no++;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <?php include("common/footer.php"); ?>