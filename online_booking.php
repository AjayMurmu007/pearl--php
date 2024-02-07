<?php include("common/header.php"); ?>
<?php include("common/db_connect.php"); ?>
<style>
    .topshed {

        background-image: url(images/top-shadow.png), url(images/linebg.jpg);
        background-position: top left, top left;
        background-repeat: repeat-x, repeat;
    }
</style>

<main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrc-bg.jpg);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrumb-wrap text-center">
                        <div class="breadcrumb-title">
                            <h2>Online Booking</h2>
                            <div class="breadcrumb-wrap">

                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Online Booking</li>
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

    <!-- booking-area -->
    <section class="booking pt-120 pb-120 p-relative fix topshed">
        <div class="animations-01"><img src="img/bg/an-img-01.png" alt="an-img-01"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 col-md-12">
                    <div class="contact-bg02">
                        <div class="section-title center-align">
                            <h5>make appointment</h5>
                            <h2>
                                Book A Room
                            </h2>
                        </div>
                        <?php include("common/alert_msg.php"); ?>
                        <form action="<?php echo htmlspecialchars("code/online_room_book.action.php"); ?>" method="post" class="contact-form mt-30">
                            <div class="row">

                                <div class="col-lg-4 col-md-4">
                                    <div class="contact-field p-relative c-name mb-20">
                                        <label><i class="fal fa-user"></i> Name</label>
                                        <input type="text" id="name" name="name" placeholder="Name" required>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <label><i class="fal fa-phone"></i> Contact No</label>
                                        <input type="number" id="contact_no" name="contact_no" placeholder="Contact No" required>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <label><i class="fal fa-envelope"></i> Email</label>
                                        <input type="email" id="email" name="email" placeholder="Email">
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="contact-field p-relative c-name mb-20">
                                        <label><i class="fal fa-badge-check"></i> Check In Date</label>
                                        <input type="date" id="in" name="date_of_checkin" required>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <label><i class="fal fa-times-octagon"></i> Check Out Date</label>
                                        <input type="date" id="out" name="date_of_checkout" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <label><i class="fal fa-users"></i> No of Adults</label>
                                        <select name="adult" id="adu">
                                            <option value="sports-massage">Adults</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <label><i class="fal fa-child"></i> No of Children</label>
                                        <select name="child" id="adu">
                                            <option value="sports-massage">Children</option>
                                            <option value="0">0</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="contact-field p-relative c-option mb-20">
                                        <label><i class="fal fa-hotel"></i> Room Type</label>
                                        <select name="room_id" id="room_type">
                                            <option value="sports-massage">Room Type</option>
                                            <?php
                                            $query = "SELECT * FROM `room`";
                                            $query_run = mysqli_query($con, $query);
                                            $row_check = mysqli_num_rows($query_run) > 0;
                                            if ($row_check) {
                                                while ($row = mysqli_fetch_assoc($query_run)) {

                                            ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
                          
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>


                                <!-- Total price -->
                                <input type="hidden" name="total_room_price" id="rate"> 



                                <div class="col-lg-6 col-md-6">
                                    <div class="contact-field p-relative c-option mb-20">
                                        <label><i class="fal fa-bed"></i> No of Room</label>
                                        <select name="no_of_room" class="room">
                                            <option value="sports-massage">Room</option>
                                        </select>
                                    </div>
                                </div>
                            
                                <div id="r_price"> Total Price: Rs - 0.00 /-</div>

                                <div class="col-lg-12">
                                    <div class="slider-btn mt-15">
                                        <button class="btn ss-btn" type="submit" name="book_btn" data-animation="fadeInRight" data-delay=".8s"><span>Book Now</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- booking-area-end -->

</main>
<!-- main-area-end -->

<?php include("common/footer.php"); ?>

<!-- Room Price Calculation  -->
<script>
    $(document).ready(function() {
        $('.room').change(function() {
            var room = $(this).val();
            var rate = $('option:selected', this).attr('data-rate');
            if(room > 0 && rate > 0){
                $('#r_price').text('Total Price: Rs - ' + room*rate);
                $('#rate').val(rate);
            }else{
                alert('Something went wrong or room not available!...');
            }
        });
    });
</script>
<!-- Room Price Calculation  -->

<script type='text/javascript'>
    $(document).ready(function() {
        $("#room_type").change(function() {
            var category_id = $(this).val();
            $.ajax({
                method: "POST",
                url: "ajax/room_qty.php",
                data: {
                    id: category_id
                },
                dataType: "html",
                success: function(data) {
                    $(".room").html(data);
                    $('#r_price').text('Total Price: Rs - 0.00 /-');
                }
            });
        });
    });
</script>

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