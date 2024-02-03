<?php

// Include the database connection
include '../db_connect.php';


$PGID = $_GET['id'];

print "<script>console.log('PGID: " . $PGID . "');</script>";

// Fetch the PG details
try {
    $stmt = $conn->prepare("SELECT * FROM pg_listings WHERE PGID = :pgid");
    $stmt->bindParam(':pgid', $PGID);
    $stmt->execute();
    $pgdetails = $stmt->fetch(PDO::FETCH_ASSOC);



    $stmt = $conn->prepare("SELECT * FROM pg_listings INNER JOIN pg_owners ON pg_listings.OwnerID = pg_owners.OwnerID WHERE PGID = :pgid");

    $stmt->bindParam(':pgid', $PGID);
    $stmt->execute();
    $ownerdetails = $stmt->fetch(PDO::FETCH_ASSOC);


    //print the details of the owner and the pg in the console log


} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}


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


</head>



<body>

    <div class="main-page-wrapper">


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
                            <a href="index.html" class="d-flex align-items-center">
                                <img src="../images/logo/logo_01.svg" alt="">
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
                                        <div class="logo"><a href="../index.php" class="d-block"><img src="../images/logo/logo_01.svg" alt=""></a></div>
                                    </li>


                                    <li class="nav-item">
                                        <a class="nav-link" href="../index.php">Home</a>
                                    </li>

                                    <li class="nav-item dashboard-menu">
                                        <a class="nav-link" href="./listing.php">PG Listing</a>
                                    </li>


                                    <li class="nav-item">
                                        <a class="nav-link" href="./pgowner.php">For PG Owners</a>
                                    </li>

                                    <li class="nav-item ">
                                        <a class="nav-link" href="./about.php">About Us</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" href="./contact-us.php">Contact Us</a>
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
		=====================================================
			Property Listing Details
		=====================================================
		-->
        <div class="listing-details-one theme-details-one bg-pink pt-180 lg-pt-150 pb-150 xl-pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="property-titlee"><?php echo htmlspecialchars($pgdetails['PG_Title']); ?></h3>
                        <div class="d-flex flex-wrap mt-10">
                            <div class="list-type text-uppercase border-20 mt-15 me-3"> <?php echo htmlspecialchars($pgdetails['PG_For']); ?></div>
                            <div class="address mt-15"><i class="bi bi-geo-alt"></i> <?php echo htmlspecialchars($pgdetails['PG_Address']); ?></div>
                        </div>
                    </div>
                    <div class="col-lg-6 text-lg-end">
                        <div class="d-inline-block md-mt-40">
                            <div class="price color-dark fw-500">₹<?php echo htmlspecialchars($pgdetails['PG_Rent']); ?></div>

                            <ul class="style-none d-flex align-items-center action-btns">


                                <li><a href="#" class="d-flex align-items-center justify-content-center rounded-circle tran3s"><i class="fa-light fa-bookmark"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="media-gallery mt-100 xl-mt-80 lg-mt-60">
                    <div id="media_slider" class="carousel slide row">
                        <div class="col-lg-10">
                            <div class="bg-white shadow4 border-20 p-30 md-mb-20">
                                <div class="position-relative z-1 overflow-hidden border-20">
                                    <div class="img-fancy-btn border-10 fw-500 fs-16 color-dark">

                                        <a href="../images/listing/img-1.jpg" class="d-block" data-fancybox="mainImg" data-caption="Duplex orkit villa."></a>
                                        <a href="../images/listing/img-2.jpg" class="d-block" data-fancybox="mainImg" data-caption="Duplex orkit villa."></a>
                                        <a href="../images/listing/img-3.jpg" class="d-block" data-fancybox="mainImg" data-caption="Duplex orkit villa."></a>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="../images/listing/img-2.jpg" alt="" class="border-20 w-100">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="../images/listing/img-1.jpg" alt="" class="border-20 w-100">
                                        </div>


                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#media_slider" data-bs-slide="prev">
                                        <i class="bi bi-chevron-left"></i>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#media_slider" data-bs-slide="next">
                                        <i class="bi bi-chevron-right"></i>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="carousel-indicators position-relative border-15 bg-white shadow4 p-15 w-100 h-100">
                                <button type="button" data-bs-target="#media_slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                                    <img src="../images/listing/img-2.jpg" alt="" class="border-10 w-100">
                                </button>
                                <button type="button" data-bs-target="#media_slider" data-bs-slide-to="1" aria-label="Slide 2">
                                    <img src="../images/listing/img-1.jpg" alt="" class="border-10 w-100">
                                </button>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.media-gallery -->
                <div class="property-feature-list bg-white shadow4 border-20 p-40 mt-50 mb-60">
                    <h4 class="sub-title-one mb-40 lg-mb-20">Property Overview</h4>
                    <ul class="style-none d-flex flex-wrap align-items-center justify-content-between">
                        <li>
                            <img src="../images/lazy.svg" data-src="../images/icon/icon_47.svg" alt="" class="lazy-img icon">
                            <span class="fs-20 color-dark"><?php echo htmlspecialchars($pgdetails['PG_Size_sqft']); ?> sqft</span>
                        </li>
                        <li>
                            <img src="../images/lazy.svg" data-src="../images/icon/icon_48.svg" alt="" class="lazy-img icon">
                            <span class="fs-20 color-dark"><?php echo htmlspecialchars($pgdetails['PG_Beds']); ?> Bedrooms</span>
                        </li>
                        <li>
                            <img src="../images/lazy.svg" data-src="../images/icon/icon_49.svg" alt="" class="lazy-img icon">
                            <span class="fs-20 color-dark"><?php echo htmlspecialchars($pgdetails['PG_Bathrooms']); ?> Bathrooms</span>
                        </li>
                        <li>
                            <img src="../images/lazy.svg" data-src="../images/icon/icon_50.svg" alt="" class="lazy-img icon">
                            <span class="fs-20 color-dark">Kitchen <?php echo htmlspecialchars($pgdetails['PG_Kitchens']); ?></span>
                        </li>
                        <li>
                            <img src="../images/lazy.svg" data-src="../images/icon/icon_51.svg" alt="" class="lazy-img icon">
                            <span class="fs-20 color-dark">Type . <?php echo htmlspecialchars($pgdetails['PG_Category']); ?></span>
                        </li>
                    </ul>
                </div>
                <!-- /.property-feature-list -->
                <div class="row">
                    <div class="col-xl-8">
                        <div class="property-overview bg-white shadow4 border-20 p-40 mb-50">
                            <h4 class="mb-20">Overview</h4>
                            <p class="fs-20 lh-lg"><?php echo htmlspecialchars($pgdetails['PG_Description']); ?></p>
                        </div>
                        <!-- /.property-overview -->
                        <div class="property-feature-accordion bg-white shadow4 border-20 p-40 mb-50">
                            <h4 class="mb-20">Property Features</h4>
                            <p class="fs-20 lh-lg">Risk management and compliance, when approached strategically, have
                                the potential to go beyond mitigating threats.</p>

                            <div class="accordion-style-two mt-45">
                                <div class="accordion" id="accordionTwo">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOneA" aria-expanded="false" aria-controls="collapseOneA">
                                                Property Details
                                            </button>
                                        </h2>
                                        <div id="collapseOneA" class="accordion-collapse collapse show" data-bs-parent="#accordionTwo">
                                            <div class="accordion-body">
                                                <div class="feature-list-two">
                                                    <ul class="style-none d-flex flex-wrap justify-content-between">
                                                        <li><span>Bedrooms: </span> <span class="fw-500 color-dark">03</span></li>
                                                        <li><span>Furnishing: </span> <span class="fw-500 color-dark">Semi furnished</span></li>
                                                        <li><span>Bathrooms: </span> <span class="fw-500 color-dark">02</span></li>
                                                        <li><span>Year Built: </span> <span class="fw-500 color-dark">2010</span></li>
                                                        <li><span>Floor: </span> <span class="fw-500 color-dark">Ground</span></li>
                                                        <li><span>Garage: </span> <span class="fw-500 color-dark">03</span></li>
                                                        <li><span>Ceiling Height: </span> <span class="fw-500 color-dark">3.2m</span></li>
                                                        <li><span>Property Type: </span> <span class="fw-500 color-dark">Apartment</span></li>
                                                        <li><span>Renovation: </span> <span class="fw-500 color-dark">3.2m</span></li>
                                                        <li><span>Status: </span> <span class="fw-500 color-dark">For
                                                                Sale</span></li>
                                                    </ul>
                                                </div>
                                                <!-- /.feature-list-two -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwoA" aria-expanded="false" aria-controls="collapseTwoA">
                                                Utility Details
                                            </button>
                                        </h2>
                                        <div id="collapseTwoA" class="accordion-collapse collapse" data-bs-parent="#accordionTwo">
                                            <div class="accordion-body">
                                                <div class="feature-list-two">
                                                    <ul class="style-none d-flex flex-wrap justify-content-between">
                                                        <li><span>Heating: </span> <span class="fw-500 color-dark">Natural gas </span></li>
                                                        <li><span>Intercom: </span> <span class="fw-500 color-dark">Yes</span></li>
                                                        <li><span>Air Condition: </span> <span class="fw-500 color-dark">Yes</span></li>
                                                        <li><span>Window Type: </span> <span class="fw-500 color-dark">Aluminum frame </span></li>
                                                        <li><span>Fireplace: </span> <span class="fw-500 color-dark">--</span></li>
                                                        <li><span>Cable TV: </span> <span class="fw-500 color-dark">--</span></li>
                                                        <li><span>Elevator: </span> <span class="fw-500 color-dark">Yes</span></li>
                                                        <li><span>WiFi: </span> <span class="fw-500 color-dark">Yes</span></li>
                                                        <li><span>Ventilation: </span> <span class="fw-500 color-dark">Yes</span></li>
                                                    </ul>
                                                </div>
                                                <!-- /.feature-list-two -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThreeA" aria-expanded="true" aria-controls="collapseThreeA">
                                                Outdoor Features
                                            </button>
                                        </h2>
                                        <div id="collapseThreeA" class="accordion-collapse collapse" data-bs-parent="#accordionTwo">
                                            <div class="accordion-body">
                                                <div class="feature-list-two">
                                                    <ul class="style-none d-flex flex-wrap justify-content-between">
                                                        <li><span>Garage: </span> <span class="fw-500 color-dark">Yes</span></li>
                                                        <li><span>Parking: </span> <span class="fw-500 color-dark">Yes</span></li>
                                                        <li><span>Garden: </span> <span class="fw-500 color-dark">30m2</span></li>
                                                        <li><span>Disabled Access: </span> <span class="fw-500 color-dark">Ramp</span></li>
                                                        <li><span>Swimming Pool: </span> <span class="fw-500 color-dark">--</span></li>
                                                        <li><span>Fence: </span> <span class="fw-500 color-dark">--</span></li>
                                                        <li><span>Security: </span> <span class="fw-500 color-dark">3
                                                                Cameras</span></li>
                                                        <li><span>Pet Friendly: </span> <span class="fw-500 color-dark">Yes</span></li>
                                                    </ul>
                                                </div>
                                                <!-- /.feature-list-two -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.property-feature-accordion -->
                        <div class="property-amenities bg-white shadow4 border-20 p-40 mb-50">
                            <h4 class="mb-20">Amenities</h4>
                            <p class="fs-20 lh-lg pb-25">Risk management & compliance, when approached strategically,
                                have the potential</p>
                            <ul class="style-none d-flex flex-wrap justify-content-between list-style-two">
                                <li>A/C & Heating</li>
                                <li>Garages</li>
                                <li>Swimming Pool</li>
                                <li>Parking</li>
                                <li>Garden</li>
                                <li>Disabled Access</li>
                                <li>Pet Friendly</li>
                                <li>Ceiling Height</li>
                                <li>Refrigerator</li>
                                <li>Fireplace</li>
                                <li>Elevator</li>
                                <li>Wifi</li>
                            </ul>
                            <!-- /.list-style-two -->
                        </div>
                        <!-- /.property-amenities -->

                        <div class="property-video-tour mb-50">
                            <h4 class="mb-40">Video Tour</h4>
                            <div class="bg-white shadow4 border-20 p-15">
                                <div class="position-relative border-15 image-bg overflow-hidden z-1">
                                    <img src="../images/lazy.svg" data-src="../images/listing/img_47.jpg" alt="" class="lazy-img w-100">
                                    <a class="video-icon tran3s rounded-circle d-flex align-items-center justify-content-center" data-fancybox href="https://www.youtube.com/embed/aXFSJTjVjw0">
                                        <i class="fa-thin fa-play"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.property-video-tour -->

                        <div class="property-floor-plan mb-50">
                            <h4 class="mb-40">Floor Plans</h4>
                            <div class="bg-white shadow4 border-20 p-30">
                                <div id="floor-plan" class="carousel slide">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#floor-plan" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#floor-plan" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#floor-plan" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="../images/listing/floor_1.jpg" alt="" class="w-100">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="../images/listing/floor_2.jpg" alt="" class="w-100">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="../images/listing/floor_1.jpg" alt="" class="w-100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.property-floor-plan -->

                        <div class="property-nearby bg-white shadow4 border-20 p-40 mb-50">
                            <h4 class="mb-20">What’s Nearby</h4>
                            <p class="fs-20 lh-lg pb-30">Risk management and compliance, when approached strategically,
                                have th potential to go beyond mitigating threats.</p>
                            <ul class="style-none d-flex flex-wrap justify-content-between nearby-list-item">
                                <li>School & Collage: <span class="fw-500 color-dark">0.9km</span></li>
                                <li>Grocery Center: <span class="fw-500 color-dark">0.2km</span></li>
                                <li>Metro Station: <span class="fw-500 color-dark">0.7km</span></li>
                                <li>Gym: <span class="fw-500 color-dark">2.3km</span></li>
                                <li>University: <span class="fw-500 color-dark">2.7km</span></li>
                                <li>Hospital: <span class="fw-500 color-dark">1.7km</span></li>
                                <li>Shopping Mall: <span class="fw-500 color-dark">1.1m</span></li>
                                <li>Police Station: <span class="fw-500 color-dark">1.2m</span></li>
                                <li>Bus Station: <span class="fw-500 color-dark"> 1.1m</span></li>
                                <li>River: <span class="fw-500 color-dark">3.1km</span></li>
                                <li>Market: <span class="fw-500 color-dark">3.4m</span></li>
                            </ul>
                            <!-- /.nearby-list-item -->
                        </div>
                        <!-- /.property-nearby -->

                        <div class="similar-property">
                            <h4 class="mb-40">Similar Homes You May Like</h4>
                            <div class="similar-listing-slider-one">
                                <div class="item">
                                    <div class="listing-card-one shadow4 style-three border-30 mb-50">
                                        <div class="img-gallery p-15">
                                            <div class="position-relative border-20 overflow-hidden">
                                                <div class="tag bg-white text-dark fw-500 border-20">FOR RENT</div>
                                                <img src="../images/listing/img_13.jpg" class="w-100 border-20" alt="...">
                                                <a href="listing_details_06.html" class="btn-four inverse rounded-circle position-absolute"><i class="bi bi-arrow-up-right"></i></a>
                                                <div class="img-slider-btn">
                                                    03 <i class="fa-regular fa-image"></i>
                                                    <a href="../images/listing/img_large_01.jpg" class="d-block" data-fancybox="img1" data-caption="Blueberry villa"></a>
                                                    <a href="../images/listing/img_large_02.jpg" class="d-block" data-fancybox="img1" data-caption="Blueberry villa"></a>
                                                    <a href="../images/listing/img_large_03.jpg" class="d-block" data-fancybox="img1" data-caption="Blueberry villa"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.img-gallery -->
                                        <div class="property-info pe-4 ps-4">
                                            <a href="listing_details_06.html" class="title tran3s">Blueberry villa.</a>
                                            <div class="address m0 pb-5">Mirpur 10, Stadium dhaka</div>
                                            <div class="pl-footer m0 d-flex align-items-center justify-content-between">
                                                <strong class="price fw-500 color-dark">$34,900</strong>
                                                <ul class="style-none d-flex action-icons">
                                                    <li><a href="#"><i class="fa-light fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa-light fa-bookmark"></i></a></li>
                                                    <li><a href="#"><i class="fa-light fa-circle-plus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.property-info -->
                                    </div>
                                    <!-- /.listing-card-one -->
                                </div>
                                <div class="item">
                                    <div class="listing-card-one shadow4 style-three border-30 mb-50">
                                        <div class="img-gallery p-15">
                                            <div class="position-relative border-20 overflow-hidden">
                                                <div class="tag bg-white text-dark fw-500 border-20">FOR SELL</div>
                                                <img src="../images/listing/img_14.jpg" class="w-100 border-20" alt="...">
                                                <a href="listing_details_06.html" class="btn-four inverse rounded-circle position-absolute"><i class="bi bi-arrow-up-right"></i></a>
                                                <div class="img-slider-btn">
                                                    03 <i class="fa-regular fa-image"></i>
                                                    <a href="../images/listing/img_large_04.jpg" class="d-block" data-fancybox="img2" data-caption="White House villa"></a>
                                                    <a href="../images/listing/img_large_05.jpg" class="d-block" data-fancybox="img2" data-caption="White House villa"></a>
                                                    <a href="../images/listing/img_large_06.jpg" class="d-block" data-fancybox="img2" data-caption="White House villa"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.img-gallery -->
                                        <div class="property-info pe-4 ps-4">
                                            <a href="listing_details_06.html" class="title tran3s">Blueberry villa.</a>
                                            <div class="address m0 pb-5">California link road, ca, usa</div>
                                            <div class="pl-footer m0 d-flex align-items-center justify-content-between">
                                                <strong class="price fw-500 color-dark">$28,100</strong>
                                                <ul class="style-none d-flex action-icons">
                                                    <li><a href="#"><i class="fa-light fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa-light fa-bookmark"></i></a></li>
                                                    <li><a href="#"><i class="fa-light fa-circle-plus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.property-info -->
                                    </div>
                                    <!-- /.listing-card-one -->
                                </div>
                                <div class="item">
                                    <div class="listing-card-one shadow4 style-three border-30 mb-50">
                                        <div class="img-gallery p-15">
                                            <div class="position-relative border-20 overflow-hidden">
                                                <div class="tag bg-white text-dark fw-500 border-20">FOR SELL</div>
                                                <img src="../images/listing/img_15.jpg" class="w-100 border-20" alt="...">
                                                <a href="listing_details_06.html" class="btn-four inverse rounded-circle position-absolute"><i class="bi bi-arrow-up-right"></i></a>
                                                <div class="img-slider-btn">
                                                    04 <i class="fa-regular fa-image"></i>
                                                    <a href="../images/listing/img_large_01.jpg" class="d-block" data-fancybox="img3" data-caption="Luxury villa in Dal lake."></a>
                                                    <a href="../images/listing/img_large_05.jpg" class="d-block" data-fancybox="img3" data-caption="Luxury villa in Dal lake."></a>
                                                    <a href="../images/listing/img_large_03.jpg" class="d-block" data-fancybox="img3" data-caption="Luxury villa in Dal lake."></a>
                                                    <a href="../images/listing/img_large_02.jpg" class="d-block" data-fancybox="img3" data-caption="Luxury villa in Dal lake."></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.img-gallery -->
                                        <div class="property-info pe-4 ps-4">
                                            <a href="listing_details_06.html" class="title tran3s">Blueberry villa.</a>
                                            <div class="address m0 pb-5">Mirpur 10, Stadium</div>
                                            <div class="pl-footer m0 d-flex align-items-center justify-content-between">
                                                <strong class="price fw-500 color-dark">$42,500</strong>
                                                <ul class="style-none d-flex action-icons">
                                                    <li><a href="#"><i class="fa-light fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa-light fa-bookmark"></i></a></li>
                                                    <li><a href="#"><i class="fa-light fa-circle-plus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.property-info -->
                                    </div>
                                    <!-- /.listing-card-one -->
                                </div>
                                <div class="item">
                                    <div class="listing-card-one shadow4 style-three border-30 mb-50">
                                        <div class="img-gallery p-15">
                                            <div class="position-relative border-20 overflow-hidden">
                                                <div class="tag bg-white text-dark fw-500 border-20">FOR SELL</div>
                                                <img src="../images/listing/img_16.jpg" class="w-100 border-20" alt="...">
                                                <a href="listing_details_06.html" class="btn-four inverse rounded-circle position-absolute"><i class="bi bi-arrow-up-right"></i></a>
                                                <div class="img-slider-btn">
                                                    04 <i class="fa-regular fa-image"></i>
                                                    <a href="../images/listing/img_large_04.jpg" class="d-block" data-fancybox="img4" data-caption="South Sun House"></a>
                                                    <a href="../images/listing/img_large_06.jpg" class="d-block" data-fancybox="img4" data-caption="South Sun House"></a>
                                                    <a href="../images/listing/img_large_03.jpg" class="d-block" data-fancybox="img4" data-caption="South Sun House"></a>
                                                    <a href="../images/listing/img_large_02.jpg" class="d-block" data-fancybox="img4" data-caption="South Sun House"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.img-gallery -->
                                        <div class="property-info pe-4 ps-4">
                                            <a href="listing_details_06.html" class="title tran3s">South Sun House</a>
                                            <div class="address m0 pb-5">Mirpur 10, Stadium</div>
                                            <div class="pl-footer m0 d-flex align-items-center justify-content-between">
                                                <strong class="price fw-500 color-dark">$55,500</strong>
                                                <ul class="style-none d-flex action-icons">
                                                    <li><a href="#"><i class="fa-light fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa-light fa-bookmark"></i></a></li>
                                                    <li><a href="#"><i class="fa-light fa-circle-plus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.property-info -->
                                    </div>
                                    <!-- /.listing-card-one -->
                                </div>
                                <div class="item">
                                    <div class="listing-card-one shadow4 style-three border-30 mb-50">
                                        <div class="img-gallery p-15">
                                            <div class="position-relative border-20 overflow-hidden">
                                                <div class="tag bg-white text-dark fw-500 border-20">FOR SELL</div>
                                                <img src="../images/listing/img_14.jpg" class="w-100 border-20" alt="...">
                                                <a href="listing_details_06.html" class="btn-four inverse rounded-circle position-absolute"><i class="bi bi-arrow-up-right"></i></a>
                                                <div class="img-slider-btn">
                                                    03 <i class="fa-regular fa-image"></i>
                                                    <a href="../images/listing/img_large_04.jpg" class="d-block" data-fancybox="img5" data-caption="White House villa"></a>
                                                    <a href="../images/listing/img_large_05.jpg" class="d-block" data-fancybox="img5" data-caption="White House villa"></a>
                                                    <a href="../images/listing/img_large_06.jpg" class="d-block" data-fancybox="img5" data-caption="White House villa"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.img-gallery -->
                                        <div class="property-info pe-4 ps-4">
                                            <a href="listing_details_06.html" class="title tran3s">White House villa</a>
                                            <div class="address m0 pb-5">California link road, ca, usa</div>
                                            <div class="pl-footer m0 d-flex align-items-center justify-content-between">
                                                <strong class="price fw-500 color-dark">$28,100</strong>
                                                <ul class="style-none d-flex action-icons">
                                                    <li><a href="#"><i class="fa-light fa-heart"></i></a></li>
                                                    <li><a href="#"><i class="fa-light fa-bookmark"></i></a></li>
                                                    <li><a href="#"><i class="fa-light fa-circle-plus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- /.property-info -->
                                    </div>
                                    <!-- /.listing-card-one -->
                                </div>
                            </div>
                        </div>
                        <!-- /.similar-property -->

                        <div class="property-score bg-white shadow4 border-20 p-40 mb-50">
                            <h4 class="mb-20">Walk Score</h4>
                            <p class="fs-20 lh-lg pb-30">Risk management and compliance, when approached strategically,
                                have the potential</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="block d-flex align-items-center mb-50 sm-mb-30">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_52.svg" alt="" class="lazy-img icon">
                                        <div class="text">
                                            <h6>Transit Score</h6>
                                            <p class="fs-16 m0"><span class="color-dark">63</span>/100 (Moderate
                                                Distance Walkable)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="block d-flex align-items-center mb-50 sm-mb-30">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_53.svg" alt="" class="lazy-img icon">
                                        <div class="text">
                                            <h6>School Score</h6>
                                            <p class="fs-16 m0"><span class="color-dark">70</span>/100 (Short Distance
                                                Walkable)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="block d-flex align-items-center mb-20 sm-mb-30">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_54.svg" alt="" class="lazy-img icon">
                                        <div class="text">
                                            <h6>Medical Score</h6>
                                            <p class="fs-16 m0"><span class="color-dark">77</span>/100 (Short Distance
                                                Walkable)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="block d-flex align-items-center mb-20">
                                        <img src="../images/lazy.svg" data-src="../images/icon/icon_55.svg" alt="" class="lazy-img icon">
                                        <div class="text">
                                            <h6>Shopping Mall Score</h6>
                                            <p class="fs-16 m0"><span class="color-dark">42</span>/100 (Long Distance
                                                Walkable)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.property-score -->

                        <div class="property-location mb-50">
                            <h4 class="mb-40">Location</h4>
                            <div class="bg-white shadow4 border-20 p-30">
                                <div class="map-banner overflow-hidden border-15">
                                    <div class="gmap_canvas h-100 w-100">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d83088.3595592641!2d-105.54557276330914!3d39.29302101722867!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x874014749b1856b7%3A0xc75483314990a7ff!2sColorado%2C%20USA!5e0!3m2!1sen!2sbd!4v1699764452737!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-100 h-100"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.property-location -->

                        <div class="review-panel-one bg-white shadow4 border-20 p-40 mb-50">
                            <div class="position-relative z-1">
                                <div class="d-sm-flex justify-content-between align-items-center mb-10">
                                    <h4 class="m0 xs-pb-30">Reviews</h4>
                                    <select class="nice-select">
                                        <option value="0">Newest</option>
                                        <option value="1">Best Seller</option>
                                        <option value="2">Best Match</option>
                                    </select>
                                </div>
                                <div class="review-wrapper mb-35">
                                    <div class="review">
                                        <img src="../images/media/img_01.jpg" alt="" class="rounded-circle avatar">
                                        <div class="text">
                                            <div class="d-sm-flex justify-content-between">
                                                <div>
                                                    <h6 class="name">Zubayer Al Hasan</h6>
                                                    <div class="time fs-16">17 Aug, 23</div>
                                                </div>
                                                <ul class="rating style-none d-flex xs-mt-10">
                                                    <li><span class="fst-italic me-2">(4.7 Rating)</span> </li>
                                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                                </ul>
                                            </div>
                                            <p class="fs-20 mt-20 mb-30">Lorem ipsum dolor sit amet consectetur.
                                                Pellentesque sed nulla facili diam posuere aliquam suscipit quam.</p>
                                            <div class="d-flex review-help-btn">
                                                <a href="#" class="me-5"><i class="fa-sharp fa-regular fa-thumbs-up"></i>
                                                    <span>Helpful</span></a>
                                                <a href="#"><i class="fa-sharp fa-regular fa-flag-swallowtail"></i>
                                                    <span>Flag</span></a>
                                            </div>
                                        </div>
                                        <!-- /.text -->
                                    </div>
                                    <!-- /.review -->

                                    <div class="review">
                                        <img src="../images/media/img_03.jpg" alt="" class="rounded-circle avatar">
                                        <div class="text">
                                            <div class="d-sm-flex justify-content-between">
                                                <div>
                                                    <h6 class="name">Rashed Kabir</h6>
                                                    <div class="time fs-16">13 Jun, 23</div>
                                                </div>
                                                <ul class="rating style-none d-flex xs-mt-10">
                                                    <li><span class="fst-italic me-2">(4.9 Rating)</span> </li>
                                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                                </ul>
                                            </div>
                                            <p class="fs-20 mt-20 mb-30">Lorem ipsum dolor sit amet consectetur.
                                                Pellentesque sed nulla facili diam posuere aliquam suscipit quam.</p>
                                            <ul class="style-none d-flex flex-wrap review-gallery pb-30">
                                                <li><a href="../images/listing/img_large_01.jpg" class="d-block" data-fancybox="revImg" data-caption="Duplex orkit villa"><img src="../images/listing/img_48.jpg" alt=""></a></li>
                                                <li><a href="../images/listing/img_large_02.jpg" class="d-block" data-fancybox="revImg" data-caption="Duplex orkit villa"><img src="../images/listing/img_49.jpg" alt=""></a></li>
                                                <li><a href="../images/listing/img_large_03.jpg" class="d-block" data-fancybox="revImg" data-caption="Duplex orkit villa"><img src="../images/listing/img_50.jpg" alt=""></a></li>
                                                <li>
                                                    <div class="position-relative more-img">
                                                        <img src="../images/listing/img_50.jpg" alt="">
                                                        <span>13+</span>
                                                        <a href="../images/listing/img_large_04.jpg" class="d-block" data-fancybox="revImg" data-caption="Duplex orkit villa."></a>
                                                        <a href="../images/listing/img_large_05.jpg" class="d-block" data-fancybox="revImg" data-caption="Duplex orkit villa."></a>
                                                        <a href="../images/listing/img_large_06.jpg" class="d-block" data-fancybox="revImg" data-caption="Duplex orkit villa."></a>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="d-flex review-help-btn">
                                                <a href="#" class="me-5"><i class="fa-sharp fa-regular fa-thumbs-up"></i>
                                                    <span>Helpful</span></a>
                                                <a href="#"><i class="fa-sharp fa-regular fa-flag-swallowtail"></i>
                                                    <span>Flag</span></a>
                                            </div>

                                        </div>
                                        <!-- /.text -->
                                    </div>
                                    <!-- /.review -->

                                    <div class="review hide">
                                        <img src="../images/media/img_02.jpg" alt="" class="rounded-circle avatar">
                                        <div class="text">
                                            <div class="d-sm-flex justify-content-between">
                                                <div>
                                                    <h6 class="name">Perty Jinta</h6>
                                                    <div class="time fs-16">17 Aug, 23</div>
                                                </div>
                                                <ul class="rating style-none d-flex xs-mt-10">
                                                    <li><span class="fst-italic me-2">(4.7 Rating)</span> </li>
                                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                                    <li><i class="fa-sharp fa-solid fa-star"></i></li>
                                                </ul>
                                            </div>
                                            <p class="fs-20 mt-20 mb-30">Lorem ipsum dolor sit amet consectetur.
                                                Pellentesque sed nulla facili diam posuere aliquam suscipit quam.</p>
                                            <div class="d-flex review-help-btn">
                                                <a href="#" class="me-5"><i class="fa-sharp fa-regular fa-thumbs-up"></i>
                                                    <span>Helpful</span></a>
                                                <a href="#"><i class="fa-sharp fa-regular fa-flag-swallowtail"></i>
                                                    <span>Flag</span></a>
                                            </div>
                                        </div>
                                        <!-- /.text -->
                                    </div>
                                    <!-- /.review -->
                                </div>
                                <!-- /.review-wrapper -->
                                <div class="load-more-review text-uppercase w-100 border-15 tran3s">VIEW ALL 120 REVIEWS
                                    <i class="bi bi-arrow-up-right"></i>
                                </div>
                            </div>
                        </div>
                        <!-- /.review-panel-one -->

                        <div class="review-form bg-white shadow4 border-20 p-40">
                            <h4 class="mb-20">Leave A Reply</h4>
                            <p class="fs-20 lh-lg pb-15"><a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" class="color-dark fw-500 text-decoration-underline">Sign in</a> to post your comment
                                or signup if you don't have any account.</p>

                            <form action="#">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="input-box-two mb-30">
                                            <div class="label">Title*</div>
                                            <input type="text" placeholder="Rashed Kabir" class="type-input">
                                        </div>
                                        <!-- /.input-box-two -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box-two mb-30">
                                            <div class="label">Email*</div>
                                            <input type="email" placeholder="rshdkabir@gmail.com" class="type-input">
                                        </div>
                                        <!-- /.input-box-two -->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="input-box-two mb-30">
                                            <div class="label">Ratings*</div>
                                            <select class="nice-select">
                                                <option value="0">Ratings</option>
                                                <option value="1">Five Star</option>
                                                <option value="1">Four Star</option>
                                                <option value="1">Three Star</option>
                                                <option value="1">Two Star</option>
                                                <option value="1">One Star</option>
                                            </select>
                                        </div>
                                        <!-- /.input-box-two -->
                                    </div>
                                    <div class="col-12">
                                        <div class="input-box-two mb-30">
                                            <textarea placeholder="Write your review here..."></textarea>
                                        </div>
                                        <!-- /.input-box-two -->
                                    </div>
                                </div>
                                <button class="btn-five text-uppercase sm">Post Review</button>
                            </form>
                        </div>
                        <!-- /.review-form -->
                    </div>
                    <div class="col-xl-4 col-lg-8 me-auto ms-auto">
                        <div class="theme-sidebar-one dot-bg p-30 ms-xxl-3 lg-mt-80">
                            <div class="agent-info bg-white border-20 p-30 mb-40">
                                <img src="../images/lazy.svg" data-src="../images/agent/img_06.jpg" alt="" class="lazy-img rounded-circle ms-auto me-auto mt-3 avatar">
                                <div class="text-center mt-25">
                                    <h6 class="name">Rashed Kabir</h6>
                                    <p class="fs-16">Property Agent & Broker</p>
                                    <ul class="style-none d-flex align-items-center justify-content-center social-icon">
                                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                                <div class="divider-line mt-40 mb-45 pt-20">
                                    <ul class="style-none">
                                        <li>Location: <span>Spain, Barcelona</span></li>
                                        <li>Email: <span><a href="mailto:akabirr770@gmail.com">akabirr770@gmail.com</a></span>
                                        </li>
                                        <li>Phone: <span><a href="tel:+12347687565">+12347687565</a></span></li>
                                    </ul>
                                </div>
                                <!-- /.divider-line -->
                                <a href="contact.html" class="btn-nine text-uppercase rounded-3 w-100 mb-10">CONTACT
                                    AGENT</a>
                            </div>
                            <!-- /.agent-info -->

                            <div class="tour-schedule bg-white border-20 p-30 mb-40">
                                <h5 class="mb-40">Schedule Tour</h5>
                                <form action="#">
                                    <div class="input-box-three mb-25">
                                        <div class="label">Your Name*</div>
                                        <input type="text" placeholder="Your full name" class="type-input">
                                    </div>
                                    <!-- /.input-box-three -->
                                    <div class="input-box-three mb-25">
                                        <div class="label">Your Email*</div>
                                        <input type="email" placeholder="Enter mail address" class="type-input">
                                    </div>
                                    <!-- /.input-box-three -->
                                    <div class="input-box-three mb-25">
                                        <div class="label">Your Phone*</div>
                                        <input type="tel" placeholder="Your phone number" class="type-input">
                                    </div>
                                    <!-- /.input-box-three -->
                                    <div class="input-box-three mb-15">
                                        <div class="label">Message*</div>
                                        <textarea placeholder="Hello, I am interested in [Califronia Apartments]"></textarea>
                                    </div>
                                    <!-- /.input-box-three -->
                                    <button class="btn-nine text-uppercase rounded-3 w-100 mb-10">INQUIry</button>
                                </form>
                            </div>
                            <!-- /.tour-schedule -->

                            <div class="mortgage-calculator bg-white border-20 p-30 mb-40">
                                <h5 class="mb-40">Mortgage Calculator</h5>
                                <form action="#">
                                    <div class="input-box-three mb-25">
                                        <div class="label">Home Price*</div>
                                        <input type="tel" placeholder="1,32,789" class="type-input">
                                    </div>
                                    <!-- /.input-box-three -->
                                    <div class="input-box-three mb-25">
                                        <div class="label">Down Payment*</div>
                                        <input type="tel" placeholder="$" class="type-input">
                                    </div>
                                    <!-- /.input-box-three -->
                                    <div class="input-box-three mb-25">
                                        <div class="label">Interest Rate*</div>
                                        <input type="tel" placeholder="3.5%" class="type-input">
                                    </div>
                                    <!-- /.input-box-three -->
                                    <div class="input-box-three mb-25">
                                        <div class="label">Loan Terms (Years)</div>
                                        <input type="tel" placeholder="24" class="type-input">
                                    </div>
                                    <!-- /.input-box-three -->
                                    <button class="btn-five text-uppercase sm rounded-3 w-100 mb-10">CALCULATE</button>
                                </form>
                            </div>
                            <!-- /.mortgage-calculator -->

                            <div class="feature-listing bg-white border-20 p-30">
                                <h5 class="mb-40">Featured Listing</h5>
                                <div id="F-listing" class="carousel slide">
                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#F-listing" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#F-listing" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#F-listing" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    </div>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="listing-card-one style-three border-10">
                                                <div class="img-gallery">
                                                    <div class="position-relative border-10 overflow-hidden">
                                                        <div class="tag bg-white text-dark fw-500 border-20">FOR RENT
                                                        </div>
                                                        <a href="#" class="fav-btn tran3s"><i class="fa-light fa-heart"></i></a>
                                                        <img src="../images/listing/img_13.jpg" class="w-100 border-10" alt="...">
                                                        <div class="img-slider-btn">
                                                            03 <i class="fa-regular fa-image"></i>
                                                            <a href="../images/listing/img_large_01.jpg" class="d-block" data-fancybox="imgA" data-caption="Blueberry villa"></a>
                                                            <a href="../images/listing/img_large_02.jpg" class="d-block" data-fancybox="imgA" data-caption="Blueberry villa"></a>
                                                            <a href="../images/listing/img_large_03.jpg" class="d-block" data-fancybox="imgA" data-caption="Blueberry villa"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.img-gallery -->
                                                <div class="property-info mt-15">
                                                    <div class="d-flex justify-content-between align-items-end">
                                                        <div>
                                                            <strong class="price fw-500 color-dark">$1,23,710</strong>
                                                            <div class="address m0 pt-5">120 Elgin St. Celina, Delaware
                                                            </div>
                                                        </div>
                                                        <a href="listing_details_03.html" class="btn-four rounded-circle"><i class="bi bi-arrow-up-right"></i></a>
                                                    </div>
                                                </div>
                                                <!-- /.property-info -->
                                            </div>
                                            <!-- /.listing-card-one -->
                                        </div>
                                        <div class="carousel-item">
                                            <div class="listing-card-one style-three border-10">
                                                <div class="img-gallery">
                                                    <div class="position-relative border-10 overflow-hidden">
                                                        <div class="tag bg-white text-dark fw-500 border-20">FOR RENT
                                                        </div>
                                                        <a href="#" class="fav-btn tran3s"><i class="fa-light fa-heart"></i></a>
                                                        <img src="../images/listing/img_14.jpg" class="w-100 border-10" alt="...">
                                                        <div class="img-slider-btn">
                                                            03 <i class="fa-regular fa-image"></i>
                                                            <a href="../images/listing/img_large_04.jpg" class="d-block" data-fancybox="imgB" data-caption="Blueberry villa"></a>
                                                            <a href="../images/listing/img_large_05.jpg" class="d-block" data-fancybox="imgB" data-caption="Blueberry villa"></a>
                                                            <a href="../images/listing/img_large_06.jpg" class="d-block" data-fancybox="imgB" data-caption="Blueberry villa"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.img-gallery -->
                                                <div class="property-info mt-15">
                                                    <div class="d-flex justify-content-between align-items-end">
                                                        <div>
                                                            <strong class="price fw-500 color-dark">$2,11,536</strong>
                                                            <div class="address m0 pt-5">120 Elgin St. Celina, Delaware
                                                            </div>
                                                        </div>
                                                        <a href="listing_details_03.html" class="btn-four rounded-circle"><i class="bi bi-arrow-up-right"></i></a>
                                                    </div>
                                                </div>
                                                <!-- /.property-info -->
                                            </div>
                                            <!-- /.listing-card-one -->
                                        </div>
                                        <div class="carousel-item">
                                            <div class="listing-card-one style-three border-10">
                                                <div class="img-gallery">
                                                    <div class="position-relative border-10 overflow-hidden">
                                                        <div class="tag bg-white text-dark fw-500 border-20">FOR RENT
                                                        </div>
                                                        <a href="#" class="fav-btn tran3s"><i class="fa-light fa-heart"></i></a>
                                                        <img src="../images/listing/img_15.jpg" class="w-100 border-10" alt="...">
                                                        <div class="img-slider-btn">
                                                            03 <i class="fa-regular fa-image"></i>
                                                            <a href="../images/listing/img_large_04.jpg" class="d-block" data-fancybox="imgC" data-caption="Blueberry villa"></a>
                                                            <a href="../images/listing/img_large_05.jpg" class="d-block" data-fancybox="imgC" data-caption="Blueberry villa"></a>
                                                            <a href="../images/listing/img_large_06.jpg" class="d-block" data-fancybox="imgC" data-caption="Blueberry villa"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.img-gallery -->
                                                <div class="property-info mt-15">
                                                    <div class="d-flex justify-content-between align-items-end">
                                                        <div>
                                                            <strong class="price fw-500 color-dark">$3,05,958</strong>
                                                            <div class="address m0 pt-5">120 Elgin St. Celina, Delaware
                                                            </div>
                                                        </div>
                                                        <a href="listing_details_03.html" class="btn-four rounded-circle"><i class="bi bi-arrow-up-right"></i></a>
                                                    </div>
                                                </div>
                                                <!-- /.property-info -->
                                            </div>
                                            <!-- /.listing-card-one -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.feature-listing -->
                        </div>
                        <!-- /.theme-sidebar-one -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.listing-details-one -->
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