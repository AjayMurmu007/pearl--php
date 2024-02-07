<?php include("common/header.php"); ?>
<?php include("common/sidebar.php"); ?>
<?php include('common/db_connect.php'); ?>

<?php
// Active & Deactive Start
if (isset($_GET['type']) && isset($_GET['type']) != '') {
    $type = ($_GET['type']);
    if ($type == 'status') {
        $operation = ($_GET['operation']);
        $id = ($_GET['id']);
        if ($operation == 'active') {
            $status = '1';
        } else {
            $status = '0';
        }
        $query = "UPDATE contact_us SET status='$status' WHERE id='$id'";
        $update_status_sql = mysqli_query($con, $query);
    }
}
// Active & Deactive End

// Contact Us Delete Start

if (isset($_GET['QQ']) != '' && isset($_GET['action']) == 'del') {

    // id decrypt 
    $u_id = base64_decode($_GET['QQ']);
    $id = $u_id / 525325.24;
    // id decrypt 

    $not_id = $id;

    $query = "DELETE FROM `contact_us` WHERE id='$not_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['success'] = "Details Delete Successfully";
        header('location: contact_us.php');
        exit();
    } else {
        $_SESSION['error'] = "Details Not Delete Successfully";
        header('location: contact_us.php');
        exit();
    }
}

// Contact Us Delete End
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
                            <h4 style="color: white;padding:8px;">Contact Us</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table Start -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Contact Data Table</h4>
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Contact No</th>
                                        <th>Email</th>
                                        <th>Location</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Date & Time</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $s_no = 1;
                                    $query = "SELECT * FROM `contact_us`";
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
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['contact_no']; ?></td>
                                                <td><?php echo $row['email']; ?></td>
                                                <td><?php echo $row['location']; ?></td>
                                                <td><?php echo $row['message']; ?></td>
                                                <td>
                                                    <?php

                                                    if ($row['status'] == 1) {
                                                        //echo"Active"
                                                        echo "
                                                        <a href='?type=status&operation=deactive&id=" . $row['id'] . "'class='btn btn-success'>Active</a>";
                                                    } else {
                                                        //echo"Deactive"
                                                        echo "
                                                        <a href='?type=status&operation=active&id=" . $row['id'] . "'class='btn btn-warning'>Deactive</a>";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $row['added_on']; ?></td>

                                                <td>
                                                    <a href="?QQ=<?php echo $id; ?>&action=del" onclick="return confirm('Are you sure want to Delete?')" class="btn btn-secondary btn-sm" title="Delete">
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