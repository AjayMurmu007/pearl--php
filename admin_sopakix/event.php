<?php
include("common/header.php"); ?>
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
                            <h4 style="color: white;padding:8px;">EVENT & BANQUET</h4>
                            <a href="add_event.php" class="btn btn-dark" style="margin-top:-43px;float:right;margin-right:5px;">Add Event & Banquet</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Event & Banquet Data Table</h4>
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Feature</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $s_no = 1;
                                    $query = "SELECT * FROM `event`";
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
                                                <td><img src="images/event/<?php echo $row['image']; ?>" alt="" height="50" width="50"></td>
                                                <td><?php echo $row['feature']; ?></td>
                                                <td><?php echo $row['description']; ?></td>
                                                <td>
                                                    <a href="edit_event.php?DD=<?php echo $id; ?>" class="btn btn-secondary btn-sm edit" title="Edit">
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                    <a href="action/event.action.php?QQ=<?php echo $id; ?>&action=del" onclick="return confirm('Are you sure want to Delete?')" class="btn btn-secondary btn-sm" title="Delete">
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

    <?php include("common/footer.php"); ?>