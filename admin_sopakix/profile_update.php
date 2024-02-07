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
                            <h4 style="color: white;padding:8px;">UPDATE PROFILE</h4>
                            <a href="index.php" class="btn btn-dark" style="margin-top:-43px;float:right;margin-right:5px;">Back</a>
                            <!-- <a href="category.php" class="btn btn-outline-dark waves-effect waves-light" style="margin-top:-43px;float:right;margin-right:5px;">Back</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h4 class="card-title">Validation type</h4> -->
                            <?php
                            $query = "SELECT * FROM `admin`";
                            $query_run = mysqli_query($con, $query);
                            $row_check = mysqli_num_rows($query_run) > 0;
                            if ($row_check) {
                                while ($row = mysqli_fetch_assoc($query_run)) {

                            ?>
                                    <form class="row g-3" method="POST" action="action/profile_update.action.php" enctype="multipart/form-data">
                                        <div class="col-md-6">
                                            <label class="form-label">Name</label>
                                            <input type="text" name="username" class="form-control" value="<?= $row['username']; ?>" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Password (We can't show you'r password here because it is encrypted.)</label>
                                            <input type="text" name="password" class="form-control" id="formrow-firstname-input" placeholder="*********" required>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary" name="update" type="submit">Submit</button>
                                        </div>
                                        <!-- end col -->
                                    </form>

                            <?php
                                }
                            }
                            ?>

                            <!-- end form -->
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->


    <?php include("common/footer.php"); ?>