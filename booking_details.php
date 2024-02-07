<?php include("common/header.php"); ?>
<?php include("common/db_connect.php"); ?>

<!-- main-area -->
<main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrc-bg.jpg)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrumb-wrap text-center">
                        <div class="breadcrumb-title">
                            <h2>Booking Details</h2>
                            <div class="breadcrumb-wrap">

                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Booking Details </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- product-desc-area start -->
    <section class="product-desc-area pb-55">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tab-content mt-5 text-center" id="myTabContent">
                        <form action="<?php echo htmlspecialchars("code/room_book.action.php"); ?>" method="post" class="contact-form mt-30">
                            <h4>Room Booking Information</h4>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Name</th>
                                        <td><?php echo $_POST['name']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Contact No</th>
                                        <td><?php echo $_POST['contact_no']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo $_POST['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Room Type</th>
                                        <?php
                                        $sql = "SELECT * FROM `room` WHERE `id`='$_POST[room_id]'";
                                        $sql_run = mysqli_query($con, $sql);
                                        $row_check = mysqli_num_rows($sql_run) > 0;
                                        if ($row_check) {
                                            while ($res = mysqli_fetch_assoc($sql_run)) {
                                        ?>
                                                <td><?php echo $res['title']; ?></td>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tr>
                                    <tr>
                                        <th>Room</th>
                                        <td><?php echo $_POST['no_of_room']; ?></td>
                                    </tr>

                                </tbody>

                            </table>
                            <button class="btn ss-btn" type="submit" name="book_btn" data-animation="fadeInRight" data-delay=".8s">
                                <span>Book Now</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product-desc-area end -->
</main>
<!-- main-area-end -->
<?php include("common/footer.php"); ?>