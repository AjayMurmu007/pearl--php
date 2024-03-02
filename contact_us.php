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
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area d-flex align-items-center" style="background-image:url(img/bg/bdrc-bg.jpg)">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-12 col-lg-12">
                    <div class="breadcrumb-wrap text-center">
                        <div class="breadcrumb-title">
                            <h2>Contact Us</h2>
                            <div class="breadcrumb-wrap">

                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
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
    <section class="contact-area topshed after-none pt-120 pb-50 p-relative fix">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-4 order-1">
                    <div class="contact-info">
                        <div class="section-title center-align mb-40 text-center wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                            <h2>Contact Details</h2>
                        </div>
                        <div class="single-cta pb-30 mb-30 wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                            <div class="f-cta-icon">
                                <i class="far fa-map"></i>
                            </div>
                            <h5>Office Address</h5>
                            <p>3rd Floor, ABC Plaza, Opp. nand Tower
                                ABC, Dhanbad - 826111</p>
                        </div>
                        <div class="single-cta pb-30 mb-30 wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                            <div class="f-cta-icon">
                                <i class="far fa-phone"></i>
                            </div>
                            <h5>Contact Number</h5>
                            <p>+91-769563510, +91-844218071 <br>
                                0326-1200 480 </p>
                        </div>
                        <div class="single-cta wow fadeInUp animated" data-animation="fadeInDown animated" data-delay=".2s">
                            <div class="f-cta-icon">
                                <i class="far fa-envelope-open"></i>
                            </div>
                            <h5>Message Us</h5>
                            <p> <a href="#">uni@up.in</a><br><a href="#">uni@up.in</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 order-2">
                    <div class="contact-bg02">
                        <?php include("common/alert_msg.php"); ?>
                        <div class="section-title center-align mb-40 text-center wow fadeInDown animated" data-animation="fadeInDown" data-delay=".4s">
                            <h2>
                                Get In Touch
                            </h2>
                        </div>
                        <form action="<?php echo htmlspecialchars("code/contact_us.action.php"); ?>" method="post" class="contact-form mt-30">
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
                                <div class="col-lg-6 col-md-6">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <input type="email" id="email" name="email" placeholder="Eamil">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <input type="text" id="location" name="location" placeholder="City/Location">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-message mb-30">
                                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Write comments"></textarea>
                                    </div>
                                    <div class="slider-btn">
                                        <button class="btn ss-btn" type="submit" name="contact_submit" data-animation="fadeInRight" data-delay=".8s"><span>Submit Now</span></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="about-title second-title pt-30">
                        <h3>Approach</h3>
                    </div>
                    <ul class="green mb-20">
                        <li>&#10070; Dhanbad To Kolkata &nbsp;&nbsp; : Approx. 272 Km (5 Hrs. Drive)</li>
                        <li>&#10070; Dhanbad To Ranchi &nbsp;&nbsp;&nbsp; : Approx. 165 Km (4 Hrs. Drive)</li>
                        <li>&#10070; Dhanbad To Patna &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Approx. 325 Km (6 Hrs. Drive)</li>
                        <li>&#10070; Dhanbad To Gaya &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : Approx. 218 Km (4 Hrs. Drive)</li>
                    </ul>
                    <div class="about-title second-title pt-10">
                        <h3>Distance</h3>
                    </div>
                    <ul class="green mb-30">
                        <li>&#10070; Dhanbad Railway Station - 2 Km</li>
                        <li>&#10070; Dhanbad Bus Stand - 5 Km</li>
                        <li>&#10070; Dhanbad Airport - 8 Km</li>
                        <li>&#10070; GT Road (GQ-NH2) - 10 Km</li>
                        <li>&#10070; Durgapur Airport - 110 Km</li>
                    </ul>
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58407.44506063921!2d86.39304997248263!3d23.802047130333875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f6a30804ccfc6d%3A0xfa151e1b85f764e7!2sDhanbad%2C%20Jharkhand!5e0!3m2!1sen!2sin!4v1685089518142!5m2!1sen!2sin" width="100%" height="355" style="border:0;margin-top:20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->

</main>
<!-- main-area-end -->

<?php include("common/footer.php"); ?>