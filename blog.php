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
                            <h2>Blog</h2>
                            <div class="breadcrumb-wrap">

                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Blog</li>
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
    <!-- blog-area -->
    <section id="blog" class="blog-area p-relative fix pt-90 pb-90 topshed">
        <div class="animations-02"><img src="img/bg/an-img-06.png" alt="contact-bg-an-05"></div>
        <div class="container">
            <!-- <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="section-title center-align mb-50 text-center wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                        <h5>Our Blog</h5>
                        <h2>
                            Latest Blog & News
                        </h2>
                        <p>Proin consectetur non dolor vitae pulvinar. Pellentesque sollicitudin dolor eget neque viverra, sed interdum metus interdum. Cras lobortis pulvinar dolor, sit amet ullamcorper dolor iaculis vel</p>
                    </div>

                </div>
            </div> -->
            <div class="row">
                <?php
                $query = "SELECT * FROM `blog`";
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

            </div>
        </div>
    </section>
    <!-- blog-area-end -->
</main>
<!-- main-area-end -->

<?php include("common/footer.php"); ?>