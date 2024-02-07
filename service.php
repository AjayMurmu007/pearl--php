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
                            <h2>Service</h2>
                            <div class="breadcrumb-wrap">

                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Service</li>
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

    <!-- service-details2-area -->
    <section id="service-details2" class="pt-120 pb-90 p-relative topshed">
        <div class="animations-01"><img src="img/bg/an-img-01.png" alt="an-img-01"></div>
        <div class="container">
            <div class="row align-items-center">

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

</main>
<!-- main-area-end -->

<?php include("common/footer.php"); ?>