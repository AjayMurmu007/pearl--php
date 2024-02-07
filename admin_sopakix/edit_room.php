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
                            <h4 style="color: white;padding:8px;">ADD ROOM & SUITES</h4>
                            <a href="room.php" class="btn btn-dark" style="margin-top:-43px;float:right;margin-right:5px;">Back</a>
                            <!-- <a href="product.php" class="btn btn-outline-dark waves-effect waves-light" style="margin-top:-43px;float:right;margin-right:5px;">Back</a> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Please fill in your details.</h4>

                            <?php
                            if (isset($_GET['DD'])) {

                                // id decrypt 
                                $u_id = base64_decode($_GET['DD']);
                                $id = $u_id / 525325.24;
                                // id decrypt 

                                $room_id = $id;

                                $query = "SELECT * FROM `room` WHERE `id`='$room_id'";
                                $query_run = mysqli_query($con, $query);
                                $row_check = mysqli_num_rows($query_run) > 0;
                                if ($row_check) {
                                    while ($row = mysqli_fetch_assoc($query_run)) {

                            ?>

                                        <form method="POST" action="action/room.action.php" enctype="multipart/form-data">

                                            <input type="hidden" name="room_id" class="form-control" value="<?php echo $row['id']; ?>">

                                            <div data-repeater-list="outer-group" class="outer">
                                                <div data-repeater-item class="outer">
                                                    <div class="row">

                                                        <div class="mb-3 col-lg-3">
                                                            <label class="form-label" for="title">Title</label>
                                                            <input type="text" id="title" name="title" class="form-control" value="<?php echo $row['title']; ?>" />
                                                        </div>
                                                        <div class="mb-3 col-lg-2">
                                                            <label class="form-label" for="rate">Rate</label>
                                                            <input type="text" name="rate" class="form-control" value="<?php echo $row['rate']; ?>" />
                                                        </div>

                                                        <div class="mb-3 col-lg-2">
                                                            <label class="form-label" for="no_of_room">No. of Room</label>
                                                            <input type="number" name="no_of_room" class="form-control" value="<?php echo $row['no_of_room']; ?>" />
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label class="form-label">Image</label>
                                                            <input type="hidden" name="old_image" value="<?= $row['image'] ?>">
                                                            <input type="file" name="upload_image" class="form-control" id="file" onchange="return fileValidation()" accept="image/*">
                                                        </div>

                                                        <div class="col-md-1">
                                                            <img src="images/room/<?= $row['image']; ?>" width="80px" height="80px" alt="">
                                                        </div>

                                                        <div class="col-md-1">
                                                            <div id="imagePreview"></div>
                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-md-2">
                                                            <div class="mb-3">
                                                                <label class="form-label mb-3 d-flex">AC :</label>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" id="ac" name="ac" class="form-check-input" value="0" <?php if ($row["ac"] == '0') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                                                    <label class="form-check-label" for="ac">Yes</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" id="ac_2" name="ac" class="form-check-input" value="1" <?php if ($row["ac"] == '1') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                                                    <label class="form-check-label" for="room_2">No</label>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="mb-3">
                                                                <label class="form-label mb-3 d-flex">Fee Wifi :</label>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" id="wifi" name="wifi" class="form-check-input" value="0" <?php if ($row["wifi"] == '0') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                                                    <label class="form-check-label" for="wifi">Yes</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" id="wifi_2" name="wifi" class="form-check-input" value="1" <?php if ($row["wifi"] == '1') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } ?>>
                                                                    <label class="form-check-label" for="wifi_2">No</label>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="col-md-2">
                                                            <div class="mb-3">
                                                                <label class="form-label mb-3 d-flex">Hair Dryer :</label>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" id="hair_dryer" name="hair_dryer" class="form-check-input" value="0" <?php if ($row["hair_dryer"] == '0') {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                                                    <label class="form-check-label" for="hair_dryer">Yes</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" id="hair_dryer_2" name="hair_dryer" class="form-check-input" value="1" <?php if ($row["hair_dryer"] == '1') {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>>
                                                                    <label class="form-check-label" for="hair_dryer_2">No</label>
                                                                </div>
                                                            </div>

                                                        </div>


                                                        <div class="col-md-2">
                                                            <div class="mb-3">
                                                                <label class="form-label mb-3 d-flex">Breakfast :</label>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" id="breakfast" name="breakfast" class="form-check-input" value="0" <?php if ($row["breakfast"] == '0') {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>>
                                                                    <label class="form-check-label" for="breakfast">Yes</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" id="breakfast_2" name="breakfast" class="form-check-input" value="1" <?php if ($row["breakfast"] == '1') {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                } ?>>
                                                                    <label class="form-check-label" for="breakfast_2">No</label>
                                                                </div>
                                                            </div>

                                                        </div>


                                                        <div class="col-md-2">
                                                            <div class="mb-3">
                                                                <label class="form-label mb-3 d-flex">Laundry :</label>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" id="laundry" name="laundry" class="form-check-input" value="0" <?php if ($row["laundry"] == '0') {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                } ?>>
                                                                    <label class="form-check-label" for="laundry">Yes</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" id="laundry_2" name="laundry" class="form-check-input" value="1" <?php if ($row["laundry"] == '1') {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                } ?>>
                                                                    <label class="form-check-label" for="laundry_2">No</label>
                                                                </div>
                                                            </div>

                                                        </div>


                                                        <div class="col-md-2">
                                                            <div class="mb-3">
                                                                <label class="form-label mb-3 d-flex">RO water Purifier :</label>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" id="ro_water" name="ro_water" class="form-check-input" value="0" <?php if ($row["ro_water"] == '0') {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>>
                                                                    <label class="form-check-label" for="ro_water">Yes</label>
                                                                </div>
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" id="ro_water_2" name="ro_water" class="form-check-input" value="1" <?php if ($row["ro_water"] == '1') {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } ?>>
                                                                    <label class="form-check-label" for="ro_water_2">No</label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="mb-3 col-lg-6">
                                                            <label class="form-label mt-2" for="name">Feature</label>
                                                            <textarea name="feature" id="" class="form-control" cols="30" rows="5"><?php echo $row['feature']; ?></textarea>
                                                        </div>

                                                        <div class="mb-3 col-lg-6">
                                                            <label class="form-label mt-2" for="name">Description</label>
                                                            <textarea name="description" id="" class="form-control" cols="30" rows="5"><?php echo $row['description']; ?></textarea>
                                                        </div>
                                                    </div>
                                                    <button type="submit" name="room_update_btn" class="btn btn-primary">Submit</button>
                                                </div>
                                            </div>
                                        </form>

                            <?php
                                    }
                                }
                            }
                            ?>

                            <!-- end form -->
                        </div>
                        <!-- end cardbody -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <!-- Image upload validation -->
    <script>
        function fileValidation() {
            var fileInput =
                document.getElementById('file');

            var filePath = fileInput.value;

            // Allowing file type
            var allowedExtensions =
                /(\.jpg|\.jpeg|\.png|\.gif)$/i;

            if (!allowedExtensions.exec(filePath)) {
                alert('Invalid file type');
                fileInput.value = '';
                return false;
            } else {

                // Image preview
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById(
                                'imagePreview').innerHTML =
                            '<img src="' + e.target.result +
                            '" style="height:80px;margin-bottom:10px;"/>';
                    };

                    reader.readAsDataURL(fileInput.files[0]);
                }
            }
        }
    </script>

    <?php include("common/footer.php"); ?>