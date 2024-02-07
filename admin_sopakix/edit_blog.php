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
                            <h4 style="color: white;padding:8px;">ADD BLOG</h4>
                            <a href="blog.php" class="btn btn-dark" style="margin-top:-43px;float:right;margin-right:5px;">Back</a>
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
                            <h4 class="card-title">Please update in your details.</h4>
                            <?php
                            if (isset($_GET['DD'])) {

                                // id decrypt 
                                $u_id = base64_decode($_GET['DD']);
                                $id = $u_id / 525325.24;
                                // id decrypt 

                                $blog_id = $id;

                                $query = "SELECT * FROM `blog` WHERE `id`='$blog_id'";
                                $query_run = mysqli_query($con, $query);
                                $row_check = mysqli_num_rows($query_run) > 0;
                                if ($row_check) {
                                    while ($row = mysqli_fetch_assoc($query_run)) {

                            ?>
                                        <form method="POST" action="action/blog.action.php" enctype="multipart/form-data">
                                            <input type="hidden" name="blog_id" class="form-control" value="<?php echo $row['id']; ?>">
                                            <div data-repeater-list="outer-group" class="outer">
                                                <div data-repeater-item class="outer">
                                                    <div class="row">

                                                        <div class="mb-3 col-lg-3">
                                                            <label class="form-label" for="title">Title</label>
                                                            <input type="text" id="title" name="title" class="form-control" value="<?= $row['title']; ?>" required />
                                                        </div>
                                                        <div class="mb-3 col-lg-3">
                                                            <label class="form-label" for="blog_date">Blog Date</label>
                                                            <input type="date" name="blog_date" class="form-control" value="<?= $row['blog_date']; ?>" />
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label class="form-label">Image</label>
                                                            <input type="hidden" name="old_image" value="<?= $row['image'] ?>">
                                                            <input type="file" name="upload_image" class="form-control" id="file" onchange="return fileValidation()" accept="image/*">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <img src="images/blog/<?= $row['image']; ?>" width="80px" height="80px" alt="">
                                                        </div>
                                                        <div class="col-md-1">
                                                            <div id="imagePreview"></div>
                                                        </div>

                                                    </div>

                                                    <div class="mb-3 col-lg-12">
                                                        <label class="form-label mt-2" for="name">Description</label>
                                                        <textarea name="message" id="" class="form-control" cols="30" rows="5"  required><?= $row['message']; ?></textarea>
                                                    </div>
                                                    <button type="submit" name="blog_update_btn" class="btn btn-primary">Submit</button>
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