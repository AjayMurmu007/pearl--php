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
                            <h4 class="card-title">Please fill in your details.</h4>
                            <form method="POST" action="action/blog.action.php" enctype="multipart/form-data">
                                <div data-repeater-list="outer-group" class="outer">
                                    <div data-repeater-item class="outer">
                                        <div class="row">

                                            <div class="mb-3 col-lg-3">
                                                <label class="form-label" for="title">Title</label>
                                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter Blog Title" required />
                                            </div>
                                            <div class="mb-3 col-lg-3">
                                                <label class="form-label" for="blog_date">Blog Date</label>
                                                <input type="text" name="blog_date" class="form-control" placeholder="Enter Blog Date" onfocus="(this.type='date')" />
                                            </div>

                                            <div class="col-md-5">
                                                <label class="form-label">Image</label>
                                                <input type="file" name="upload_image" class="form-control" id="file" onchange="return fileValidation()" accept="image/*" required>
                                            </div>

                                            <div class="col-md-1">
                                                <div id="imagePreview"></div>
                                            </div>

                                        </div>

                                        <div class="mb-3 col-lg-12">
                                            <label class="form-label mt-2" for="name">Description</label>
                                            <textarea name="message" id="" class="form-control" cols="30" rows="3" placeholder="Write Blog Description" required></textarea>
                                        </div>
                                        <button type="submit" name="blog_add_btn" class="btn btn-primary">Submit</button>
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