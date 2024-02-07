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
                            <h2>Room Image Gallery</h2>
                            <div class="breadcrumb-wrap">

                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <?php
                                        if (isset($_GET['SI'])) {

                                            // id decrypt 
                                            $u_id = base64_decode($_GET['SI']);
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
    <div class="about-area5 about-p p-relative topshed">
        <div class="container pt-80 pb-40">
            <div class="row">
                <?php
                if (isset($_GET['SI'])) {

                    // id decrypt 
                    $u_id = base64_decode($_GET['SI']);
                    $id = $u_id / 525325.24;
                    // id decrypt 

                    $room_id = $id;

                    $query = "SELECT * FROM `room_gallery` WHERE `room_id`='$room_id'";
                    $query_run = mysqli_query($con, $query);
                    $row_check = mysqli_num_rows($query_run) > 0;
                    if ($row_check) {
                        while ($row = mysqli_fetch_assoc($query_run)) {

                ?>
                            <div class="col-xl-4 col-md-4">
                                <div class="ser-m mb-30">
                                    <div class="services-thumb">
                                        <a class="gallery-link popup-image" href="admin_sopakix/images/room_images/<?php echo $row['image']; ?>">
                                            <img src="admin_sopakix/images/room_images/<?php echo $row['image']; ?>" alt="a" style="height:300px;">
                                        </a>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    } else {

                        echo "<h1>Image Not Available</h1>";
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