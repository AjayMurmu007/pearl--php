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
                            <form method="POST" action="action/room.action.php" enctype="multipart/form-data">
                                <div data-repeater-list="outer-group" class="outer">
                                    <div data-repeater-item class="outer">
                                        <div class="row">

                                            <div class="mb-3 col-lg-6">
                                                <label class="form-label" for="title">Title</label>
                                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter Room Title" required />
                                            </div>
                                            <div class="mb-3 col-lg-6">
                                                <label class="form-label" for="rate">Price</label>
                                                <input type="text" name="rate" class="form-control" placeholder="Enter Single Room Price" required />
                                            </div>

                                        </div>

                                        <div class="row">
                                        <div class="mb-3 col-lg-6">
                                                <label class="form-label" for="rate">No. of Room</label>
                                                <input type="number" name="no_of_room" class="form-control" placeholder="Enter No. of Room" required />
                                            </div>

                                            <div class="col-md-5">
                                                <label class="form-label">Image</label>
                                                <input type="file" name="upload_image" class="form-control" id="file" onchange="return fileValidation()" accept="image/*" required>
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
                                                        <input type="radio" id="ac" name="ac" class="form-check-input" value="0">
                                                        <label class="form-check-label" for="ac">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="ac_2" name="ac" class="form-check-input" value="1">
                                                        <label class="form-check-label" for="ac_2">No</label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label class="form-label mb-3 d-flex">Fee Wifi :</label>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="wifi" name="wifi" class="form-check-input" value="0">
                                                        <label class="form-check-label" for="wifi">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="wifi_2" name="wifi" class="form-check-input" value="1">
                                                        <label class="form-check-label" for="wifi_2">No</label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label class="form-label mb-3 d-flex">Hair Dryer :</label>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="hair_dryer" name="hair_dryer" class="form-check-input" value="0">
                                                        <label class="form-check-label" for="hair_dryer">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="hair_dryer_2" name="hair_dryer" class="form-check-input" value="1">
                                                        <label class="form-check-label" for="hair_dryer_2">No</label>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label class="form-label mb-3 d-flex">Breakfast :</label>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="breakfast" name="breakfast" class="form-check-input" value="0">
                                                        <label class="form-check-label" for="breakfast">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="breakfast_2" name="breakfast" class="form-check-input" value="1">
                                                        <label class="form-check-label" for="breakfast_2">No</label>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label class="form-label mb-3 d-flex">Laundry :</label>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="laundry" name="laundry" class="form-check-input" value="0">
                                                        <label class="form-check-label" for="laundry">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="laundry_2" name="laundry" class="form-check-input" value="1">
                                                        <label class="form-check-label" for="laundry_2">No</label>
                                                    </div>
                                                </div>

                                            </div>


                                            <div class="col-md-2">
                                                <div class="mb-3">
                                                    <label class="form-label mb-3 d-flex">RO water Purifier :</label>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="ro_water" name="ro_water" class="form-check-input" value="0">
                                                        <label class="form-check-label" for="ro_water">Yes</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input type="radio" id="ro_water_2" name="ro_water" class="form-check-input" value="1">
                                                        <label class="form-check-label" for="ro_water_2">No</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="mb-3 col-lg-6">
                                                <label class="form-label mt-2" for="name">Feature</label>
                                                <textarea name="feature" id="" class="form-control" cols="30" rows="5" placeholder="Write Feature" ></textarea>
                                            </div>

                                            <div class="mb-3 col-lg-6">
                                                <label class="form-label mt-2" for="name">Description</label>
                                                <textarea name="description" id="" class="form-control" cols="30" rows="5" placeholder="Write Description" ></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" name="room_add_btn" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
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