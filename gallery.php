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
    <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrc-bg.jpg);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrumb-wrap text-center">
                        <div class="breadcrumb-title">
                            <h2>Image Gallery</h2>
                            <div class="breadcrumb-wrap">

                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Image Gallery</li>
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
    <div class="about-area5 about-p p-relative topshed">
        <div class="container pt-80 pb-40">
            <div class="row">
                <?php
                $query = "SELECT * FROM `gallery`";
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
                }else{
                    echo"<h1 style='text-align:center;'>Image Not Available</h1>";
                }
                ?>

            </div>
        </div>
    </div>
    <!-- service-details-area-end -->
</main>
<!-- main-area-end -->

<?php include("common/footer.php"); ?>