<?php include("common/header.php"); ?>
<?php require("common/db_connect.php"); ?>

<style>
    .topshed {
        background-image: url(images/top-shadow.png), url(images/linebg.jpg);
        background-position: top left, top left;
        background-repeat: repeat-x, repeat;
    }
</style>

<!-- main-area -->
<main>
    <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrc-bg.jpg)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrumb-wrap text-center">
                        <div class="breadcrumb-title">
                            <h2>Registration</h2>
                            <div class="breadcrumb-wrap">

                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Registration</li>
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

    <!-- contact-area -->
    <section class="contact-area topshed after-none pt-50 pb-50 p-relative fix">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-7 order-2">
                    <div class="contact-bg02">
                        <?php include("common/alert_msg.php"); ?>
                        <div class="section-title center-align mb-40 text-center wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                            <h2>Registration</h2>
                        </div>
                        <form action="<?php echo htmlspecialchars("user/user_registration.action.php"); ?>" method="post" class="contact-form mt-30">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="contact-field p-relative c-name mb-20">
                                        <input type="text" id="name" name="name" placeholder="Name" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <input type="number" id="contact_no" name="contact_no" placeholder="Contact No." required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <input type="email" id="email" name="email" placeholder="Eamil" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <input type="text" id="password" name="password" placeholder="Password" required>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="slider-btn">
                                        <button class="btn ss-btn" type="submit" name="registration_submit" data-animation="fadeInRight" data-delay=".8s"><span>Submit Now</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-lg-12 col-md-12 mt-4">
                        <p><b>Have an account ?</b> <a href="login.php"><b>  Login</b></a></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- contact-area-end -->

</main>
<!-- main-area-end -->

<?php include("common/footer.php"); ?>