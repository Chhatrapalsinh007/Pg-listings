<?php


session_start();



echo "<script>console.log('PHP Session Variables: " . json_encode($_SESSION) . "');</script>";

//retrive the OwnerId from the session data variable
$OwnerId = $_SESSION['data'][0]['OwnerId'];

//print the OwnerId
echo "<script>console.log('OwnerId: " . $OwnerId . "');</script>";

//Fetch the total number of properties from the database

// Include the database connection
include '../db_connect.php';

try {

    $propertyType = isset($_GET['property_type']) ? $_GET['property_type'] : null;
    $city = isset($_GET['property_city']) ? $_GET['property_city'] : null;
    $state = isset($_GET['property_state']) ? $_GET['property_state'] : null;
    $bedroom = isset($_GET['property_bedroom']) ? $_GET['property_bedroom'] : null;
    $beds = isset($_GET['property_beds']) ? $_GET['property_beds'] : null;
    $bath = isset($_GET['property_bath']) ? $_GET['property_bath'] : null;
    $kitchen = isset($_GET['property_kitchen']) ? $_GET['property_kitchen'] : null;

    $Wifi = isset($_GET['Wifi']) ? $_GET['Wifi'] : null;
    $AC = isset($_GET['AC']) ? $_GET['AC'] : null;
    $Geyser = isset($_GET['Geyser']) ? $_GET['Geyser'] : null;
    $TV = isset($_GET['TV']) ? $_GET['TV'] : null;
    $Parking = isset($_GET['Parking']) ? $_GET['Parking'] : null;
    $Laundry = isset($_GET['Laundry']) ? $_GET['Laundry'] : null;
    $vistioersallowed = isset($_GET['vistioersallowed']) ? $_GET['vistioersallowed'] : null;
    $Elevator = isset($_GET['Elevator']) ? $_GET['Elevator'] : null;
    $Refrigerator = isset($_GET['Refrigerator']) ? $_GET['Refrigerator'] : null;
    $CCTTV = isset($_GET['CCTTV']) ? $_GET['CCTTV'] : null;

    //Price Range
    $priceRange = isset($_GET['min_price']) && isset($_GET['max_price']) ? $_GET['min_price'] . '-' . $_GET['max_price'] : null;



    $max = 5; // Maximum properties per page
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page - 1) * $max;

    // Base SQL query
    $sql = "SELECT * FROM pg_listings";
    $countSql = "SELECT COUNT(*) FROM pg_listings"; // For total count without LIMIT
    $whereConditions = [];
    $params = [];

    // Add conditions based on user input
    if (!empty($city)) {
        $whereConditions[] = "PG_City = :city";
        $params[':city'] = $city;
    }
    if (!empty($propertyType)) {
        $whereConditions[] = "PG_Category = :propertyType";
        $params[':propertyType'] = $propertyType;
    }
    if (!empty($priceRange)) {
        list($minPrice, $maxPrice) = explode('-', $priceRange);
        $whereConditions[] = "PG_Rent BETWEEN :minPrice AND :maxPrice";
        $params[':minPrice'] = trim($minPrice);
        $params[':maxPrice'] = trim($maxPrice);
    }

    // Add Approval Status condition
    $whereConditions[] = "PG_ApprovalStatus = :approvalStatus";
    $params[':approvalStatus'] = 'Approved'; // Only select properties that are approved


    // Append conditions to the SQL query
    if (!empty($whereConditions)) {
        $conditionsString = " WHERE " . implode(' AND ', $whereConditions);
        $sql .= $conditionsString;
        $countSql .= $conditionsString; // Append the same conditions to the count query
    }



    // Append LIMIT and OFFSET for pagination
    $sql .= " LIMIT :max OFFSET :offset";
    $params[':max'] = $max;
    $params[':offset'] = $offset;

    // Prepare and execute the query for fetching properties
    $stmt = $conn->prepare($sql);
    foreach ($params as $key => &$value) {
        if (in_array($key, [':minPrice', ':maxPrice', ':max', ':offset'])) {
            $stmt->bindValue($key, $value, PDO::PARAM_INT);
            //print the sql query with all the parameters value
            echo "<script>console.log('SQL Query: " . $sql . "');</script>";
            //print the parameters value
            echo "<script>console.log('Parameters: " . json_encode($params) . "');</script>";
        } else {
            $stmt->bindValue($key, $value, PDO::PARAM_STR);
        }
    }
    $stmt->execute();
    $properties = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare and execute the query for total count
    $countStmt = $conn->prepare($countSql);
    foreach ($params as $key => &$value) {
        if ($key !== ':max' && $key !== ':offset') { // Exclude LIMIT and OFFSET params
            if (in_array($key, [':minPrice', ':maxPrice'])) {
                $countStmt->bindValue($key, $value, PDO::PARAM_INT);
            } else {
                $countStmt->bindValue($key, $value, PDO::PARAM_STR);
            }
        }
    }
    $countStmt->execute();
    $total = $countStmt->fetchColumn();
    $pages = ceil($total / $max);

    // Debug output (optional)
    echo "<script>console.log('Total Properties: " . $total . "');</script>";
    echo "<script>console.log('Total Pages: " . $pages . "');</script>";
    echo "<script>console.log('Properties: " . json_encode($properties) . "');</script>";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Now, you can use $properties to display the listings,
