<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">


    <meta name='og:image' content='../images/assets/ogg.png'>


    <title>Homy - PG Directory Listing</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="../images/fav-icon/icon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" media="all">
    <!-- Main style sheet -->
    <link rel="stylesheet" type="text/css" href="../css/style.css" media="all">
    <!-- responsive style sheet -->
    <link rel="stylesheet" type="text/css" href="../css/responsive.css" media="all">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>





</head>

<body>

    //show the signup success message


    <?php
    if (isset($_SESSION['signup_success'])) {
        //using sweet alert for showing success message
        echo "<script>Swal.fire('Success', 'You have successfully signed up!', 'success');</script>";
        unset($_SESSION['signup_success']);
    }
    ?>




    <div class="main-page-wrapper">


        <!-- 
		=============================================
			Main Menu Start
		============================================== 
		-->
        <header class="theme-main-menu menu-overlay menu-style-one sticky-menu">

            <div class="alert-wrapper text-center">
                <p class="fs-16 m0 text-white">This Login Page Is For<a href="listing_01.html" class="fw-500"> PG Owners
                    </a> Only</p>
            </div>


            <div class="inner-content gap-one">
                <div class="top-header position-relative">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="logo order-lg-0">
                            <a href="../index.php" class="d-flex align-items-center">
                                <img src="../images/logo/logo_01.svg" alt="">
                            </a>
                        </div>
                        <!-- logo -->

                        <nav class="navbar navbar-expand-lg p0 order-lg-2">
                            <button class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav align-items-lg-center">
                                    <li class="d-block d-lg-none">
                                        <div class="logo"><a href="../index.php" class="d-block"><img
                                                    src="../images/logo/logo_01.svg" alt=""></a></div>
                                    </li>


                                    <li class="nav-item ">
                                        <a class="nav-link" href="../index.php">Home</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="./listing.php">PG Listing</a>
                                    </li>

                                    <li class="nav-item dashboard-menu">
                                        <a class="nav-link" href="./pgowner.php">For PG Owners</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="./about.php">About Us</a>
                                    </li>


                                    <li class="nav-item">
                                        <a class="nav-link" href="./contact-us.php">Contact Us</a>
                                    </li>

                                    <li class="d-md-none ps-2 pe-2 mt-20">
                                        <a href="dashboard/add-property.html" class="btn-two w-100"
                                            target="_blank"><span>Add Listing</span> <i
                                                class="fa-thin fa-arrow-up-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <!--/.top-header-->
            </div> <!-- /.inner-content -->
        </header>
        <!-- 
		=============================================
			Main Menu Ends
		============================================== 
		-->


        <!-- ################### Login Modal ####################### -->
        <!-- Modal -->
        <div class="pt-150">
            <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                <div class="container">
                    <div class="user-data-form modal-content">

                        <div class="form-wrapper m-auto">
                            <ul class="nav nav-tabs w-100" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#fc1"
                                        role="tab">Login</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#fc2"
                                        role="tab">Signup</button>
                                </li>
                            </ul>
                            <div class="tab-content mt-30">
                                <div class="tab-pane show active" role="tabpanel" id="fc1">
                                    <div class="text-center mb-20">
                                        <h2>Welcome Back!</h2>

                                    </div>
                                    <form id="loginForm" action="./sign-up_in-handler/pgowner-login.php" method="POST">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-group-meta position-relative mb-25">
                                                    <label>Email*</label>
                                                    <input id="emailField" type="email" name="pg_owner_loginemail"
                                                        placeholder="Youremail@gmail.com">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group-meta position-relative mb-20">
                                                    <label>Password*</label>
                                                    <input id="passwordField" type="password" name="pg_owner_loginpassword"
                                                        placeholder="Enter Password" class="pass_log_id">
                                                    <span class="placeholder_icon"><span class="passVicon"><img
                                                                src="../images/icon/icon_68.svg" alt=""></span></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div
                                                    class="agreement-checkbox d-flex justify-content-between align-items-center">

                                                    <a href="#">Forget Password?</a>
                                                </div> <!-- /.agreement-checkbox -->
                                            </div>
                                            <div class="col-12">
                                                <button
                                                    class="btn-two w-100 text-uppercase d-block mt-20">Login</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" role="tabpanel" id="fc2">
                                    <div class="text-center mb-20">
                                        <h2>Register</h2>

                                    </div>


                                    <!-- This is signup form Start-->


                                    <form action="./sign-up_in-handler/pgowner-signup.php" method="POST">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-group-meta position-relative mb-25">
                                                    <label>Name*</label>
                                                    <input type="text" name="pgownername" plaaceholder=" Zubayer Hasan">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group-meta position-relative mb-25">
                                                    <label>Email*</label>
                                                    <input type="email" name="pgowneremail"
                                                        placeholder="zubayerhasan@gmail.com">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group-meta position-relative mb-20">
                                                    <label>Password*</label>
                                                    <input type="password" placeholder="Enter Password"
                                                        name="pgownerpassword" class="pass_log_id">
                                                    <span class="placeholder_icon"><span class="passVicon"><img
                                                                src="../images/icon/icon_68.svg" alt=""></span></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div
                                                    class="agreement-checkbox d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <input type="checkbox" id="remember2">
                                                        <label for="remember2">By hitting the "Register" button, you
                                                            agree to the <a href="#">Terms conditions</a> & <a
                                                                href="#">Privacy Policy</a></label>
                                                    </div>
                                                </div> <!-- /.agreement-checkbox -->
                                            </div>
                                            <div class="col-12">
                                                <button class="btn-two w-100 text-uppercase d-block mt-20">Sign
                                                    Up</button>
                                            </div>
                                        </div>
                                    </form>

                                    <!-- This is signup form end -->

                                </div>
                                <!-- /.tab-pane -->
                            </div>

                        </div>
                        <!-- /.form-wrapper -->
                    </div>
                    <!-- /.user-data-form -->
                </div>
            </div>
        </div>





















    </div>


    <!-- jQuery first, then Bootstrap JS -->
    <!-- jQuery -->
    <script src="../vendor/jquery.min.js"></script>


    <!-- Bootstrap JS -->
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- WOW js -->
    <script src="../vendor/wow/wow.min.js"></script>
    <!-- Slick Slider -->
    <script src="../vendor/slick/slick.min.js"></script>
    <!-- Fancybox -->
    <script src="../vendor/fancybox/fancybox.umd.js"></script>
    <!-- Lazy -->
    <script src="../vendor/jquery.lazy.min.js"></script>
    <!-- js Counter -->
    <script src="../vendor/jquery.counterup.min.js"></script>
    <script src="../vendor/jquery.waypoints.min.js"></script>
    <!-- Nice Select -->
    <script src="../vendor/nice-select/jquery.nice-select.min.js"></script>
    <!-- validator js -->
    <script src="../vendor/validator.js"></script>
    <!-- isotop -->
    <script src="../vendor/isotope.pkgd.min.js"></script>

    <!-- Theme js -->
    <script src="../js/theme.js"></script>
    


</body>
</html>