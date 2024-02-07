<?php include("common/header.php"); ?>
<?php include("common/db_connect.php"); ?>

<!-- main-area -->
<main>
    <!-- slider-area -->
    <?php include("common/slider.php"); ?>
    <!-- slider-area-end -->

    <!-- about-area -->
    <section class="about-area about-p pt-120 pb-120 p-relative fix">
        <div class="animations-02"><img src="img/bg/an-img-02.png" alt="contact-bg-an-02"></div>
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="s-about-img p-relative  wow fadeInLeft animated" data-animation="fadeInLeft" data-delay=".4s">
                        <img src="img/features/about_img_02.png" alt="img">
                        <div class="about-icon">
                            <img src="img/features/about_img_03.png" alt="img">
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="about-content s-about-content wow fadeInRight animated pl-30" data-animation="fadeInRight" data-delay=".4s">
            <div class="about-title second-title pb-25">
              <h5>About Us</h5>
              <h2>Most Safe & Rated Hotel In White Pearl.</h2>
            </div>
            <p style="text-align: justify;">
            Our visitors at White Pearl are welcome to uphold our venerable traditions of value, comfort, and style. It is a newly constructed hotel that combines distinctive architecture, expressive décor, and amazing features in one fantastic location with exceptional service.
            </p>
            <p style="text-align: justify;">
            The end result is an extraordinary experience that will leave you with a long-lasting recollection of White Pearl . We provide consistency by upholding the highest standards with rigorous adherence. The hotel provides thoughtful extras like complimentary high-speed internet, a cooked breakfast, and roomy accommodations. Our goal is to make your visit memorable while also offering you comfortable lodging. Therefore, for a memorable good time and first-rate service, stay at White Pearl  the next time you are in Dhanbad.
            </p>
            <div class="about-content3 mt-30">
              <div class="row justify-content-center align-items-center">
                <div class="col-md-12">
                  <ul class="green mb-30">
                    <li>
                    White Pearl is centrally located in the heart of the city 'Bank More' two km railway station and five km from Bus Stand.
                    </li>
                    <li>
                    Well decorated 24 Luxury Rooms including suits, Deluxe and Regular with Bath tubs, Wifi and Comlimenty Break Fast.
                    </li>
                    <li>
                    Room Service Available.
                    </li>
                    <li>
                    Resturant Facilities, Banquet Hall for any type of Function.
                    </li>
                    <li>
                    Parking Facilities.
                    </li>
                    <li>
                    Skilled staffs at your service to feel you a home away from home.
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

            </div>
        </div>
    </section>
    <!-- about-area-end -->

    <!-- service-details2-area -->
    <section id="service-details2" class="pt-120 pb-90 p-relative" style="background-color: #f7f5f1;">
        <div class="animations-01"><img src="img/bg/an-img-01.png" alt="an-img-01"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="section-title center-align mb-50 text-center">
                        <h5>White Pearl</h5>
                        <h2>Services</h2>
                    </div>
                </div>

                <?php
                $query = "SELECT * FROM `service`";
                $query_run = mysqli_query($con, $query);
                $row_check = mysqli_num_rows($query_run) > 0;
                if ($row_check) {
                    while ($row = mysqli_fetch_assoc($query_run)) {

                ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="services-08-item mb-30">
                                <div class="services-icon2">
                                    <img src="admin_sopakix/images/service/<?php echo $row['image']; ?>" alt="img" style="height:150px;">
                                </div>
                                <div class="services-08-thumb">
                                    <img src="admin_sopakix/images/service/<?php echo $row['image']; ?>" alt="img">
                                </div>
                                <div class="services-08-content">
                                    <h3><a href="javascript:void(0)"><?php echo $row['title']; ?></a></h3>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<h1 style='text-align:center;'>Service Not Available</h1>";
                }
                ?>

            </div>
        </div>
    </section>
    <!-- service-details2-area-end -->

    <!-- video-area -->
    <section id="video" class="video-area pt-150 pb-150 p-relative" style="background-image:url(img/bg/video-bg.png); background-repeat: no-repeat; background-position: center bottom; background-size:cover;">
        <!-- Lines -->
        <div class="content-lines-wrapper2">
            <div class="content-lines-inner2">
                <div class="content-lines2"></div>
            </div>
        </div>
        <!-- Lines -->
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="s-video-wrap">
                        <div class="s-video-content">
                            <a href="javascript:void(0)" class="popup-video"><img src="img/bg/play-button.png" alt="circle_right"></a>

                        </div>
                    </div>
                    <div class="section-title center-align text-center">
                        <h2>
                            Take A Tour Of Luxuri
                        </h2>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- video-area-end -->

    <!-- room-area-->
    <section id="services" class="services-area pt-113 pb-150">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="section-title center-align mb-50 text-center">
                        <h5>The pleasure of luxury</h5>
                        <h2>Rooms & Suites</h2>
                    </div>
                </div>
            </div>
            <div class="row services-active">

                <?php
                $query = "SELECT * FROM `room`";
                $query_run = mysqli_query($con, $query);
                $row_check = mysqli_num_rows($query_run) > 0;
                if ($row_check) {
                    while ($row = mysqli_fetch_assoc($query_run)) {

                        // id encrypt 
                        $u_id = $row['id'] * 525325.24;
                        $id = base64_encode($u_id);
                        // id encrypt

                ?>
                        <div class="col-xl-4 col-md-6">
                            <div class="single-services ser-m mb-30">
                                <div class="services-thumb">
                                    <a class="gallery-link popup-image" href="admin_sopakix/images/room/<?php echo $row['image']; ?>">
                                        <img src="admin_sopakix/images/room/<?php echo $row['image']; ?>" alt="img" style="height: 250px;">
                                    </a>
                                </div>
                                <div class="services-content">
                                <div class="day-book">
                                        <ul>
                                            <li>&#8377;<?php echo $row['rate']; ?>/Night</li>
                                            <li><a href="room_details.php?rd=<?php echo $id; ?>">View Details</a></li>
                                        </ul>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-12 col-md-6">
                                            <h4><a href="room_details.php?rd=<?php echo $id; ?>"><?php echo $row['title']; ?></a></h4>
                                        </div>
                                        <div class="col-xl-12 col-md-6">
                                           <?php
                                                
                                            if($row['no_of_room'] > 0){

                                            ?> <h6><b><?php echo $row['no_of_room']; ?> - Room Available</h6></b><?php

                                            }else{
                                                ?><h6><b><?php echo"Room Not Available"; ?></b></h6><?php
                                            }
                                            
                                            ?>
                                        </div>
                                    </div>
                                    <p><?php $string = $row['description'];
                                        echo $string = substr($string, 0, 96) . '.'; ?></p>
                                    <div class="icon">
                                        <ul>
                                            <?php
                                            if ($row['wifi'] == 0) {

                                            ?> <li><img src="images/icons/wifi.png" alt="img"></li><?php

                                                                                                } else {
                                                                                                    ?> <li><img src="images/icons/no-wifi.png" alt="img"></li> <?php
                                                                                                                                                            }
                                                                                                                                                                ?>

                                            <?php

                                            if ($row['ac'] == 0) {

                                            ?> <li><img src="images/icons/air-conditioner.png" alt="img"></li><?php

                                                                                                            } else {

                                                                                                                ?> <li><img src="images/icons/not-air-conditioner.png" alt="img"></li> <?php

                                                                                                                                                                                    }

                                                                                                                                                                                        ?>

                                            <?php
                                            if ($row['breakfast'] == 0) {

                                            ?> <li><img src="images/icons/breakfast.png" alt="img"></li><?php

                                                                                                    } else {

                                                                                                        ?> <li><img src="images/icons/no-breakfast.png" alt="img"></li> <?php

                                                                                                                                                                    }
                                                                                                                                                                        ?>

                                            <?php
                                            if ($row['hair_dryer'] == 0) {

                                            ?> <li><img src="images/icons/hairdryer.png" alt="img"></li><?php

                                                                                                    } else {

                                                                                                        ?> <li><img src="images/icons/no-hairdryer.png" alt="img"></li> <?php

                                                                                                                                                                    }
                                                                                                                                                                        ?>

                                            <?php
                                            if ($row['ro_water'] == 0) {

                                            ?> <li><img src="images/icons/ro_water.png" alt="img"></li><?php

                                                                                                    } else {

                                                                                                        ?> <li><img src="images/icons/no-ro_water.png" alt="img"></li> <?php

                                                                                                                                                                    }
                                                                                                                                                                        ?>

                                            <?php
                                            if ($row['laundry'] == 0) {

                                            ?> <li><img src="images/icons/washing-machine.png" alt="img"></li><?php

                                                                                                            } else {

                                                                                                                ?> <li><img src="images/icons/no-washing-machine.png" alt="img"></li> <?php

                                                                                                                                                                                    }
                                                                                                                                                                                        ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<h1 style='text-align:center;'>Room Not Available</h1>";
                }
                ?>

            </div>
        </div>
    </section>
    <!-- room-area-end -->

    <!-- Gallery Start -->
    <section id="service-details2" class="pt-40 p-relative" style="background-color: #f7f5f1;">
        <div class="animations-01"><img src="img/bg/an-img-01.png" alt="an-img-01"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="section-title center-align mb-50 text-center">
                        <h5>White Pearl</h5>
                        <h2>Images</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="about-area5 about-p p-relative topshed">
                    <div class="container pt-80 pb-40">
                        <div class="row">
                            <?php
                            $query = "SELECT * FROM `gallery` LIMIT 6";
                            $query_run = mysqli_query($con, $query);
                            $row_check = mysqli_num_rows($query_run) > 0;
                            if ($row_check) {
                                while ($row = mysqli_fetch_assoc($query_run)) {

                            ?>
                                    <div class="col-xl-4 col-md-4">
                                        <div class="ser-m mb-30">
                                            <div class="services-thumb">
                                                <a class="gallery-link popup-image" href="admin_sopakix/images/gallery/<?php echo $row['image']; ?>">
                                                    <img src="admin_sopakix/images/gallery/<?php echo $row['image']; ?>" alt="a" style="height:300px;">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "<h1 style='text-align:center;'>Image Not Available</h1>";
                            }
                            ?>

                        </div>

                        <div class="col-xl-2 col-lg-2 d-none d-lg-block">
                            <a href="gallery.php" class="btn ss-btn mb-5">View More </a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Gallery End -->

    <!-- Blog Start -->
    <section id="service-details2" class="pt-40 p-relative">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="section-title center-align mb-20 text-center">
                        <h5>White Pearl</h5>
                        <h2>Images</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">

                <?php
                $query = "SELECT * FROM `blog` LIMIT 6";
                $query_run = mysqli_query($con, $query);
                $row_check = mysqli_num_rows($query_run) > 0;
                if ($row_check) {
                    while ($row = mysqli_fetch_assoc($query_run)) {

                        // id encrypt 
                        $u_id = $row['id'] * 525325.24;
                        $id = base64_encode($u_id);
                        // id encrypt

                ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-post2 hover-zoomin mb-30 wow fadeInUp animated" data-animation="fadeInUp" data-delay=".4s">
                                <div class="blog-thumb2">
                                    <a href="blog_details.php?bd=<?php echo $id; ?>"><img src="admin_sopakix/images/blog/<?php echo $row['image']; ?>" alt="img" style="height:250px;"></a>
                                </div>
                                <div class="blog-content2">
                                    <div class="date-home">
                                        <?php echo date('d-m-Y', strtotime($row["blog_date"])); ?>
                                    </div>
                                    <h4><a href="blog_details.php?bd=<?php echo $id; ?>"><?php echo $row['title']; ?></a></h4>
                                    <p><?php $string = $row['message'];
                                        echo $string = substr($string, 0, 95) . '.'; ?></p>
                                    <div class="blog-btn"><a href="blog_details.php?bd=<?php echo $id; ?>">Read More</a></div>

                                </div>
                            </div>
                        </div>

                <?php
                    }
                } else {
                    echo "<h1 style='text-align:center;'>Blog Not Available</h1>";
                }
                ?>

                <div class="col-xl-2 col-lg-2 d-none d-lg-block">
                    <a href="blog.php" class="btn ss-btn mb-5">View More </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog End -->

</main>
<!-- main-area-end -->

<?php include("common/footer.php"); ?>