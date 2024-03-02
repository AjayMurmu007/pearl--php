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
                    <div class="col-md-8">
                        <h6 class="page-title">Dashboard</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Welcome To <b>My Project</b> Admin Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">

                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat bg-primary text-white">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-start mini-stat-img me-4">
                                    <img src="assets/images/services-icon/image.png" alt="">
                                </div>
                                <h5 class="font-size-16 text-uppercase text-white-50">Gallery</h5>
                                <!-- <h4 class="fw-medium font-size-24">1,685</h4> -->
                                <?php
                                $query = "SELECT * FROM `gallery` ";
                                $query_run = mysqli_query($con, $query);
                                if ($img_total = mysqli_num_rows($query_run)) {
                                    echo '<h4 class="fw-medium font-size-24">' . $img_total . '</h4>';
                                } else {
                                    echo '<h4 class="mb-4">No Data Found</h4>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat bg-primary text-white">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-start mini-stat-img me-4">
                                    <img src="assets/images/services-icon/room.png" alt="">
                                </div>
                                <h5 class="font-size-16 text-uppercase text-white-50">Room & Suites</h5>
                                <!-- <h4 class="fw-medium font-size-24">1,685</h4> -->
                                <?php
                                $query = "SELECT * FROM `room` ";
                                $query_run = mysqli_query($con, $query);
                                if ($img_total = mysqli_num_rows($query_run)) {
                                    echo '<h4 class="fw-medium font-size-24">' . $img_total . '</h4>';
                                } else {
                                    echo '<h4 class="mb-4">No Data Found</h4>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat bg-primary text-white">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-start mini-stat-img me-4">
                                    <img src="assets/images/services-icon/smartphone.png" alt="">
                                </div>
                                <h5 class="font-size-16 text-uppercase text-white-50">Room Booked</h5>
                                <!-- <h4 class="fw-medium font-size-24">1,685</h4> -->
                                <?php
                                $query = "SELECT * FROM `room_booked` ";
                                $query_run = mysqli_query($con, $query);
                                if ($img_total = mysqli_num_rows($query_run)) {
                                    echo '<h4 class="fw-medium font-size-24">' . $img_total . '</h4>';
                                } else {
                                    echo '<h4 class="mb-4">No Data Found</h4>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat bg-primary text-white">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-start mini-stat-img me-4">
                                    <img src="assets/images/services-icon/image.png" alt="">
                                </div>
                                <h5 class="font-size-16 text-uppercase text-white-50">Room Gallery</h5>
                                <!-- <h4 class="fw-medium font-size-24">1,685</h4> -->
                                <?php
                                $query = "SELECT * FROM `room_gallery` ";
                                $query_run = mysqli_query($con, $query);
                                if ($img_total = mysqli_num_rows($query_run)) {
                                    echo '<h4 class="fw-medium font-size-24">' . $img_total . '</h4>';
                                } else {
                                    echo '<h4 class="mb-4">No Data Found</h4>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat bg-primary text-white">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-start mini-stat-img me-4">
                                    <img src="assets/images/services-icon/customer-service.png" alt="">
                                </div>
                                <h5 class="font-size-16 text-uppercase text-white-50">Service</h5>
                                <!-- <h4 class="fw-medium font-size-24">1,685</h4> -->
                                <?php
                                $query = "SELECT * FROM `service` ";
                                $query_run = mysqli_query($con, $query);
                                if ($img_total = mysqli_num_rows($query_run)) {
                                    echo '<h4 class="fw-medium font-size-24">' . $img_total . '</h4>';
                                } else {
                                    echo '<h4 class="mb-4">No Data Found</h4>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat bg-primary text-white">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-start mini-stat-img me-4">
                                    <img src="assets/images/services-icon/event.png" alt="">
                                </div>
                                <h5 class="font-size-16 text-uppercase text-white-50">Event & Banquet</h5>
                                <!-- <h4 class="fw-medium font-size-24">1,685</h4> -->
                                <?php
                                $query = "SELECT * FROM `event` ";
                                $query_run = mysqli_query($con, $query);
                                if ($img_total = mysqli_num_rows($query_run)) {
                                    echo '<h4 class="fw-medium font-size-24">' . $img_total . '</h4>';
                                } else {
                                    echo '<h4 class="mb-4">No Data Found</h4>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat bg-primary text-white">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-start mini-stat-img me-4">
                                    <img src="assets/images/services-icon/dining.png" alt="">
                                </div>
                                <h5 class="font-size-16 text-uppercase text-white-50">Dining</h5>
                                <!-- <h4 class="fw-medium font-size-24">1,685</h4> -->
                                <?php
                                $query = "SELECT * FROM `dining` ";
                                $query_run = mysqli_query($con, $query);
                                if ($img_total = mysqli_num_rows($query_run)) {
                                    echo '<h4 class="fw-medium font-size-24">' . $img_total . '</h4>';
                                } else {
                                    echo '<h4 class="mb-4">No Data Found</h4>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat bg-primary text-white">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-start mini-stat-img me-4">
                                    <img src="assets/images/services-icon/blogging.png" alt="">
                                </div>
                                <h5 class="font-size-16 text-uppercase text-white-50">Blog</h5>
                                <!-- <h4 class="fw-medium font-size-24">1,685</h4> -->
                                <?php
                                $query = "SELECT * FROM `blog` ";
                                $query_run = mysqli_query($con, $query);
                                if ($img_total = mysqli_num_rows($query_run)) {
                                    echo '<h4 class="fw-medium font-size-24">' . $img_total . '</h4>';
                                } else {
                                    echo '<h4 class="mb-4">No Data Found</h4>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat bg-primary text-white">
                        <div class="card-body">
                            <div class="mb-4">
                                <div class="float-start mini-stat-img me-4">
                                    <img src="assets/images/services-icon/contact.png" alt="">
                                </div>
                                <h5 class="font-size-16 text-uppercase text-white-50">Contact Us</h5>
                                <!-- <h4 class="fw-medium font-size-24">1,685</h4> -->
                                <?php
                                $query = "SELECT * FROM `contact_us` ";
                                $query_run = mysqli_query($con, $query);
                                if ($contact_us_total = mysqli_num_rows($query_run)) {
                                    echo '<h4 class="fw-medium font-size-24">' . $contact_us_total . '</h4>';
                                } else {
                                    echo '<h4 class="mb-4">No Data Found</h4>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <?php include("common/footer.php"); ?>