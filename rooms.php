<?php include("common/header.php"); ?>
<?php include("common/db_connect.php"); ?>

<style>
    .topshed {

        background-image: url(images/top-shadow.png), url(images/linebg.jpg);
        background-position: top left, top left;
        background-repeat: repeat-x, repeat;
    }
</style>
<!-- main-area -->
<main>
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrc-bg.jpg)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrumb-wrap text-center">
                        <div class="breadcrumb-title">
                            <h2>Rooms & Suites</h2>
                            <div class="breadcrumb-wrap">

                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Rooms & Suites</li>
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
    <!-- room-area-->
    <section id="services" class="services-area pt-120 pb-90 topshed">
        <div class="container">
            <div class="row">

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

                        <div class="col-xl-6 col-md-6">
                            <div class="single-services ser-m mb-30">
                                <div class="services-thumb">
                                    <a class="gallery-link popup-image" href="admin_sopakix/images/room/<?php echo $row['image']; ?>">
                                        <img src="admin_sopakix/images/room/<?php echo $row['image']; ?>" alt="img" style="height: 380px;">
                                    </a>
                                </div>
                                <div class="services-content">
                                    <div class="day-book">
                                        <ul>
                                            <li>&#8377;<?php echo $row['rate']; ?> + Tax / Night</li>
                                            <!-- <li><?php echo $row['no_of_room']; ?> - Room Available</li> -->
                                            <li><a href="room_details.php?rd=<?php echo $id; ?>">View Details</a></li>
                                        </ul>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-8 col-md-6">
                                            <h4><a href="room_details.php?rd=<?php echo $id; ?>"><?php echo $row['title']; ?></a></h4>
                                        </div>
                                        <div class="col-xl-4 col-md-6 mt-2">
                                           <?php
                                                
                                            if($row['no_of_room'] > 0){

                                            ?> <h6><b><?php echo $row['no_of_room']; ?> - Room Available</b></h6><?php

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

</main>
<!-- main-area-end -->

<?php include("common/footer.php"); ?>