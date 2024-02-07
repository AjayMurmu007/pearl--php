<?php include("common/header.php"); ?>
<?php include("common/db_connect.php"); ?>

<style>
    .sidebar-widget a {
        color: white;
    }

    #price {
        float: right;
    }

    #rate {
        display: none;
    }

    @media only screen and (max-width: 600px) {
        #price {
            display: none;
        }

        #rate {
            display: block;
        }
    }
</style>

<!-- main-area -->
<main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrc-bg.jpg);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrumb-wrap text-center">
                        <div class="breadcrumb-title">
                            <h2>Room Deatils</h2>
                            <div class="breadcrumb-wrap">

                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <?php
                                        if (isset($_GET['rd'])) {
                                            // id decrypt 
                                            $u_id = base64_decode($_GET['rd']);
                                            $id = $u_id / 525325.24;
                                            // id decrypt 

                                            $room_id = $id;
                                            $query = "SELECT * FROM `room` WHERE `id`='$room_id'";
                                            $query_run = mysqli_query($con, $query);
                                            $row_check = mysqli_num_rows($query_run) > 0;
                                            if ($row_check) {
                                                while ($row = mysqli_fetch_assoc($query_run)) {
                                        ?>
                                                    <li class="breadcrumb-item active" aria-current="page"><?php echo $row['title']; ?></li>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
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
    <!-- service-details-area -->
    <div class="about-area5 about-p p-relative">
        <div class="container pt-120 pb-40">
            <div class="row">
                <!-- #right side -->
                <div class="col-sm-12 col-md-12 col-lg-5 order-2">
                    <aside class="sidebar services-sidebar">
                        <!-- Category Widget -->
                        <div class="sidebar-widget categories">
                            <div class="widget-content">
                                <h2 class="widget-title">Book This Room</h2>
                                <!-- Services Category -->
                                <!-- booking-area -->
                                <div class="booking">
                                    <div class="contact-bg">

                                        <?php include("common/alert_msg.php"); ?>

                                        <?php
                                        if (isset($_GET['rd'])) {
                                            // id decrypt 
                                            $u_id = base64_decode($_GET['rd']);
                                            $id = $u_id / 525325.24;
                                            // id decrypt 

                                            $room_id = $id;
                                            $sql = "SELECT * FROM `room` WHERE `id`='$room_id'";
                                            $sql_run = mysqli_query($con, $sql);
                                            $row_check = mysqli_num_rows($sql_run);
                                            if ($row_check  > 0) {
                                                while ($res = mysqli_fetch_assoc($sql_run)) {

                                                    $no_of_room = $res['no_of_room'];

                                                    if ($no_of_room >= 1) {

                                        ?>
                                                        <form action="<?php echo htmlspecialchars("code/room_book.action.php"); ?>" method="POST" class="contact-form mt-30">

                                                            <input type="hidden" name="room_id" value="<?php echo $res['id']; ?>">
                                                            <input type="hidden" name="rate" id="rate" value="<?php echo $res['rate']; ?>">
                                                            
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="contact-field p-relative c-name mb-20">
                                                                        <label><i class="fal fa-user"></i> Name</label>
                                                                        <input type="text" name="name" placeholder="Name" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="contact-field p-relative c-name mb-20">
                                                                        <label><i class="fal fa-phone"></i> Contact No</label>
                                                                        <input type="number" name="contact_no" placeholder="Contact No" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="contact-field p-relative c-name mb-20">
                                                                        <label><i class="fal fa-envelope"></i> Email</label>
                                                                        <input type="email" name="email" placeholder="Email" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="contact-field p-relative c-subject mb-20">
                                                                        <label><i class="fal fa-calendar"></i> Check-In</label>
                                                                        <input placeholder="Date Of Check-In" name="date_of_checkin" id="in" class="form-control" type="text" onfocus="(this.type='date')" id="date" required="" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="contact-field p-relative c-subject mb-20">
                                                                        <label><i class="fal fa-calendar"></i> Check-Out</label>
                                                                        <input placeholder="Date Of Check-Out" name="date_of_checkout" id="out" class="form-control" type="text" onfocus="(this.type='date')" id="date" required="" />
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4">
                                                                    <div class="contact-field p-relative c-option mb-20">
                                                                        <label><i class="fal fa-users"></i> No of Adult</label>
                                                                        <select name="adult" id="adu" required>
                                                                            <option value="sports-massage">Adult</option>
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4">
                                                                    <div class="contact-field p-relative c-option mb-20">
                                                                        <label><i class="fal fa-child"></i> No of Children</label>
                                                                        <select name="child" id="adu" required>
                                                                            <option value="sports-massage"> Children</option>
                                                                            <option value="0">0</option>
                                                                            <option value="1">1</option>
                                                                            <option value="2">2</option>
                                                                            <option value="3">3</option>
                                                                            <option value="4">4</option>
                                                                            <option value="5">5</option>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-4">
                                                                    <div class="contact-field p-relative c-option mb-20">
                                                                        <label><i class="fal fa-bed"></i> No of Room</label>
                                                                        <select name="no_of_room" id="quantity" required>
                                                                            <option value="sports-massage">Room</option>

                                                                            <?php
                                                                            for ($i = 1; $i <= $no_of_room; $i++) {
                                                                            ?>
                                                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                                                                            <?php
                                                                            }
                                                                            ?>

                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div id="room_price"> Total Price: Rs - 0.00 /-</div>

                                                                <div class="col-lg-12">
                                                                    <div class="slider-btn mt-15">
                                                                        <button class="btn ss-btn" type="submit" name="book_btn" data-animation="fadeInRight" data-delay=".8s">
                                                                            <span>Book Now</span>
                                                                        </button>

                                                                        <!-- <a href="booking_details.php" class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s">Process</a> -->
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </form>
                                        <?php
                                                    } else {

                                                        echo "<div class='service-detail-contact wow fadeup-animation' data-wow-delay='1.1s'>
                                                        <h3 class='h3-title'>Room Not Available</h3>
                                                        </div>";
                                                    };
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- booking-area-end -->
                            </div>
                        </div>
                        <!--Service Contact-->
                        <div class="service-detail-contact wow fadeup-animation" data-wow-delay="1.1s">
                            <h3 class="h3-title">If You Need Any Help Contact With Us</h3>
                            <a href="javascript:void(0);" title="Call now">+91-7667716510</a>
                            <br>
                            <br>
                            <a href="javascript:void(0);" title="Call now"> +91-8409748071</a>
                            <br><br>
                            <a href="javascript:void(0);" title="Call now">0326-3500 480 / 81</a>
                        </div>
                    </aside>
                </div>
                <!-- #right side end -->

                <?php
                if (isset($_GET['rd'])) {

                    // id decrypt 
                    $u_id = base64_decode($_GET['rd']);
                    $id = $u_id / 525325.24;
                    // id decrypt 

                    $room_id = $id;
                    $query = "SELECT * FROM `room` WHERE `id`='$room_id'";
                    $query_run = mysqli_query($con, $query);
                    $row_check = mysqli_num_rows($query_run) > 0;
                    if ($row_check) {
                        while ($row = mysqli_fetch_assoc($query_run)) {


                            // id encrypt 
                            $u_id = $row['id'] * 525325.24;
                            $r_id = base64_encode($u_id);
                            // id encrypt

                ?>
                            <div class="col-lg-7 col-md-12 col-sm-12 order-1">
                                <div class="service-detail">

                                    <div class="two-column">
                                        <div class="row">
                                            <div class="image-column col-xl-12 col-lg-12 col-md-12">
                                                <figure class="image"><img src="admin_sopakix/images/room/<?php echo $row['image']; ?>" alt="" style="height: 500px;"></figure>
                                            </div>
                                            <!-- <div class="text-column col-xl-6 col-lg-12 col-md-12">
                                                <figure class="image"><img src="img/bg/single-room-img02.png" alt=""></figure>
                                                <figure class="image"><img src="img/bg/single-room-img03.png" alt=""></figure>
                                            </div> -->
                                            <!-- <div class="mb-20">
                                                <a href="room_booking.php" class="btn ss-btn">Book Now</a>
                                                <a href="room_booking.php" class="btn ss-btn">Book Now</a>
                                            </div> -->
                                        </div>
                                    </div>

                                    <div class="slider-btn mb-4">
                                        <a href="room_gallery.php?SI=<?php echo $r_id; ?>" class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s">View All Images</a>
                                    </div>

                                    <div class="content-box">
                                        <div class="row align mb-50">
                                            <div class="col-lg-6 col-md-6">
                                                <div class="price">
                                                    <h2>Room Type</h2>
                                                    <span><?php echo $row['title']; ?></span>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6">
                                                <div class="price" id="price">
                                                    <h2>Room Price</h2>
                                                    <span>&#8377;<?php echo $row['rate']; ?>.00 + Tax / Night</span>
                                                </div>
                                            </div>
                                            <!-- Mobile View -->
                                            <div class="col-lg-6 col-md-6">
                                                <div class="price" id="rate">
                                                    <h2>Room Price</h2>
                                                    <span>&#8377;<?php echo $row['rate']; ?>.00 + Tax / Night</span>
                                                </div>
                                            </div>
                                        </div>

                                        <?php

                                        if ($row['no_of_room'] > 0) {

                                        ?> <h3><b><?php echo $row['no_of_room']; ?> - Room Available</h3></b><?php

                                                                                                            } else {
                                                                                                                ?><h3><b><?php echo "Room Not Available"; ?></b></h3><?php
                                                                                                                                                                    }

                                                                                                                                                                        ?>

                                        <?php
                                        $s_desc = explode(',', $row['feature']);
                                        echo "<ul class='room-features d-flex align-items-center'>";

                                        foreach ($s_desc as $desc) {

                                            echo " <li style='color:#644222;'>&#x2756;  $desc</li>";
                                        }
                                        echo "</ul>";
                                        ?>

                                        <h3 class="mt-3">Description</h3>
                                        <p style="text-align: justify;"><?php echo $row['description']; ?></p>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <!-- service-details-area-end -->

</main>
<!-- main-area-end -->

<?php include("common/footer.php"); ?>

<!-- Room Price Calculation  -->
<script>
    $(document).ready(function() {
        $('#quantity').change(function() {
            var quantity = $(this).val();
            var rate = $("#rate").val();

            $.ajax({
                type: 'POST',
                url: 'ajax/calculate_price.php',
                data: {
                    quantity: quantity,
                    rate: rate
                },
                dataType: "html",
                success: function(response) {
                    $('#room_price').html('Total Price: Rs - ' + response);
                }
            });
        });
    });
</script>
<!-- Room Price Calculation  -->

<!-- Previous Date Hide -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script>
    $(function() {
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var minDate = year + '-' + month + '-' + day;

        $('#in').attr('min', minDate);
    });

    $(function() {
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var minDate = year + '-' + month + '-' + day;

        $('#out').attr('min', minDate);
    });
</script>