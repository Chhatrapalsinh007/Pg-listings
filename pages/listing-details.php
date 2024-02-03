<?php

// Include the database connection
include '../db_connect.php';


$PGID = $_GET['PG_Id'];

print "<script>console.log('This is PGID: " . $PGID . "');</script>";

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
                            <a href="../index.php" class="d-flex align-items-center">
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
                            <h4 class="mb-20">Description</h4>
                            <p class="fs-20 lh-lg"><?php echo htmlspecialchars($pgdetails['PG_Description']); ?></p>
                        </div>
                        <!-- /.property-overview -->
                        <div class="property-feature-accordion bg-white shadow4 border-20 p-40 mb-50">
                            <h4 class="mb-20">Property Features</h4>
                            <p class="fs-20 lh-lg">Here are some of the features provided by the PG owner</p>

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
                                                        <li><span>Bedrooms: </span> <span class="fw-500 color-dark"><?php echo htmlspecialchars($pgdetails['PG_Beds']); ?></span></li>
                                                        <li><span>Furnishing: </span> <span class="fw-500 color-dark"><?php echo htmlspecialchars($pgdetails['PG_Farnichar']); ?></span></li>
                                                        <li><span>Bathrooms: </span> <span class="fw-500 color-dark"><?php echo htmlspecialchars($pgdetails['PG_Bathrooms']); ?></span></li>
                                                        <li><span>Year Built: </span> <span class="fw-500 color-dark"><?php echo htmlspecialchars($pgdetails['PG_BuiltYear']); ?></span></li>
                                                        <li><span>Kitchen: </span> <span class="fw-500 color-dark"><?php echo htmlspecialchars($pgdetails['PG_Kitchens']); ?></span></li>
                                                        <li><span>Size: </span> <span class="fw-500 color-dark"><?php echo htmlspecialchars($pgdetails['PG_Size_sqft']); ?> sqft</span></li>

                                                        <li><span>Property Type: </span> <span class="fw-500 color-dark"><?php echo htmlspecialchars($pgdetails['PG_Category']); ?></span></li>

                                                        <li><span>Status: </span> <span class="fw-500 color-dark"><?php echo htmlspecialchars($pgdetails['PG_Availability']); ?></span></li>
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

                                                        <li><span>Air Condition: </span>

                                                            <span class="fw-500 color-dark">
                                                                <?php
                                                                if (intval($pgdetails['PG_AC']) == 1) {
                                                                    echo "Yes";
                                                                } else {
                                                                    echo "No";
                                                                }
                                                                ?>
                                                            </span>
                                                        </li>


                                                        <li><span>TV: </span> <span class="fw-500 color-dark"><?php

                                                                                                                if (intval($pgdetails['PG_TV']) == 1) {
                                                                                                                    echo "Yes";
                                                                                                                } else {
                                                                                                                    echo "No";
                                                                                                                }
                                                                                                                ?></span></li>

                                                        <li><span>Elevator: </span> <span class="fw-500 color-dark"><?php

                                                                                                                    if (intval($pgdetails['PG_Elevator']) == 1) {
                                                                                                                        echo "Yes";
                                                                                                                    } else {
                                                                                                                        echo "No";
                                                                                                                    }
                                                                                                                    ?></span></li>

                                                        <li><span>WiFi: </span> <span class="fw-500 color-dark">
                                                                <?php
                                                                if (intval($pgdetails['PG_Wifi']) == 1) {
                                                                    echo "Yes";
                                                                } else {
                                                                    echo "No";
                                                                }
                                                                ?>
                                                            </span></li>

                                                        <li><span>Laundry: </span> <span class="fw-500 color-dark">
                                                                <?php
                                                                if (intval($pgdetails['PG_Laundry']) == 1) {
                                                                    echo "Yes";
                                                                } else {
                                                                    echo "No";
                                                                }
                                                                ?>
                                                            </span></li>

                                                        <li><span>CCTV: </span> <span class="fw-500 color-dark">
                                                                <?php
                                                                if (intval($pgdetails['PG_CCTV']) == 1) {
                                                                    echo "Yes";
                                                                } else {
                                                                    echo "No";
                                                                }
                                                                ?>
                                                            </span></li>


                                                        <li><span>Geyser: </span> <span class="fw-500 color-dark">
                                                                <?php
                                                                if (intval($pgdetails['PG_Geyser']) == 1) {
                                                                    echo "Yes";
                                                                } else {
                                                                    echo "No";
                                                                }
                                                                ?>
                                                            </span></li>


                                                        <li><span>Refrigerator: </span> <span class="fw-500 color-dark">
                                                                <?php
                                                                if (intval($pgdetails['PG_Refrigerator']) == 1) {
                                                                    echo "Yes";
                                                                } else {
                                                                    echo "No";
                                                                }
                                                                ?>


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
                                                        <li><span>Parking: </span> <span class="fw-500 color-dark">
                                                                <?php
                                                                if (intval($pgdetails['PG_Parking']) == 1) {
                                                                    echo "Yes";
                                                                } else {
                                                                    echo "No";
                                                                }
                                                                ?>
                                                            </span></li>


                                                        <li><span>Disabled Access: </span> <span class="fw-500 color-dark">
                                                                <?php
                                                                if (intval($pgdetails['PG_Elevator']) == 1) {
                                                                    echo "Yes";
                                                                } else {
                                                                    echo "No";
                                                                }
                                                                ?>
                                                            </span></li>

                                                        <li><span>Outside Vistors Allowed: </span> <span class="fw-500 color-dark">
                                                                <?php
                                                                if (intval($pgdetails['PG_Visitors']) == 1) {
                                                                    echo "Yes";
                                                                } else {
                                                                    echo "No";
                                                                }
                                                                ?>
                                                            </span></li>
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
                            <p class="fs-20 lh-lg pb-25">All Amneties provided by the PG </p>
                            <ul class="style-none d-flex flex-wrap justify-content-between list-style-two">

                                <?php
                                if (intval($pgdetails['PG_AC']) == 1) {
                                    echo "<li>&#10004 Air Conditioning</li>";
                                } else {
                                    echo "<li>&#x2718; Air Conditioning</li>";
                                }

                                if (intval($pgdetails['PG_TV']) == 1) {
                                    echo "<li>&#10004 TV</li>";
                                } else {
                                    echo "<li>&#x2718; TV</li>";
                                }

                                if (intval($pgdetails['PG_Elevator']) == 1) {
                                    echo "<li>&#10004 Elevator</li>";
                                } else {
                                    echo "<li>&#x2718; Elevator</li>";
                                }

                                if (intval($pgdetails['PG_Wifi']) == 1) {
                                    echo "<li>&#10004 WiFi</li>";
                                } else {
                                    echo "<li>&#x2718; WiFi</li>";
                                }

                                if (intval($pgdetails['PG_Laundry']) == 1) {
                                    echo "<li>&#10004 Laundry</li>";
                                } else {
                                    echo "<li>&#x2718; Laundry</li>";
                                }


                                if (intval($pgdetails['PG_CCTV']) == 1) {
                                    echo "<li>&#10004 CCTV</li>";
                                } else {
                                    echo "<li>&#x2718; CCTV</li>";
                                }

                                if (intval($pgdetails['PG_Geyser']) == 1) {
                                    echo "<li>&#10004 Geyser</li>";
                                } else {
                                    echo "<li>&#x2718; Geyser</li>";
                                }

                                if (intval($pgdetails['PG_Refrigerator']) == 1) {
                                    echo "<li>&#10004 Refrigerator</li>";
                                } else {
                                    echo "<li>&#x2718; Refrigerator</li>";
                                }

                                //outside visitors allowed
                                if (intval($pgdetails['PG_Visitors']) == 1) {
                                    echo "<li>&#10004  Visitors Allowed</li>";
                                } else {
                                    echo "<li>&#x2718;  Visitors Allowed</li>";
                                }


                                if (intval($pgdetails['PG_Parking']) == 1) {
                                    echo "<li>&#10004 Parking</li>";
                                } else {
                                    echo "<li>&#x2718; Parking</li>";
                                }


                                if (intval($pgdetails['PG_Elevator']) == 1) {
                                    echo "<li>&#10004 Disabled Access</li>";
                                } else {
                                    echo "<li>&#x2718; Disabled Access</li>";
                                }


                                echo "<li>&#x2718; Swimming Pool</li>";






                                ?>


                            </ul>
                            <!-- /.list-style-two -->
                        </div>
                        <!-- /.property-amenities -->








                        <!-- /.similar-property -->

                        
                        <!-- /.property-score -->

                        <div class="property-location mb-50">
                            <h4 class="mb-40">Location</h4>
                            <div class="bg-white shadow4 border-20 p-30">
                                <div class="map-banner overflow-hidden border-15">
                                    <div class="gmap_canvas h-100 w-100">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7345.080705087193!2d72.50084950000003!3d23.003924000000016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1706950046440!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-100 h-100"></iframe>

                                           
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.property-location -->



                    </div>

                    <?php
                    //using ownerid fetch the owner details from the owner table
                    //fetch the owner details
                    $stmt = $conn->prepare("SELECT * FROM pg_owners WHERE OwnerID = :ownerid");
                    $stmt->bindParam(':ownerid', $pgdetails['OwnerID']);
                    $stmt->execute();
                    $ownerdetails = $stmt->fetch(PDO::FETCH_ASSOC);

                    //print the details of the owner in the console log
                    print "<script>console.log('This is the owner details: " . json_encode($ownerdetails) . "');</script>";



                    ?>



                    <div class="col-xl-4 col-lg-8 me-auto ms-auto">
                        <div class="theme-sidebar-one dot-bg p-30 ms-xxl-3 lg-mt-80">
                            <div class="agent-info bg-white border-20 p-30 mb-40">
                                <img src="../images/lazy.svg" data-src="../images/agent/img_06.jpg" alt="" class="lazy-img rounded-circle ms-auto me-auto mt-3 avatar">
                                <div class="text-center mt-25">
                                    <h6 class="name"><?php echo htmlspecialchars($ownerdetails['Owner_Name']); ?></h6>

                                    <ul class="style-none d-flex align-items-center justify-content-center social-icon pt-20">
                                        <li><a href="#"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
                                        <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                                <div class="divider-line mt-40 mb-45 pt-20">
                                    <ul class="style-none">
                                        <!-- <li>Location: <span></span></li> -->
                                        <li>Email: <span><a href="mailto:<?php echo htmlspecialchars($ownerdetails['Owner_Email']); ?>"><?php echo htmlspecialchars($ownerdetails['Owner_Email']); ?></a></span>
                                        </li>
                                        <!-- <li>Phone: <span><a href="tel:+12347687565">+12347687565</a></span></li> -->
                                    </ul>
                                </div>
                                <!-- /.divider-line -->
                                <a href="contact-us.php" class="btn-nine text-uppercase rounded-3 w-100 mb-10">CONTACT
                                    AGENT</a>
                            </div>
                            <!-- /.agent-info -->

                            <div class="tour-schedule bg-white border-20 p-30 mb-40">
                                <h5 class="mb-40">Send Inquiry</h5>
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