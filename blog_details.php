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
    <!-- search-popup -->
    <div class="modal fade bs-example-modal-lg search-bg popup1" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content search-popup">
                <div class="text-center">
                    <a href="#" class="close2" data-dismiss="modal" aria-label="Close">× close</a>
                </div>
                <div class="row search-outer">
                    <div class="col-md-11"><input type="text" placeholder="Search for products..." /></div>
                    <div class="col-md-1 text-right"><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /search-popup -->
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrc-bg.jpg);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrumb-wrap text-center">
                        <div class="breadcrumb-title">
                            <h2>Blog Details</h2>
                            <div class="breadcrumb-wrap">

                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <?php
                                        if (isset($_GET['bd'])) {

                                            // id decrypt 
                                            $u_id = base64_decode($_GET['bd']);
                                            $id = $u_id / 525325.24;
                                            // id decrypt 

                                            $blog_id = $id;

                                            $query = "SELECT * FROM `blog` WHERE `id`='$blog_id'";
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
    <!-- inner-blog -->
    <section class="inner-blog pt-120 pb-105 topshed">
        <div class="container">
            <div class="row">

                <?php
                if (isset($_GET['bd'])) {

                    // id decrypt 
                    $u_id = base64_decode($_GET['bd']);
                    $id = $u_id / 525325.24;
                    // id decrypt 

                    $blog_id = $id;

                    $query = "SELECT * FROM `blog` WHERE `id`='$blog_id'";
                    $query_run = mysqli_query($con, $query);
                    $row_check = mysqli_num_rows($query_run) > 0;
                    if ($row_check) {
                        while ($row = mysqli_fetch_assoc($query_run)) {


                ?>
                            <div class="col-lg-8">
                                <div class="bsingle__post mb-50">
                                    <div class="bsingle__post-thumb">
                                        <img src="admin_sopakix/images/blog/<?php echo $row['image']; ?>" alt="img">
                                    </div>
                                    <div class="bsingle__content">
                                        <div class="date-home">
                                            <?php echo date('d-m-Y', strtotime($row["blog_date"])); ?>
                                        </div>
                                        <h2><a href="javascript:void(0)"><?php echo $row['title']; ?></a></h2>
                                        <p><?php echo $row['message']; ?></p>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    }
                } else {
                    echo "<h1 style='text-align:center;'>Blog Not Available</h1>";
                }
                ?>


                <div class="col-sm-12 col-md-12 col-lg-4">
                    <aside class="sidebar-widget">
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
                            <h2 class="widget-title">Recent Posts</h2>
                            <ul>
                                <?php
                                $query = "SELECT * FROM `blog`";
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
                                            <a href="blog_details.php?bd=<?php echo $id; ?>"><?php echo $data['title']; ?></a>
                                            <span class="post-date"> <?php echo date('d-m-Y', strtotime($data["blog_date"])); ?></span>
                                        </li>

                                <?php
                                    }
                                } else {
                                    echo "<h1 style='text-align:center;'>Blog Not Available</h1>";
                                }
                                ?>
                            </ul>
                        </section>
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
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- inner-blog-end -->
</main>
<!-- main-area-end -->


<?php include("common/footer.php"); ?>