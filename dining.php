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
                            <h2>Dining</h2>
                            <div class="breadcrumb-wrap">

                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Dining</li>
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
                $query = "SELECT * FROM `dining`";
                $query_run = mysqli_query($con, $query);
                $row_check = mysqli_num_rows($query_run) > 0;
                if ($row_check) {
                    while ($row = mysqli_fetch_assoc($query_run)) {

                        // id encrypt 
                        $u_id = $row['id'] * 525325.24;
                        $id = base64_encode(strip_tags(trim($u_id)));
                        // id encrypt

                ?>
                        <div class="col-xl-6 col-md-6">
                            <div class="single-services ser-m mb-10">
                                <div class="services-thumb">
                                    <a class="gallery-link popup-image" href="admin_sopakix/images/dining/<?php echo $row['image']; ?>">
                                        <img src="admin_sopakix/images/dining/<?php echo $row['image']; ?>" alt="img" style="height: 380px;">
                                    </a>
                                </div>
                                <div class="services-content">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-6">
                                            <h4><a href="dining_details.php?rd=<?php echo $id; ?>"><?php echo $row['title']; ?></a></h4>
                                        </div>

                                    </div>

                                    <p><?php $string = $row['description'];
                                        echo $string = substr($string, 0, 96) . '.'; ?></p>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "<h1 style='text-align:center;'>Details Not Available</h1>";
                }
                ?>



            </div>
        </div>
    </section>
    <!-- room-area-end -->

</main>
<!-- main-area-end -->

<?php include("common/footer.php"); ?>