// and $pages for generating pagination links.


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8" />

    <meta name="og:image" content="images/assets/ogg.png" />

    <title>Homy - PG Directory Listing</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="../images/fav-icon/icon.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" media="all" />
    <!-- Main style sheet -->
    <link rel="stylesheet" type="text/css" href="../css/style.css" media="all" />
    <!-- responsive style sheet -->
    <link rel="stylesheet" type="text/css" href="../css/responsive.css" media="all" />
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
                                <img src="../images/logo/logo_01.svg" alt="" />
                            </a>
                        </div>
                        <!-- logo -->
                        <div class="right-widget ms-auto ms-lg-0 me-3 me-lg-0 order-lg-3">
                            <ul class="d-flex align-items-center style-none">
                                <li>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal" class="btn-one"><i class="fa-regular fa-lock"></i>
                                        <span>Login / Sign Up</span></a>
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
                                        <div class="logo">
                                            <a href="../index.php" class="d-block"><img src="../images/logo/logo_01.svg" alt="" /></a>
                                        </div>
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

                                    <li class="nav-item">
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
            </div>
            <!-- /.inner-content -->
        </header>
        <!-- 
		=============================================
			Main Menu Ends
		============================================== 
		-->





        <!--
		=====================================================
			Property Listing Six
		=====================================================
		-->
        <div class="property-listing-six bg-pink-two pt-110 md-pt-80 pb-150 xl-pb-120 mt-150 xl-mt-120">
            <div class="container container-large">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="ps-xxl-5">
                            <div class="listing-header-filter d-sm-flex justify-content-between align-items-center mb-40 lg-mb-30">
                                <div>



                                    <!-- Showing <span class="color-dark fw-500">1–8</span> of
                                    <span class="color-dark fw-500">1,230</span> results -->

                                    Showing
                                    <?php
                                    $start = $offset + 1;
                                    $end = $offset + $max;
                                    if ($end > $total) {
                                        $end = $total;
                                    }
                                    echo "<span class='color-dark fw-500'>$start-$end</span> Out of <span class='color-dark
                                    fw-500'>$total </span> Properties";
                                    ?>




                                </div>


                            </div>
                            <!-- /.listing-header-filter -->

                            <div class="row gx-xxl-5">

                                <!-- ===========================
                                ======= Showing Properties Start =======
                                =========================== -->

                                <?php

                                foreach ($properties as $property) {
                                    echo "<div class='col-md-6 d-flex mb-50 wow fadeInUp'>
                                    <div class='listing-card-one border-25 h-100 w-100'>
                                        <div class='img-gallery p-15'>
                                            <div class='position-relative border-25 overflow-hidden'>
                                                <div class='tag border-25'>$property[PG_City]</div>
                                                <a href='bookmark.php?PG_Id=$property[PGID]' class='fav-btn tran3s'><i class='fa-light fa-heart'></i></a>
                                                <div id='carousel7' class='carousel slide'>
                                                    <div class='carousel-indicators'>
                                                        <button type='button' data-bs-target='#carousel7' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
                                                        <button type='button' data-bs-target='#carousel7' data-bs-slide-to='1' aria-label='Slide 2'></button>
                                                        <button type='button' data-bs-target='#carousel7' data-bs-slide-to='2' aria-label='Slide 3'></button>
                                                    </div>
                                                    <div class='carousel-inner'>
                                                        <div class='carousel-item active' data-bs-interval='1000000'>
                                                            <a href='#' class='d-block'><img src='../images/listing/img-1.jpg' class='w-100' alt
                                                            ='...' /></a>
                                                        </div>
                                                        <div class='carousel-item' data-bs-interval='1000000'>
                                                            <a href='#' class='d-block'><img src='../images/listing/img-2.jpg' class='w-100' alt
                                                            ='...' /></a>
                                                        </div>
                                                        <div class='carousel-item' data-bs-interval='1000000'>
                                                            <a href='#' class='d-block'><img src='../images/listing/img-3.jpg' class='w-100' alt
                                                            ='...' /></a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.img-gallery -->

                                        <div class='property-info p-25'>
                                            <a href='listing-details.php?id=$property[PGID]' class='title tran
                                            3s'>$property[PG_Title]</a>
                                            <div class='address'>" . substr($property['PG_Address'], 0, 140) . "...</div>
                                            <ul class='style-none feature d-flex flex-wrap align-items-center justify-content-between'>
                                                <li class='d-flex align-items-center'>
                                                    <img src='../images/lazy.svg' data-src='../images/icon/icon_04.svg' alt='' class='lazy-img icon me-2' />
                                                    <span class='fs-16'>$property[PG_Size_sqft] sqft</span>
                                                </li>
                                                <li class='d-flex align-items-center'>
                                                    <img src='../images/lazy.svg' data-src='../images/icon/icon_05.svg' alt='' class='lazy-img icon me-2' />
                                                    <span class='fs-16'>$property[PG_Beds] bed</span>
                                                </li>
                                                <li class='d-flex align-items-center'>
                                                    <img src='../images/lazy.svg' data-src='../images/icon/icon_06.svg' alt='' class='lazy-img icon me-2' />
                                                    <span class='fs-16'>$property[PG_Bathrooms] bath</span>
                                                </li>
                                            </ul>
                                            <div class='pl-footer top-border d-flex align-items-center justify-content-between'>
                                                <strong class='price fw-500 color-dark'>₹$property[PG_Rent]/<sub>m</sub></strong>

                                                
                                                <a href='listing-details.php?PG_Id=$property[PGID]' class='btn-four rounded-circle'><i class='bi bi-arrow-up-right'></i></a>


                                                
                                            </div>
                                        </div>
                                        <!-- /.property-info -->
                                    </div>
                                    <!-- /.listing-card-one -->
                                </div>";
                                }






                                ?>

                                <!-- ===========================
                                ======= Showing Properties End =======
                                =========================== -->




                            </div>
                            <!-- <ul class="pagination-one d-flex align-items-center justify-content-center justify-content-sm-start style-none pt-30">
                                <li><a href="#">1</a></li>
                                <li class="active"><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li>....</li>
                                <li class="ms-2">
                                    <a href="#" class="d-flex align-items-center">Last
                                        <img src="../images/icon/icon_46.svg" alt="" class="ms-2" /></a>
                                </li>
                                
                            </ul> -->


                            <?php
                            if ($pages = 1) {
                                echo "<ul class='pagination d-flex align-items-center justify-content-center justify-content-sm-start style-none pt-30'>";
                                if ($page > 1) {
                                    echo "<li><a href='listing.php?page=1'><i class='fa-regular fa-angle-double-left'></i></a></li>";
                                    echo "<li><a href='listing.php?page=" . ($page - 1) . "'><i class='fa-regular fa-angle-left'></i></a></li>";
                                }
                                for ($i = 1; $i <= $pages; $i++) {
                                    echo "<li class='" . ($page == $i ? 'active' : '') . "'><a href='listing.php?page=$i'>$i</a></li>";
                                }
                                if ($page < $pages) {
                                    echo "<li><a href='listing.php?page=" . ($page + 1) . "'><i class='fa-regular fa-angle-right'></i></a></li>";
                                    echo "<li><a href='listing.php?page=$pages'><i class='fa-regular
                                    fa-angle-double-right'></i></a></li>";
                                }
                                echo "</ul>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-4 order-lg-first">
                        <div class="advance-search-panel dot-bg md-mt-80">
                            <div class="main-bg">
                                <form method="get" action="listing.php">
                                    <div class="row gx-lg-5">
                                        <div class="col-12">
                                            <div class="input-box-one mb-35">
                                                <div class="label">I’m looking for...</div>
                                                <select class="nice-select fw-normal" name="property_type">
                                                    <option value="Bunglow" <?php if ($propertyType == "Bunglow") echo "selected"; ?>>Bunglow</option>
                                                    <option value="Tenaments" <?php if ($propertyType == "Tenaments") echo "selected"; ?>>Tenaments</option>
                                                    <option value="Flat" <?php if ($propertyType == "Flat") echo "selected"; ?>>Flat</option>
                                                </select>
                                            </div>
                                            <!-- /.input-box-one -->
                                        </div>
                                        <div class="col-12">
                                            <div class="input-box-one mb-35">
                                                <div class="label">City</div>
                                                <select class="nice-select fw-normal" name="property_city">
                                                    <option value="Ahmedabad" <?php if ($city == "Ahmedabad") echo "selected"; ?>>Ahmedabad</option>
                                                    <option value="Bangalore" <?php if ($city == "Bangalore") echo "selected"; ?>>Bangalore</option>
                                                    <option value="Chennai" <?php if ($city == "Chennai") echo "selected"; ?>>Chennai</option>
                                                    <option value="Delhi" <?php if ($city == "Delhi") echo "selected"; ?>>Delhi</option>
                                                    <option value="Hyderabad" <?php if ($city == "Hyderabad") echo "selected"; ?>>Hyderabad</option>
                                                    <option value="Kolkata" <?php if ($city == "Kolkata") echo "selected"; ?>>Kolkata</option>
                                                    <option value="Mumbai" <?php if ($city == "Mumbai") echo "selected"; ?>>Mumbai</option>
                                                    <option value="Pune" <?php if ($city == "Pune") echo "selected"; ?>>Pune</option>

                                                </select>
                                            </div>
                                            <!-- /.input-box-one -->
                                        </div>
                                        <div class="col-12">
                                            <div class="input-box-one mb-50">
                                                <div class="label">State</div>
                                                <select class="nice-select location fw-normal" name="property_state">
                                                    <option value="Gujarat" <?php if ($state == "Gujarat") echo "selected"; ?>>Gujarat</option>
                                                    <option value="Karnataka" <?php if ($state == "Karnataka") echo "selected"; ?>>Karnataka</option>
                                                    <option value="Tamil Nadu" <?php if ($state == "Tamil Nadu") echo "selected"; ?>>Tamil Nadu</option>
                                                    <option value="Delhi" <?php if ($state == "Delhi") echo "selected"; ?>>Delhi</option>
                                                    <option value="Telangana" <?php if ($state == "Telangana") echo "selected"; ?>>Telangana</option>
                                                    <option value="West Bengal" <?php if ($state == "West Bengal") echo "selected"; ?>>West Bengal</option>
                                                    <option value="Maharashtra" <?php if ($state == "Maharashtra") echo "selected"; ?>>Maharashtra</option>
                                                    <option value="Maharashtra" <?php if ($state == "Maharashtra") echo "selected"; ?>>Maharashtra</option>

                                                </select>
                                            </div>
                                            <!-- /.input-box-one -->
                                        </div>
                                        <div class="col-12">
                                            <div class="input-box-one mb-50">
                                                <div class="label">Farnicher</div>
                                                <select class="nice-select  fw-normal" name="property_farnicher">
                                                    <option value="Furnished" <?php if ($state == "Furnished") echo "selected"; ?>>Furnished</option>
                                                    <option value="Semi-Furnished" <?php if ($state == "Semi-Furnished") echo "selected"; ?>>Semi-Furnished</option>
                                                    <option value="Unfurnished" <?php if ($state == "Unfurnished") echo "selected"; ?>>Unfurnished</option>

                                                </select>
                                            </div>
                                            <!-- /.input-box-one -->
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-box-one mb-40">
                                                <div class="label">Bedroom</div>
                                                <select class="nice-select fw-normal" name="property_bedroom">
                                                    <option value="1" <?php if ($bedroom == "1") echo "selected"; ?>>1</option>
                                                    <option value="2" <?php if ($bedroom == "2") echo "selected"; ?>>2</option>
                                                    <option value="3" <?php if ($bedroom == "3") echo "selected"; ?>>3</option>
                                                    <option value="4" <?php if ($bedroom == "4") echo "selected"; ?>>4</option>
                                                    <option value="5" <?php if ($bedroom == "5") echo "selected"; ?>>5</option>
                                                    <option value="6" <?php if ($bedroom == "6") echo "selected"; ?>>6</option>
                                                    <option value="7" <?php if ($bedroom == "7") echo "selected"; ?>>7</option>


                                                </select>
                                            </div>
                                            <!-- /.input-box-one -->
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-box-one mb-40">
                                                <div class="label">Beds</div>
                                                <select class="nice-select fw-normal" name="property_beds">
                                                    <option value="1" <?php if ($beds == "1") echo "selected"; ?>>1</option>
                                                    <option value="2" <?php if ($beds == "2") echo "selected"; ?>>2</option>
                                                    <option value="3" <?php if ($beds == "3") echo "selected"; ?>>3</option>
                                                    <option value="4" <?php if ($beds == "4") echo "selected"; ?>>4</option>
                                                    <option value="5" <?php if ($beds == "5") echo "selected"; ?>>5</option>
                                                    <option value="6" <?php if ($beds == "6") echo "selected"; ?>>6</option>
                                                    <option value="7" <?php if ($beds == "7") echo "selected"; ?>>7</option>
                                                </select>
                                            </div>
                                            <!-- /.input-box-one -->
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-box-one mb-40">
                                                <div class="label">Bathrooms</div>
                                                <select class="nice-select fw-normal" name="property_bath">
                                                    <option value="1" <?php if ($bath == "1") echo "selected"; ?>>1</option>
                                                    <option value="2" <?php if ($bath == "2") echo "selected"; ?>>2</option>
                                                    <option value="3" <?php if ($bath == "3") echo "selected"; ?>>3</option>
                                                    <option value="4" <?php if ($bath == "4") echo "selected"; ?>>4</option>
                                                    <option value="5" <?php if ($bath == "5") echo "selected"; ?>>5</option>
                                                    <option value="6" <?php if ($bath == "6") echo "selected"; ?>>6</option>
                                                    <option value="7" <?php if ($bath == "7") echo "selected"; ?>>7</option>

                                                </select>
                                            </div>
                                            <!-- /.input-box-one -->
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="input-box-one mb-40">
                                                <div class="label">Kitchen</div>
                                                <select class="nice-select fw-normal" name="property_kitchen">
                                                    <option value="1" <?php if ($kitchen == "1") echo "selected"; ?>>1</option>
                                                    <option value="2" <?php if ($kitchen == "2") echo "selected"; ?>>2</option>
                                                    <option value="3" <?php if ($kitchen == "3") echo "selected"; ?>>3</option>
                                                    <option value="4" <?php if ($kitchen == "4") echo "selected"; ?>>4</option>
                                                    <option value="5" <?php if ($kitchen == "5") echo "selected"; ?>>5</option>
                                                    <option value="6" <?php if ($kitchen == "6") echo "selected"; ?>>6</option>
                                                    <option value="7" <?php if ($kitchen == "7") echo "selected"; ?>>7</option>

                                                </select>
                                            </div>
                                            <!-- /.input-box-one -->
                                        </div>
                                        <div class="col-12">
                                            <h6 class="block-title fw-bold mb-30">Amenities</h6>
                                            <ul class="style-none d-flex flex-wrap justify-content-between filter-input">
                                                <li>
                                                    <input type="checkbox" name="Wifi" value="1" <?php if (isset($_GET['Wifi']) && $_GET['Wifi'] == "1") echo "checked"; ?>>
                                                    <label>Wifi</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="AC" value="1" <?php if (isset($_GET['AC']) && $_GET['AC'] == "1") echo "checked"; ?>>
                                                    <label>A/C</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="Geyser" value="1" <?php if (isset($_GET['Geyser']) && $_GET['Geyser'] == "1") echo "checked"; ?>>
                                                    <label>Geyser</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="TV" value="1" <?php if (isset($_GET['TV']) && $_GET['TV'] == "1") echo "checked"; ?>>
                                                    <label>TV</label>
                                                </li>

                                                <li>
                                                    <input type="checkbox" name="Parking" value="1" <?php if (isset($_GET['Parking']) && $_GET['Parking'] == "1") echo "checked"; ?>>
                                                    <label>Parking</label>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="Laundry" value="1" <?php if (isset($_GET['Laundry']) && $_GET['Laundry'] == "1") echo "checked"; ?>>
                                                    <label>Laundry</label>
                                                </li>


                                                <li>
                                                    <input type="checkbox" name="vistioersallowed" value="1" <?php if (isset($_GET['vistioersallowed']) && $_GET['vistioersallowed'] == "1") echo "checked"; ?>>
                                                    <label>Visitors Allowed</label>
                                                </li>

                                                <li>
                                                    <input type="checkbox" name="Elevator" value="1" <?php if (isset($_GET['Elevator']) && $_GET['Elevator'] == "1") echo "checked"; ?>>
                                                    <label>Elevator</label>
                                                </li>

                                                <li>
                                                    <input type="checkbox" name="Refrigerator" value="1" <?php if (isset($_GET['Refrigerator']) && $_GET['Refrigerator'] == "1") echo "checked"; ?>>
                                                    <label>Refrigerator</label>
                                                </li>

                                                <li>
                                                    <input type="checkbox" name="CCTV" value="1" <?php if (isset($_GET['CCTV']) && $_GET['CCTV'] == "1") echo "checked"; ?>>
                                                    <label>CCTV</label>
                                                </li>





                                            </ul>
                                        </div>
                                        <div class="col-12">
                                            <h6 class="block-title fw-bold mt-25 mb-15">
                                                Price range
                                            </h6>
                                            <div class="price-ranger">
                                                <div class="price-input d-flex align-items-center justify-content-between pt-5">
                                                    <div class="field d-flex align-items-center">
                                                        <input type="number" class="input-min" value="2500" readonly />
                                                    </div>
                                                    <div class="divider-line"></div>
                                                    <div class="field d-flex align-items-center">
                                                        <input type="number" class="input-max" value="35000" readonly />
                                                    </div>
                                                    <div class="currency ps-1">INR</div>
                                                </div>
                                                <div class="slider">
                                                    <div class="progress"></div>
                                                </div>
                                                <div class="range-input mb-10">
                                                    <input type="range" name="min_price" class="range-min" min="1000" max="80000" value="<?php echo isset($_GET['min_price']) ? $_GET['min_price'] : '2500'; ?>" step="500" />
                                                    <input type="range" name="max_price" class="range-max" min="0" max="100000" value="<?php echo isset($_GET['max_price']) ? $_GET['max_price'] : '35000'; ?>" step="500" />

                                                </div>
                                            </div>
                                            <!-- /.price-ranger -->
                                        </div>

                                        <div class="col-12">
                                            <button class="fw-500 text-uppercase tran3s apply-search w-100 mt-40 mb-25">
                                                <i class="fa-light fa-magnifying-glass"></i>
                                                <span>Search</span>
                                            </button>
                                        </div>
                                        <div class="col-12">
                                            <div class="d-flex justify-content-between form-widget">
                                                <a href="listing.php" class="tran3s">
                                                    <i class="fa-regular fa-arrows-rotate"></i>
                                                    <span>Reset Filter</span>
                                                </a>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.main-bg -->
                        </div>
                        <!-- /.advance-search-panel -->
                    </div>
                </div>
            </div>
        </div>
        <!-- /.property-listing-six -->



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
                                                    <span class="placeholder_icon"><span class="passVicon"><img src="/images/icon/icon_68.svg" alt=""></span></span>
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
                                                    <span class="placeholder_icon"><span class="passVicon"><img src="/images/icon/icon_68.svg" alt=""></span></span>
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

    <script>
        document.getElementById('minPrice').addEventListener('input', function() {
            document.getElementById('displayMinPrice').value = this.value;
        });

        document.getElementById('maxPrice').addEventListener('input', function() {
            document.getElementById('displayMaxPrice').value = this.value;
        });
    </script>

</body>

</html>