<?php
ob_start();
session_start();
session_regenerate_id(true); //generate cookies new id after refresh
// error_reporting(0);

?>

<!doctype html>
<html lang="en">
<!-- Mirrored from themesbrand.com/veltrix/layouts/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Mar 2023 05:13:58 GMT -->

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/fav.png">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="home-btn d-none d-sm-block">
        <a href="../index.php" class="text-dark"><i class="fas fa-home h2"></i></a>
    </div>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card overflow-hidden">
                        <div class="bg-primary">
                            <div class="text-primary text-center p-4">
                                <h5 class="text-white font-size-20">Welcome Back !</h5>
                                <p class="text-white-50">Sign in to continue to <b>White Pearl</b>.</p>
                                <a href="../index.php" class="logo logo-admin">
                                    <img src="assets/images/logo.png" height="40" alt="logo">
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-4">
                            <div class="p-3">
                                <form class="mt-4" method="post" action="<?php echo htmlspecialchars('login_code.php') ?>">

                                    <div class="mb-3">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
                                        <?php
                                        if (isset($_SESSION['user_name'])) {
                                            echo "<div class='text-danger'> " . $_SESSION['user_name'] . " </div>";
                                            unset($_SESSION['user_name']);
                                        }
                                        ?>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="userpassword">Password</label>
                                        <input type="password" name="password" class="form-control" id="userpassword" placeholder="Enter Password">
                                        <?php
                                        if (isset($_SESSION['user_password'])) {
                                            echo "<div class='text-danger'> " . $_SESSION['user_password'] . " </div>";
                                            unset($_SESSION['user_password']);
                                        }
                                        ?>
                                    </div>

                                    <div class="mb-3 row">
                                        <!-- <div class="col-sm-6">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customControlInline">
                                                <label class="form-check-label" for="customControlInline">Remember me</label>
                                            </div>
                                        </div> -->
                                        <div class="col-sm-6 text-end">
                                            <button class="btn btn-primary w-md waves-effect waves-light fa-pull-left" name="login_btn" type="submit">Log In</button>
                                        </div>
                                    </div>

                                    <!-- <div class="mt-2 mb-0 row">
                                        <div class="col-12 mt-4">
                                            <a href="pages-recoverpw.html"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                        </div>
                                    </div> -->

                                </form>
                                <div style="text-align: center;">
                                    <?php include("common/alert_msg.php"); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 text-center">
                        <!-- <p>Don't have an account ? <a href="pages-register.html" class="fw-medium text-primary"> Signup now </a> </p> -->
                        <p class="mb-0">© <script>
                                document.write(new Date().getFullYear())
                            </script> White Pearl <br> Crafted with <i class="mdi mdi-heart text-danger"></i> By : <a href="http://google.com/" target="_blank" style="color:#626ed4;text-decoration:none;">info Technology (P) Ltd.</a></p>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>
<!-- Mirrored from themesbrand.com/veltrix/layouts/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Mar 2023 05:13:58 GMT -->

</html>