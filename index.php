<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">


    <meta name='og:image' content='images/assets/ogg.png'>


    <title>Homy - PG Directory Listing</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="images/fav-icon/icon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" media="all">
    <!-- Main style sheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all">
    <!-- responsive style sheet -->
    <link rel="stylesheet" type="text/css" href="css/responsive.css" media="all">


</head>

<body>


    <div class="main-page-wrapper">

        <!-- ===================================================
			Loading Transition
		==================================================== -->
        <!-- <div id="preloader">
			<div id="ctn-preloader" class="ctn-preloader">
				<div class="icon"><img src="images/loader.gif" alt="" class="m-auto d-block" width="64"></div>
			</div>
		</div> -->



        <!-- 
		=============================================
			Main Menu Start
		============================================== 
		-->
        <header class="theme-main-menu menu-overlay menu-style-one sticky-menu">


            <div class="inner-content gap-one">
                <div class="top-header position-relative">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="logo order-lg-0">
                            <a href="#" class="d-flex align-items-center">
                                <img src="images/logo/logo_01.svg" alt="">
                            </a>
                        </div>
                        <!-- logo -->
                        <div class="right-widget ms-auto ms-lg-0 me-3 me-lg-0 order-lg-3">
                            <ul class="d-flex align-items-center style-none">
                                <li>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" class="btn-one"><i class="fa-regular fa-lock"></i> <span>Login / Sign Up</span></a>
                                </li>

                            </ul>
                        </div>
                        <nav class="navbar navbar-expand-lg p0 order-lg-2">
                            <button class="navbar-toggler d-block d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav align-items-lg-center">
                                    <li class="d-block d-lg-none">
                                        <div class="logo"><a href="#" class="d-block"><img src="images/logo/logo_01.svg" alt=""></a></div>
                                    </li>


                                    <li class="nav-item dashboard-menu">
                                        <a class="nav-link" href="./index.php">Home</a>
                                    </li>

                                    <li class="nav-item ">
                                        <a class="nav-link" href="./pages/listing.php">PG
                                            Listing</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="./pages/pgowner.php">For PG
                                            Owners</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="./pages/about.php">About
                                            Us</a>
                                    </li>


                                    <li class="nav-item">
                                        <a class="nav-link" href="./pages/contact-us.php">Contact
                                            Us</a>
                                    </li>

                                    <li class="d-md-none ps-2 pe-2 mt-20">
                                        <a href="dashboard/add-property.html" class="btn-two w-100" target="_blank"><span>Add Listing</span> <i class="fa-thin fa-arrow-up-right"></i></a>
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



        <!-- 
		=============================================
			Hero Banner Start
		============================================== 
		-->
        <div class="hero-banner-one bg-pink z-1 pt-225 xl-pt-200 pb-250 xl-pb-150 lg-pb-100 position-relative">
            <div class="container position-relative">
                <div class="row">
                    <div class="col-xxl-10 col-xl-9 col-lg-10 col-md-10 m-auto">
                        <h1 class="hero-heading text-center wow fadeInUp">Find The Perfect PG For You <span class="d-inline-block position-relative">With Us <img src="images/lazy.svg" data-src="images/shape/shape_01.svg" alt="" class="lazy-img"></span></h1>
                        <p class="fs-24 color-dark text-center pt-35 pb-35 wow fadeInUp" data-wow-delay="0.1s">We’ve
                            more than 20,00 places .</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xxl-10 m-auto">
                        <div class="search-wrapper-one layout-one bg position-relative">
                            <div class="bg-wrapper">
                                <form action="pages/listing.php" class="search-form-one" method="GET">
                                    <div class="row gx-0 align-items-center">
                                        <div class="col-xl-3 col-lg-4">
                                            <div class="input-box-one border-left">
                                                <div class="label">City</div>
                                                <select class="nice-select" name="property_city">
                                                    <option value="Ahmedabad">Ahmedabad</option>
                                                    <option value="Bangalore">Bangalore</option>
                                                    <option value="Chennai">Chennai</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="Gurgaon">Gurgaon</option>
                                                    <option value="Hyderabad">Hyderabad</option>
                                                    <option value="Kolkata">Kolkata</option>
                                                </select>
                                            </div>
                                            <!-- /.input-box-one -->
                                        </div>
                                        <div class="col-xl-4 col-lg-4">
                                            <div class="input-box-one border-left">
                                                <div class="label">Property Type</div>
                                                <select class="nice-select" name="property_type">
                                                    <option value="Bunglow">Bunglow</option>
                                                    <option value="Tenaments">Tenaments</option>
                                                    <option value="Flat">Flat</option>

                                                </select>
                                            </div>
                                            <!-- /.input-box-one -->
                                        </div>
                                        <div class="col-xl-3 col-lg-4">
                                            <div class="input-box-one border-left border-lg-0">
                                                <div class="label">Price Range</div>
                                                <select class="nice-select" name="price_range">
                                                    <option value="1000-5000">₹ 1000 - ₹ 5000</option>
                                                    <option value="5000-10000">₹ 5000 - ₹ 10000</option>
                                                    <option value="10000-15000">₹ 10000 - ₹ 15000</option>
                                                    <option value="15000-20000">₹ 15000 - ₹ 20000</option>
                                                    <option value="20000-25000">₹ 20000 - ₹ 25000</option>
                                                    <option value="25000-0000">₹ 25000 - ₹ 30000</option>
                                                    <option value="30000 AND 35000">₹ 30000 - ₹ 35000</option>
                                                    <option value="35000 AND 40000">₹ 35000 - ₹ 40000</option>
                                                    <option value="40000 AND 45000">₹ 40000 - ₹ 45000</option>
                                                    <option value="45000 AND 50000">₹ 45000 - ₹ 50000</option>


                                                </select>
                                            </div>
                                            <!-- /.input-box-one -->
                                        </div>
                                        <div class="col-xl-2">
                                            <!-- <div class="input-box-one lg-mt-10">
                                                <button class="fw-500 text-uppercase tran3s search-btn">Search</button>
                                            </div> -->
                                            <div class="input-box-one lg-mt-10">
                                                <button class="fw-500 text-uppercase tran3s search-btn">Search</button>
                                                <!-- /.input-box-one -->
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                        <!-- /.search-wrapper-one -->
                    </div>
                </div>
            </div>
            <img src="images/lazy.svg" data-src="images/assets/ils_01.svg" alt="" class="lazy-img shapes w-100 illustration">
        </div>
        <!-- 
		=============================================
			Hero Banner Start End
		============================================== 
		-->





        <!--
		=====================================================
			Advantages Section Start
		=====================================================
		-->
        <div class="block-feature-one mt-150 xl-mt-120">
            <div class="container">
                <div class="title-one text-center mb-50 xl-mb-30 lg-mb-20 wow fadeInUp">
                    <h3>Unlock Homy's <span>advantages <img src="images/lazy.svg" data-src="images/shape/title_shape_01.svg" alt="" class="lazy-img"></span></h3>
                    <p class="fs-24">Your Trusted PG Finder</p>
                </div>
                <!-- /.title-one -->

                <div class="row gx-xl-5">
                    <div class="col-md-4">
                        <div class="card-style-one text-center wow fadeInUp mt-40">
                            <img src="images/lazy.svg" data-src="images/icon/icon_01.svg" alt="" class="lazy-img m-auto icon">
                            <div class="fs-16 text-uppercase fw-500 fs-text mt-35 md-mt-30 mb-20">Find a Perfect PG
                            </div>
                            <p class="fs-24 ps-xxl-4 pe-xxl-4">Explore homy’s 20000+ PGs and Find your ideal living
                                space.</p>
                        </div>
                        <!-- /.card-style-one -->
                    </div>

                    <div class="col-md-4">
                        <div class="card-style-one text-center wow fadeInUp mt-40" data-wow-delay="0.2s">
                            <img src="images/lazy.svg" data-src="images/icon/icon_03.svg" alt="" class="lazy-img m-auto icon">
                            <div class="fs-16 text-uppercase fw-500 fs-text mt-35 md-mt-30 mb-20">Check The Details
                            </div>
                            <p class="fs-24 ps-xxl-4 pe-xxl-4">Check All The Details Of Any Pg You Liked</p>
                        </div>
                        <!-- /.card-style-one -->
                    </div>


                    <div class="col-md-4">
                        <div class="card-style-one text-center wow fadeInUp mt-40" data-wow-delay="0.1s">
                            <img src="images/lazy.svg" data-src="images/icon/icon_02.svg" alt="" class="lazy-img m-auto icon">
                            <div class="fs-16 text-uppercase fw-500 fs-text mt-35 md-mt-30 mb-20">Connect With Pg Owner
                            </div>
                            <p class="fs-24 ps-xxl-3 pe-xxl-3">Contact The PG Owner,Visit The PG and Start Living There
                            </p>
                        </div>
                        <!-- /.card-style-one -->
                    </div>

                </div>
            </div>
        </div>
        <!--
		=====================================================
			Advantages Section End
		=====================================================
		-->


        <!--
		=====================================================
			Who We Are Section Start
		=====================================================
		-->
        <div class="block-feature-two mt-150 xl-mt-110">
            <div class="wrapper">
                <div class="row gx-xl-5">
                    <div class="col-xxl-7 col-md-6 d-flex wow fadeInLeft">
                        <div class="block-one w-100 h-100">
                            <div class="position-relative z-1 h-100">
                                <h3 class="mb-55">Find Perfect PG With Us</h3>

                                <div class="card-box text-center">
                                    <h3 class="main-count fw-500">0<span class="counter">2</span>+</h3>
                                    <p class="fs-20">Years Experience <br>with proud.</p>
                                </div>
                                <!-- /.card-box -->

                            </div>
                        </div>
                        <!-- /.block-one -->
                    </div>
                    <div class="col-xxl-5 col-md-6 wow fadeInRight">
                        <div class="block-two">
                            <div class="bg-wrapper">
                                <h4>Who we are?</h4>
                                <p class="fs-22 mt-20"> Your One-Stop Solution For Finding The Perfect PG In Major
                                    Cities Across India.</p>
                                <div class="counter-wrapper ps-xl-3 pb-30 mt-45 mb-50">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="counter-block-one mt-20">
                                                <div class="main-count fw-500 color-dark"><span class="counter">40</span>+</div>
                                                <span>Cities</span>
                                            </div>
                                            <!-- /.counter-block-one -->
                                        </div>
                                        <div class="col-6">
                                            <div class="counter-block-one mt-20">
                                                <div class="main-count fw-500 color-dark"><span class="counter">13,000</span>+</div>
                                                <span>Happy Tenants</span>
                                            </div>
                                            <!-- /.counter-block-one -->
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-style-one fs-22 color-dark style-none">
                                    <li>Verified property owners</li>
                                    <li>No brokerage charges</li>
                                    <li>Regular listing updates</li>
                                </ul>
                                <div class="d-inline-flex flex-wrap align-items-center mt-15 md-mt-10">
                                    <a href="about_us_01.html" class="btn-two mt-20 me-4"><span>Find PG</span></a>
                                    <!-- <a href="contact.html" class="btn-three mt-20"><span>Request a Callback</span> <i class="fa-light fa-arrow-right-long"></i></a> -->
                                </div>
                            </div>
                            <!-- /.bg-wrapper -->
                        </div>
                        <!-- /.block-two -->
                    </div>
                </div>
            </div>
            <!-- /.wrapper -->
        </div>
        <!--
		=====================================================
			Who We Are Section End
		=====================================================
		-->


        <!--
		=====================================================
			Explore Popular Location Section Start
		=====================================================
		-->
        <div class="block-feature-three mt-150 xl-mt-120">
            <div class="container">
                <div class="position-relative z-1">
                    <div class="title-one text-center mb-75 xl-mb-50 md-mb-30 wow fadeInUp">
                        <h3>Explore Popular <span>Location <img src="images/lazy.svg" data-src="images/shape/title_shape_02.svg" alt="" class="lazy-img"></span></h3>
                        <p class="fs-22">Explore the PGs in the popular locations</p>
                    </div>
                    <!-- /.title-one -->

                    <div class="property-location-slider-one">

                        <div class="item">
                            <div class="location-card-one position-relative z-1 d-flex align-items-end" style="background-image: url(images/listing/home-page/Ahmedabad.jpg);">
                                <div class="content text-center w-100 tran3s">
                                    <h5 class="text-white fw-normal">Ahmedabad</h5>
                                    <p class="text-white fw-light">1,230 Properties</p>
                                </div>
                                <a href="listing_01.html" class="stretched-link"></a>
                            </div>
                            <!-- /.location-card-one -->
                        </div>

                        <div class="item">
                            <div class="location-card-one position-relative z-1 d-flex align-items-end" style="background-image: url(images/listing/home-page/Bangalore.jpg);">
                                <div class="content text-center w-100 tran3s">
                                    <h5 class="text-white fw-normal">Bangalore</h5>
                                    <p class="text-white fw-light">1,230 Properties</p>
                                </div>
                                <a href="listing_01.html" class="stretched-link"></a>
                            </div>
                            <!-- /.location-card-one -->
                        </div>


                        <div class="item">
                            <div class="location-card-one position-relative z-1 d-flex align-items-end" style="background-image: url(images/listing/home-page/Bhubaneswar.jpg);">
                                <div class="content text-center w-100 tran3s">
                                    <h5 class="text-white fw-normal">Bhubaneswar</h5>
                                    <p class="text-white fw-light">1,230 Properties</p>
                                </div>
                                <a href="listing_01.html" class="stretched-link"></a>
                            </div>
                            <!-- /.location-card-one -->
                        </div>


                        <div class="item">
                            <div class="location-card-one position-relative z-1 d-flex align-items-end" style="background-image: url(images/listing/home-page/Mumbai.jpg);">
                                <div class="content text-center w-100 tran3s">
                                    <h5 class="text-white fw-normal">Mumbai</h5>
                                    <p class="text-white fw-light">1,230 Properties</p>
                                </div>
                                <a href="listing_01.html" class="stretched-link"></a>
                            </div>
                            <!-- /.location-card-one -->
                        </div>

                        <div class="item">
                            <div class="location-card-one position-relative z-1 d-flex align-items-end" style="background-image: url(images/listing/home-page/Chennai.jpg);">
                                <div class="content text-center w-100 tran3s">
                                    <h5 class="text-white fw-normal">Chennai</h5>
                                    <p class="text-white fw-light">1,230 Properties</p>
                                </div>
                                <a href="listing_01.html" class="stretched-link"></a>
                            </div>
                            <!-- /.location-card-one -->
                        </div>


                        <div class="item">
                            <div class="location-card-one position-relative z-1 d-flex align-items-end" style="background-image: url(images/listing/home-page/coimbatore.jpg);">
                                <div class="content text-center w-100 tran3s">
                                    <h5 class="text-white fw-normal">Coimbatore</h5>
                                    <p class="text-white fw-light">1,230 Properties</p>
                                </div>
                                <a href="listing_01.html" class="stretched-link"></a>
                            </div>
                            <!-- /.location-card-one -->
                        </div>

                        <div class="item">
                            <div class="location-card-one position-relative z-1 d-flex align-items-end" style="background-image: url(images/listing/home-page/Jaipur.jpeg);">
                                <div class="content text-center w-100 tran3s">
                                    <h5 class="text-white fw-normal">Jaipur</h5>
                                    <p class="text-white fw-light">1,230 Properties</p>
                                </div>
                                <a href="listing_01.html" class="stretched-link"></a>
                            </div>
                            <!-- /.location-card-one -->
                        </div>

                    </div>
                    <ul class="slider-arrows slick-arrow-one d-flex justify-content-between style-none">
                        <li class="prev_a slick-arrow"><i class="fa-sharp fa-light fa-angle-left"></i></li>
                        <li class="next_a slick-arrow"><i class="fa-sharp fa-light fa-angle-right"></i></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--
		=====================================================
			Explore Popular Location Section Start
		=====================================================
		-->


        <!-- 
		=============================================
			Featured Listing Start
		============================================== 
		-->
        <div class="property-listing-one bg-pink-two mt-150 xl-mt-120 pt-140 xl-pt-120 lg-pt-80 pb-100 xl-pb-10 lg-pb-10">
            <div class="container">
                <div class="position-relative">
                    <div class="title-one text-center text-lg-start mb-45 xl-mb-30 lg-mb-20 wow fadeInUp">
                        <h3>Featured <span>Listings <img src="images/lazy.svg" data-src="images/shape/title_shape_03.svg" alt="" class="lazy-img"></span></h3>
                        <p class="fs-22 mt-xs">Explore our latest featured PGs.</p>
                    </div>
                    <!-- /.title-one -->

                    <div class="row gx-xxl-5">
                        <div class="col-lg-4 col-md-6 d-flex mt-40 wow fadeInUp">
                            <div class="listing-card-one border-25 h-100 w-100">
                                <div class="img-gallery p-15">
                                    <div class="position-relative border-25 overflow-hidden">
                                        <div class="tag border-25">Ahmedabad</div>
                                        <div id="carousel1" class="carousel slide">
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#carousel1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active" data-bs-interval="1000000">
                                                    <a href="listing_details_01.html" class="d-block"><img src="images/listing/home-page/inside-house-2.png" class="w-100" alt="..."></a>
                                                </div>
                                                <div class="carousel-item" data-bs-interval="1000000">
                                                    <a href="listing_details_01.html" class="d-block"><img src="images/listing/home-page/inside-house-3.png" class="w-100" alt="..."></a>
                                                </div>
                                                <div class="carousel-item" data-bs-interval="1000000">
                                                    <a href="listing_details_01.html" class="d-block"><img src="images/listing/home-page/inside-house-4.png" class="w-100" alt="..."></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.img-gallery -->
                                <div class="property-info p-25">
                                    <a href="listing_details_01.html" class="title tran3s">HM Pg House</a>
                                    <div class="address">201, Aarambh Complex, near Croma - Makarba</div>
                                    <ul class="style-none feature d-flex flex-wrap align-items-center justify-content-between">
                                        <li class="d-flex align-items-center">
                                            <img src="images/lazy.svg" data-src="images/icon/icon_04.svg" alt="" class="lazy-img icon me-2">
                                            <span class="fs-16">1370 sqft</span>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <img src="images/lazy.svg" data-src="images/icon/icon_05.svg" alt="" class="lazy-img icon me-2">
                                            <span class="fs-16">03 bed</span>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <img src="images/lazy.svg" data-src="images/icon/icon_44.svg" style="width: 15px; height: 20px;" alt="" class="lazy-img icon me-2">
                                            <span class="fs-16">03 Persons</span>
                                        </li>
                                    </ul>
                                    <div class="pl-footer top-border d-flex align-items-center justify-content-between">
                                        <strong class="price fw-500 color-dark">₹3,280/<sub>m</sub></strong>
                                        <a href="listing_details_01.html" class="btn-four rounded-circle"><i class="bi bi-arrow-up-right"></i></a>
                                    </div>
                                </div>
                                <!-- /.property-info -->
                            </div>
                            <!-- /.listing-card-one -->
                        </div>


                        <div class="col-lg-4 col-md-6 d-flex mt-40 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="listing-card-one border-25 h-100 w-100">
                                <div class="img-gallery p-15">
                                    <div class="position-relative border-25 overflow-hidden">
                                        <div class="tag sale border-25">Bangalore</div>
                                        <div id="carousel2" class="carousel slide">
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carousel2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#carousel2" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#carousel2" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active" data-bs-interval="1000000">
                                                    <a href="listing_details_01.html" class="d-block"><img src="images/listing/home-page/inside-house-3.png" class="w-100" alt="..."></a>
                                                </div>
                                                <div class="carousel-item" data-bs-interval="1000000">
                                                    <a href="listing_details_01.html" class="d-block"><img src="images/listing/home-page/inside-house-3.png" class="w-100" alt="..."></a>
                                                </div>
                                                <div class="carousel-item" data-bs-interval="1000000">
                                                    <a href="listing_details_01.html" class="d-block"><img src="images/listing/home-page/inside-house-3.png" class="w-100" alt="..."></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.img-gallery -->
                                <div class="property-info p-25">
                                    <a href="listing_details_01.html" class="title tran3s">House of Stories</a>
                                    <div class="address"> 625 11th Main Road, Bangalore</div>
                                    <ul class="style-none feature d-flex flex-wrap align-items-center justify-content-between">
                                        <li class="d-flex align-items-center">
                                            <img src="images/lazy.svg" data-src="images/icon/icon_04.svg" alt="" class="lazy-img icon me-2">
                                            <span class="fs-16">1270 sqft</span>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <img src="images/lazy.svg" data-src="images/icon/icon_05.svg" alt="" class="lazy-img icon me-2">
                                            <span class="fs-16">02 bed</span>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <img src="images/lazy.svg" data-src="images/icon/icon_44.svg" style="width: 15px; height: 20px;" alt="" class="lazy-img icon me-2">
                                            <span class="fs-16">02 Persons</span>
                                        </li>
                                    </ul>
                                    <div class="pl-footer top-border d-flex align-items-center justify-content-between">
                                        <strong class="price fw-500 color-dark">₹2,800/<sub>m</sub></strong>
                                        <a href="listing_details_01.html" class="btn-four rounded-circle"><i class="bi bi-arrow-up-right"></i></a>
                                    </div>
                                </div>
                                <!-- /.property-info -->
                            </div>
                            <!-- /.listing-card-one -->
                        </div>

                        <div class="col-lg-4 col-md-6 d-flex mt-40 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="listing-card-one border-25 h-100 w-100">
                                <div class="img-gallery p-15">
                                    <div class="position-relative border-25 overflow-hidden">
                                        <div class="tag sale border-25">Bangalore</div>
                                        <div id="carousel2" class="carousel slide">
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carousel2" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                <button type="button" data-bs-target="#carousel2" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                <button type="button" data-bs-target="#carousel2" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                            </div>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active" data-bs-interval="1000000">
                                                    <a href="listing_details_01.html" class="d-block"><img src="images/listing/home-page/inside-house-4.png" class="w-100" alt="..."></a>
                                                </div>
                                                <div class="carousel-item" data-bs-interval="1000000">
                                                    <a href="listing_details_01.html" class="d-block"><img src="images/listing/home-page/inside-house-3.png" class="w-100" alt="..."></a>
                                                </div>
                                                <div class="carousel-item" data-bs-interval="1000000">
                                                    <a href="listing_details_01.html" class="d-block"><img src="images/listing/home-page/inside-house-3.png" class="w-100" alt="..."></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.img-gallery -->
                                <div class="property-info p-25">
                                    <a href="listing_details_01.html" class="title tran3s">BYOC Hostels</a>
                                    <div class="address"> 174, 2nd Main Road Domlur 2nd Stage, Bangalore</div>
                                    <ul class="style-none feature d-flex flex-wrap align-items-center justify-content-between">
                                        <li class="d-flex align-items-center">
                                            <img src="images/lazy.svg" data-src="images/icon/icon_04.svg" alt="" class="lazy-img icon me-2">
                                            <span class="fs-16">1270 sqft</span>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <img src="images/lazy.svg" data-src="images/icon/icon_05.svg" alt="" class="lazy-img icon me-2">
                                            <span class="fs-16">04 bed</span>
                                        </li>
                                        <li class="d-flex align-items-center">
                                            <img src="images/lazy.svg" data-src="images/icon/icon_44.svg" style="width: 15px; height: 20px;" alt="" class="lazy-img icon me-2">
                                            <span class="fs-16">04 Persons</span>
                                        </li>
                                    </ul>
                                    <div class="pl-footer top-border d-flex align-items-center justify-content-between">
                                        <strong class="price fw-500 color-dark">₹3,800/<sub>m</sub></strong>
                                        <a href="listing_details_01.html" class="btn-four rounded-circle"><i class="bi bi-arrow-up-right"></i></a>
                                    </div>
                                </div>
                                <!-- /.property-info -->
                            </div>
                            <!-- /.listing-card-one -->
                        </div>

                    </div>
                    <!-- /.row -->






                    <div class="section-btn text-center md-mt-60">
                        <a href="listing_01.html" class="btn-five">Explore All</a>
                    </div>

                </div>
            </div>
        </div>
        <!-- 
		=============================================
			Featured Listing End
		============================================== 
		-->


        <!--
		=====================================================
			Add your property Section Start
		=====================================================
		-->
        <div class="block-feature-five position-relative z-1 pt-10 lg-pt-10 pb-130 xl-pb-100 lg-pb-80 mt-200 xl-mt-200 lg-mt-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 m-auto">
                        <div class="title-one text-center mb-35 lg-mb-20">
                            <h3>We’r here to help you <br>You can <span>join us<img src="images/lazy.svg" data-src="images/shape/title_shape_07.svg" alt="" class="lazy-img"></span></h3>
                            <p class="fs-24 color-dark">It’s easy to list your pg with us </p>
                        </div>
                        <!-- /.title-one -->
                    </div>
                </div>
                <div class="row justify-content-between">
                    <div class="col-xxl-11 m-auto">
                        <div class="row gx-xl-5 justify-content-center">
                            <div class="col-lg-4 col-sm-6">
                                <div class="card-style-one text-center wow fadeInUp mt-40">
                                    <img src="images/lazy.svg" data-src="images/icon/icon_07.svg" alt="" class="lazy-img m-auto icon">
                                    <h5 class="mt-50 lg-mt-30 mb-15">Create Account</h5>
                                    <p class="pe-xxl-4 ps-xxl-4">Create your account on our platform</p>
                                </div>
                                <!-- /.card-style-one -->
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="card-style-one text-center wow fadeInUp mt-40 arrow position-relative" data-wow-delay="0.1s">
                                    <img src="images/lazy.svg" data-src="images/icon/icon_08.svg" alt="" class="lazy-img m-auto icon">
                                    <h5 class="mt-50 lg-mt-30 mb-15">Add PG</h5>
                                    <p class="pe-xxl-4 ps-xxl-4">Fill all the required details of your pg </p>
                                </div>
                                <!-- /.card-style-one -->
                            </div>
                            <div class="col-lg-4 col-sm-6">
                                <div class="card-style-one text-center wow fadeInUp mt-40" data-wow-delay="0.2s">
                                    <img src="images/lazy.svg" data-src="images/icon/icon_09.svg" alt="" class="lazy-img m-auto icon">
                                    <h5 class="mt-50 lg-mt-30 mb-15">Get Approved</h5>
                                    <p class="pe-xxl-4 ps-xxl-4">Apply & get your pg listed on our platform</p>
                                </div>
                                <!-- /.card-style-one -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="images/lazy.svg" data-src="images/shape/shape_07.svg" alt="" class="lazy-img shapes shape_01">
            <img src="images/lazy.svg" data-src="images/shape/shape_08.svg" alt="" class="lazy-img shapes shape_02">
        </div>
        <!--
		=====================================================
			Add your property Section End
		=====================================================
		-->


        <!--
		=====================================================
			Fancy Banner Two
		=====================================================
		-->
        <div class="fancy-banner-two position-relative z-1 pt-90 lg-pt-50 pb-90 lg-pb-50">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="title-one text-center text-lg-start md-mb-40 pe-xl-5">
                            <h3 class="text-white m0">Start your <span>Journey<img src="images/lazy.svg" data-src="images/shape/title_shape_06.svg" alt="" class="lazy-img"></span> With
                                Us.</h3>
                        </div>
                        <!-- /.title-one -->
                    </div>
                    <div class="col-lg-6">
                        <div class="form-wrapper me-auto ms-auto me-lg-0">
                            <form action="#">
                                <input type="email" placeholder="Email address">
                                <button>Get Started</button>
                            </form>
                            <div class="fs-16 mt-10 text-white">Already Joined Us? <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Sign in.</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.fancy-banner-two -->




        <!--
		=====================================================
			Contact Us Section Start
		=====================================================
		-->
        <div class=" fancy-banner-three position-relative text-center z-1 pt-200 xl-pt-150 lg-pt-100 pb-250 xl-pb-200 lg-pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-7 col-md-8 m-auto">
                        <div class="title-one mb-45 md-mb-30">
                            <h2>Any Inquiry? <span>Feel free<img src="images/lazy.svg" data-src="images/shape/title_shape_08.svg" alt="" class="lazy-img"></span> To
                                contact Us.</h2>
                        </div>
                        <!-- /.title-one -->
                        <a href="contact.html" class="btn-five text-uppercase">SEND MESSAGE</a>
                    </div>
                </div>
            </div>
            <img src="images/lazy.svg" data-src="images/assets/ils_02.svg" alt="" class="lazy-img shapes w-100 illustration">
        </div>
        <!-- /.fancy-banner-three -->


        <!--
		=====================================================
			Footer Starting
		=====================================================
		-->
        <div class="footer-one">
            <div class="position-relative z-1">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-4">
                            <div class="footer-intro">
                                <div class="bg-wrapper">
                                    <div class="logo mb-20">
                                        <a href="index.html">
                                            <img src="images/logo/logo_01.svg" alt="">
                                        </a>
                                    </div>
                                    <!-- logo -->
                                    <p class="mb-60 lg-mb-40 md-mb-20">11910 Clyde Rapid Suite 70, Willyand, Virginia,
                                        United States</p>
                                    <h6>CONTACT</h6>
                                    <a href="#" class="email fs-24 text-decoration-underline tran3s mb-70 lg-mb-50">homyreal@demo.com</a>
                                    <ul class="style-none d-flex align-items-center social-icon">
                                        <li><a href="#"><i class="fa-brands fa-square-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-square-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-square-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="d-flex flex-wrap">
                                <div class="footer-nav mt-100 lg-mt-80 xs-mt-50">
                                    <h5 class="footer-title">Links</h5>
                                    <ul class="footer-nav-link style-none">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="dashboard/membership.html" target="_blank">Membership</a></li>
                                        <li><a href="about_us_01.html">About Company</a></li>
                                        <li><a href="blog_01.html">Blog</a></li>
                                        <li><a href="blog_02.html">Explore Careers</a></li>
                                        <li><a href="pricing_02.html">Pricing</a></li>
                                        <li><a href="dashboard/dashboard-index.html" target="_blank">Dashboard</a></li>
                                    </ul>
                                </div>
                                <div class="footer-nav mt-100 lg-mt-80 xs-mt-30">
                                    <h5 class="footer-title">Legal</h5>
                                    <ul class="footer-nav-link style-none">
                                        <li><a href="faq.html">Terms & conditions</a></li>
                                        <li><a href="faq.html">Cookie</a></li>
                                        <li><a href="faq.html">Privacy policy</a></li>
                                        <li><a href="faq.html">Faq’s</a></li>
                                    </ul>
                                </div>
                                <div class="footer-nav mt-100 lg-mt-80 xs-mt-30">
                                    <h5 class="footer-title">New Listing</h5>
                                    <ul class="footer-nav-link style-none">
                                        <li><a href="listing_01.html">​Buy Apartments</a></li>
                                        <li><a href="listing_02.html">Buy Condos</a></li>
                                        <li><a href="listing_03.html">Rent Houses</a></li>
                                        <li><a href="listing_04.html">Rent Industrial</a></li>
                                        <li><a href="listing_05.html">Buy Villas</a></li>
                                        <li><a href="listing_06.html">Rent Office</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- /.footer-one -->


        <!-- ################### Login Modal ####################### -->
        <!-- Modal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                <div class="container">
                    <div class="user-data-form modal-content">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="form-wrapper m-auto">
                            <ul class="nav nav-tabs w-100" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#fc1" role="tab">Login</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#fc2" role="tab">Signup</button>
                                </li>
                            </ul>
                            <div class="tab-content mt-30">
                                <div class="tab-pane show active" role="tabpanel" id="fc1">
                                    <div class="text-center mb-20">
                                        <h2>Welcome Back!</h2>

                                    </div>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-group-meta position-relative mb-25">
                                                    <label>Email*</label>
                                                    <input type="email" placeholder="Youremail@gmail.com">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group-meta position-relative mb-20">
                                                    <label>Password*</label>
                                                    <input type="password" placeholder="Enter Password" class="pass_log_id">
                                                    <span class="placeholder_icon"><span class="passVicon"><img src="images/icon/icon_68.svg" alt=""></span></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="agreement-checkbox d-flex justify-content-between align-items-center">

                                                    <a href="#">Forget Password?</a>
                                                </div> <!-- /.agreement-checkbox -->
                                            </div>
                                            <div class="col-12">
                                                <button class="btn-two w-100 text-uppercase d-block mt-20">Login</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" role="tabpanel" id="fc2">
                                    <div class="text-center mb-20">
                                        <h2>Register</h2>

                                    </div>
                                    <form action="#">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="input-group-meta position-relative mb-25">
                                                    <label>Name*</label>
                                                    <input type="text" placeholder="Zubayer Hasan">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group-meta position-relative mb-25">
                                                    <label>Email*</label>
                                                    <input type="email" placeholder="zubayerhasan@gmail.com">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="input-group-meta position-relative mb-20">
                                                    <label>Password*</label>
                                                    <input type="password" placeholder="Enter Password" class="pass_log_id">
                                                    <span class="placeholder_icon"><span class="passVicon"><img src="images/icon/icon_68.svg" alt=""></span></span>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="agreement-checkbox d-flex justify-content-between align-items-center">
                                                    <div>
                                                        <input type="checkbox" id="remember2">
                                                        <label for="remember2">By hitting the "Register" button, you
                                                            agree to the <a href="#">Terms conditions</a> & <a href="#">Privacy Policy</a></label>
                                                    </div>
                                                </div> <!-- /.agreement-checkbox -->
                                            </div>
                                            <div class="col-12">
                                                <button class="btn-two w-100 text-uppercase d-block mt-20">Sign
                                                    Up</button>
                                            </div>
                                        </div>
                                    </form>
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



        <button class="scroll-top">
            <i class="bi bi-arrow-up-short"></i>
        </button>


    </div>


    <!-- jQuery first, then Bootstrap JS -->
    <!-- jQuery -->
    <script src="vendor/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- WOW js -->
    <script src="vendor/wow/wow.min.js"></script>
    <!-- Slick Slider -->
    <script src="vendor/slick/slick.min.js"></script>
    <!-- Fancybox -->
    <script src="vendor/fancybox/fancybox.umd.js"></script>
    <!-- Lazy -->
    <script src="vendor/jquery.lazy.min.js"></script>
    <!-- js Counter -->
    <script src="vendor/jquery.counterup.min.js"></script>
    <script src="vendor/jquery.waypoints.min.js"></script>
    <!-- Nice Select -->
    <script src="vendor/nice-select/jquery.nice-select.min.js"></script>
    <!-- validator js -->
    <script src="vendor/validator.js"></script>

    <!-- Theme js -->
    <script src="js/theme.js"></script>
</body>

</html>