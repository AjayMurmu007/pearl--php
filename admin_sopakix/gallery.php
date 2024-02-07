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
                            <h4 style="color: white;padding:8px;">GALLERY</h4>
                            <!-- <a href="add_service.php" class="btn btn-dark" style="margin-top:-43px;float:right;margin-right:5px;">Add Category</a> -->
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
                            <form class="row g-3" method="POST" action="action/gallery.action.php" enctype="multipart/form-data">
            
                                <div class="col-md-6">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                                </div>
                                <!-- end col -->
                                <div class="col-md-5">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="upload_image" class="form-control" id="file" onchange="return fileValidation()" accept="image/*" required>
                                </div>

                                <div class="col-md-1">
                                    <div id="imagePreview"></div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                                </div>
                                <!-- end col -->
                            </form><!-- end form -->
                        </div><!-- end cardbody -->
                    </div><!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

            <!-- Table Start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Gallery Data Table</h4>
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php

                                    $s_no = 1;

                                    $query = "SELECT * FROM `gallery`";
                                    $query_run = mysqli_query($con, $query);
                                    $row_check = mysqli_num_rows($query_run) > 0;
                                    if ($row_check) {
                                        while ($row = mysqli_fetch_assoc($query_run)) {

                                            // id encrypt 
                                            $u_id = $row['id'] * 525325.24;
                                            $id = base64_encode($u_id);
                                            // id encrypt

                                    ?>
                                            <tr>
                                                <td><?php echo $s_no; ?></td>
                                                <td><?php echo $row['title']; ?></td>
                                                <td><img src="images/gallery/<?php echo $row['image']; ?>" alt="" height="50" width="50"></td>

                                                <td>
                                                    <a href="edit_gallery.php?DD=<?php echo $id; ?>" class="btn btn-secondary btn-sm edit" title="Edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="action/gallery.action.php?QQ=<?php echo $id; ?>&action=del" onclick="return confirm('Are you sure want to Delete?')" class="btn btn-secondary btn-sm" title="Delete">
                                                        <i class="fas fa-trash-alt"></i>
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
            <!-- Table End -->
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