<?php include("common/header.php"); ?>
<?php include("common/db_connect.php"); ?>

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
                                            $u_id = base64_decode(strip_tags(trim($_GET['rd'])));
                                            $id = $u_id / 525325.24;
                                            // id decrypt 

                                            $dining_id = $id;
                                            $query = "SELECT * FROM `dining` WHERE `id`='$dining_id'";
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


            <?php
                if (isset($_GET['rd'])) {

                    // id decrypt 
                    $u_id = base64_decode(strip_tags(trim($_GET['rd'])));
                    $id = $u_id / 525325.24;
                    // id decrypt 

                    $dining_id = $id;
                    $query = "SELECT * FROM `dining` WHERE `id`='$dining_id'";
                    $query_run = mysqli_query($con, $query);
                    $row_check = mysqli_num_rows($query_run) > 0;
                    if ($row_check) {
                        while ($row = mysqli_fetch_assoc($query_run)) {


                            // id encrypt 
                            $u_id = $row['id'] * 525325.24;
                            $r_id = base64_encode(strip_tags(trim($u_id)));
                            // id encrypt

                ?>
                            <div class="col-lg-8 col-md-12 col-sm-12 order-1">
                                <div class="service-detail">

                                    <div class="two-column">
                                        <div class="row">
                                            <div class="image-column col-xl-12 col-lg-12 col-md-12">
                                                <figure class="image"><img src="admin_sopakix/images/dining/<?php echo $row['image']; ?>" alt="" style="height: 500px;"></figure>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="content-box">
                                        <div class="row align mb-10">
                                            <div class="col-lg-12 col-md-12">
                                                <div class="price">
                                                    <h2><?php echo $row['title']; ?></h2>
                                                </div>
                                            </div>
                                        </div>
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


                <!-- #right side -->
                <div class="col-sm-12 col-md-12 col-lg-4 order-2">
                    <aside class="sidebar-widget">
                 
                    <section id="custom_html-5" class="widget_text widget widget_custom_html">
                        <h2 class="widget-title">Follow Us</h2>
                        <div class="textwidget custom-html-widget">
                            <div class="widget-social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-youtube"></i></a>
                                <a href="#"><i class="fab fa-linkedin"></i></a>
                                <a href="#"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </section>
                    <section id="categories-1" class="widget widget_categories">
                        <h2 class="widget-title">Events & Banquets</h2>
                        <ul>
                            <?php
                            $query = "SELECT * FROM `event`";
                            $query_run = mysqli_query($con, $query);
                            $row_check = mysqli_num_rows($query_run) > 0;
                            if ($row_check) {
                                while ($row = mysqli_fetch_assoc($query_run)) {

                                    // id encrypt 
                                    $u_id = $row['id'] * 525325.24;
                                    $id = base64_encode(strip_tags(trim($u_id)));
                                    // id encrypt

                            ?>
                                    <li class="cat-item cat-item-16"><a href="event_details.php?rd=<?php echo $id; ?>"><?php echo $row['title']; ?></a></li>
                            <?php
                                }
                            } else {
                                echo "<h1 style='text-align:center;'>Blog Not Available</h1>";
                            }
                            ?>
                        </ul>
                    </section>
                    <section id="recent-posts-4" class="widget widget_recent_entries">
                        <h2 class="widget-title">Dining</h2>
                        <ul>
                            <?php
                            $query = "SELECT * FROM `dining`";
                            $query_run = mysqli_query($con, $query);
                            $row_check = mysqli_num_rows($query_run) > 0;
                            if ($row_check) {
                                while ($data = mysqli_fetch_assoc($query_run)) {

                                    // id encrypt 
                                    $u_id = $data['id'] * 525325.24;
                                    $id = base64_encode($u_id);
                                    // id encrypt

                            ?>
                                    <li>
                                        <a href="dining_details.php?rd=<?php echo $id; ?>"><?php echo $data['title']; ?></a>
                                    </li>

                            <?php
                                }
                            } else {
                                echo "<h1 style='text-align:center;'>Details Not Available</h1>";
                            }
                            ?>
                        </ul>
                    </section>
                
                    </aside>
                </div>
                <!-- #right side end -->
            </div>
        </div>
    </div>
    <!-- service-details-area-end -->

</main>
<!-- main-area-end -->

<?php include("common/footer.php"); ?>


