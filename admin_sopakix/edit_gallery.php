<?php
include("common/header.php"); ?>
<?php include("common/sidebar.php"); ?>

<?php

include('common/db_connect.php');

?>
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
                            <h4 style="color: white;padding:8px;">EDIT GALLERY</h4>
                            <a href="gallery.php" class="btn btn-dark" style="margin-top:-43px;float:right;margin-right:5px;">Back</a>
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
                            if (isset($_GET['DD'])) {

                                // id decrypt 
                                $u_id = base64_decode($_GET['DD']);
                                $id = $u_id / 525325.24;
                                // id decrypt 

                                $gallery_id = $id;

                                $query = "SELECT * FROM `gallery` WHERE `id`='$gallery_id'";
                                $query_run = mysqli_query($con, $query);
                                $row_check = mysqli_num_rows($query_run) > 0;
                                if ($row_check) {
                                    while ($row = mysqli_fetch_assoc($query_run)) {

                            ?>
                                        <form class="row g-3" method="POST" action="action/gallery.action.php" enctype="multipart/form-data">

                                            <input type="hidden" name="image_id" class="form-control" value="<?php echo $row['id']; ?>">

                                            <div class="col-md-6">
                                                <label class="form-label">Title</label>
                                                <input type="text" name="title" class="form-control" value="<?= $row['title']; ?>" required>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-md-4">
                                                <label class="form-label">Image</label>
                                                <input type="hidden" name="old_image" value="<?= $row['image'] ?>">
                                                <input type="file" name="upload_image" class="form-control" id="file" onchange="return fileValidation()" accept="image/*">
                                            </div>

                                            <div class="col-md-1">
                                                <img src="images/gallery/<?= $row['image']; ?>" width="80px" height="80px" alt="">
                                            </div>

                                            <div class="col-md-1">
                                                <div id="imagePreview"></div>
                                            </div>

                                            <div class="col-12">
                                                <button class="btn btn-primary" name="update" type="submit">Submit</button>
                                            </div>
                                            <!-- end col -->
                                        </form>

                            <?php
                                    }
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