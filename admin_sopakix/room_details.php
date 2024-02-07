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
                            <h4 style="color: white;padding:8px;">ROOM DETAILS</h4>
                            <a href="room.php" class="btn btn-dark" style="margin-top:-43px;float:right;margin-right:5px;">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <?php
                if (isset($_GET['rd'])) {

                    // id decrypt 
                    $u_id = base64_decode($_GET['rd']);
                    $id = $u_id / 525325.24;
                    // id decrypt 

                    $query = "SELECT * FROM `room` WHERE `id`='$id'";
                    $query_run = mysqli_query($con, $query);
                    $row_check = mysqli_num_rows($query_run) > 0;
                    if ($row_check) {
                        while ($row = mysqli_fetch_assoc($query_run)) {



                ?>

                            <div class="col-xl-2"></div>

                            <div class="col-xl-8">
                                <div class="card">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#about" role="tab">
                                                <i class="bx bx-user-circle font-size-20"></i>
                                                <span class="d-none d-sm-block">Room Details</span>
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

                                                    <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">Image</span><span> <img src="images/room/<?php echo $row['image']; ?>" alt="" height="80" width="80"></span></li>

                                                        <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">Name</span><span> <?php echo $row['title']; ?></span></li>

                                                        <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">Rate</span><span> <?php echo $row['rate']; ?>/-</span></li>

                                                        <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">No. Of Room</span><span> <?php echo $row['no_of_room']; ?></span></li>

                                                        <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">Ac</span><span> <?php if ($row['ac'] == 0) {echo "Yes";} else {echo "No";} ?></span></li>

                                                        <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">Wifi</span><span> <?php if ($row['wifi'] == 0) {echo "Yes";} else {echo "No";} ?></span></li>

                                                        <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">Hair Dryer</span><span> <?php if ($row['hair_dryer'] == 0) {echo "Yes";} else {echo "No";} ?></span></li>

                                                        <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">Breakfast</span><span> <?php if ($row['breakfast'] == 0) {echo "Yes";} else {echo "No";} ?></span></li>

                                                        <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">Laundry</span><span> <?php if ($row['laundry'] == 0) {echo "Yes";} else {echo "No";} ?></span></li>

                                                        <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">RO water Purifier</span><span> <?php if ($row['ro_water'] == 0) {echo "Yes";} else {echo "No";} ?></span></li>

                                                        <li class="d-flex justify-content-between p-2 font-size-15"><span class="text-muted">Feature</span><span><span><?php echo $row['feature']; ?></span></li>

                                                        <li class="checkout-item d-flex justify-content-between p-2 font-size-15">
                                                            <div class="feed-item-list">
                                                                <p>Description</p>
                                                                <div class="mb-3">
                                                                    <p class="text-muted" style="text-align:justify ;"><?php echo $row['description']; ?></p>
                                                                </div>
                                                            </div>
                                                        </li>



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