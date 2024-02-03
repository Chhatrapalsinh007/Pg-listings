<?php

session_start();

// Include the database connection
include '../../db_connect.php';

//get the id of the property to be edited from the url
$PropertyId = $_GET['property_id'];

//retrive the OwnerId from the session data variable
$OwnerId = $_SESSION['data'][0]['OwnerId'];


try {

    $sql = "SELECT * FROM pg_listings WHERE PGID = :Property AND OwnerId = :Owner";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':Property', $PropertyId, PDO::PARAM_INT);
    $stmt->bindParam(':Owner', $OwnerId, PDO::PARAM_INT);

    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);


    //store the result in the variable so that it can be used to prefill the form
    $PropertyTitle = $result[0]['PG_Title'];
    $PropertyDescription = $result[0]['PG_Description'];
    $PropertyCategory = $result[0]['PG_Category'];
    $PropertyPrice = $result[0]['PG_Rent'];
    $PropertySize = $result[0]['PG_Size_sqft'];
    $PropertyBedrooms = $result[0]['PG_Bedrooms'];
    $PropertyBeds = $result[0]['PG_Beds'];
    $PropertyBathrooms = $result[0]['PG_Bathrooms'];
    $PropertyKitchens = $result[0]['PG_Kitchens'];
    $PropertyFarnichar = $result[0]['PG_Farnichar'];
    $PropertyYearBuilt = $result[0]['PG_BuiltYear'];
    $PropertyAvailabilityStatus = $result[0]['PG_ApprovalStatus'];
    $PropertyNumberOfPersons = $result[0]['PG_Beds'];
    $PropertyFor = $result[0]['PG_For'];
    $PropertyAC = $result[0]['PG_AC'];
    $PropertyGeyser = $result[0]['PG_Geyser'];
    $PropertyTV = $result[0]['PG_TV'];
    $PropertyParking = $result[0]['PG_Parking'];
    $PropertyLaundry = $result[0]['PG_Laundry'];
    $PropertyVisitorsAllowed = $result[0]['PG_VisitorsAllowed'];
    $PropertyElevator = $result[0]['PG_Elevator'];
    $PropertyRefrigerator = $result[0]['PG_Refrigerator'];
    $PropertyCCTV = $result[0]['PG_CCTV'];
    $PropertyWifi = $result[0]['PG_WiFi'];
    $PropertyAddress = $result[0]['PG_Address'];
    $PropertyCity = $result[0]['PG_City'];
    $PropertyState = $result[0]['PG_State'];
    $PropertyPinCode = $result[0]['PG_PinCode'];

    

    }
    //catch any error
catch (PDOException $e) {
    //console log
    echo "<script>console.log('Connection failed: " . $e->getMessage() . "');</script>";
} 









?>



<!DOCTYPE html>
<html lang="en">

<head>


    <title>Homy's PG Owner's Dashboard</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="../../images/fav-icon/icon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" media="all">
    <!-- Main style sheet -->
    <link rel="stylesheet" type="text/css" href="../../css/style.css" media="all">
    <!-- responsive style sheet -->
    <link rel="stylesheet" type="text/css" href="../../css/responsive.css" media="all">

</head>



<body>



    <div class="main-page-wrapper">

        <!-- 
		=============================================
			Dashboard Side Menue Start
		============================================== 
		-->
        <aside class="dash-aside-navbar">
            <div class="position-relative">
                <div class="logo d-md-block d-flex align-items-center justify-content-between plr bottom-line pb-30">
                    <a href="../../index.php">
                        <img src="../../images/logo/logo_01.svg" alt="">
                    </a>
                    <button class="close-btn d-block d-md-none"><i class="fa-light fa-circle-xmark"></i></button>
                </div>


                <nav class="dasboard-main-nav pt-30 pb-30 bottom-line">
                    <ul class="style-none">

                        <li class="plr"><a href="dashboard.php" class="d-flex w-100 align-items-center ">
                                <img src="images/icon/icon_1.svg" alt="">
                                <span>Dashboard</span>
                            </a></li>


                        <!-- Property Management Section -->


                        <li class="bottom-line pt-30 lg-pt-20 mb-40 lg-mb-30"></li>
                        <li>
                            <div class="nav-title">Listing</div>
                        </li>

                        <li class="plr"><a href="properties-list.php" class="d-flex w-100 align-items-center active">
                                <img src="images/icon/icon_6_active.svg" alt="">
                                <span>My Properties</span>
                            </a></li>

                        <li class="plr"><a href="add-property.php" class="d-flex w-100 align-items-center ">
                                <img src="images/icon/icon_7.svg" alt="">
                                <span>Add New Property</span>
                            </a></li>

                        <!-- Property Management Section End -->


                        <!-- Profile Management Section Start -->

                        <li class="bottom-line pt-30 lg-pt-20 mb-40 lg-mb-30"></li>
                        <li>
                            <div class="nav-title">Profile</div>
                        </li>
                        <li class="plr"><a href="profile.php" class="d-flex w-100 align-items-center">
                                <img src="images/icon/icon_3.svg" alt="">
                                <span>Profile</span>
                            </a></li>



            </div>

            <!-- Profile Management Section End -->

            </ul>
            </nav>



            <!-- /.dasboard-main-nav -->

            <!-- /.profile-complete-status -->


            <div class="plr pt-30">
                <a href="../sign-up_in-handler/logout_button.php"" class=" d-flex w-100 align-items-center logout-btn">
                    <div class="icon tran3s d-flex align-items-center justify-content-center rounded-circle"><img src="images/icon/icon_41.svg" alt=""></div>
                    <span>Logout</span>
                </a>
            </div>
    </div>
    </aside>


    <!-- 
		=============================================
			Dashboard Side Menue End
		============================================== 
		-->


    <!-- 
		=============================================
			Dashboard Body
		============================================== 
		-->
    <div class="dashboard-body">
        <div class="position-relative">
            <!-- ************************ Header **************************** -->
            <header class="dashboard-header">
                <div class="d-flex align-items-center justify-content-end">
                    <h4 class="m0 d-none d-lg-block">Edit Property Detail</h4>
                    <button class="dash-mobile-nav-toggler d-block d-md-none me-auto">
                        <span></span>
                    </button>
                    <form action="#" class="search-form ms-auto">

                    </form>

                    <div class="d-none d-md-block me-3">
                        <a href="add-property.php" class="btn-two"><span>Add Listing</span> <i class="fa-thin fa-arrow-up-right"></i></a>
                    </div>
                    <div class="user-data position-relative">
                        <button class="user-avatar online position-relative rounded-circle dropdown-toggle" type="button" id="profile-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                            <img src="../images/lazy.svg" data-src="images/avatar_01.jpg" alt="" class="lazy-img">
                        </button>
                        <!-- /.user-avatar -->
                        <div class="user-name-data">
                            <ul class="dropdown-menu" aria-labelledby="profile-dropdown">
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="profile.php"><img src="../images/lazy.svg" data-src="images/icon/icon_23.svg" alt="" class="lazy-img"><span class="ms-2 ps-1">Profile</span></a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="account-settings.php"><img src="../images/lazy.svg" data-src="images/icon/icon_24.svg" alt="" class="lazy-img"><span class="ms-2 ps-1">Account Settings</span></a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal" data-bs-target="#deleteModal"><img src="../images/lazy.svg" data-src="images/icon/icon_25.svg" alt="" class="lazy-img"><span class="ms-2 ps-1">Delete Account</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.user-data -->
                </div>
            </header>
            <!-- End Header -->

            <h2 class="main-title d-block d-lg-none">Add New Property</h2>

            <!-- ************************ Main Dashboard Content ************************ -->

            <form action="edit-proprty-form.php" method="POST" id="edit-property-form" enctype="multipart/form-data">

                <input type="hidden" name="property_id" value="<?php echo $PropertyId; ?>">

                <input type="hidden" name="OwnerId" value="<?php echo $OwnerId; ?>">

                <div class="bg-white card-box border-20">
                    <h4 class="dash-title-three">Overview</h4>
                    <div class="dash-input-wrapper mb-30">
                        <label for="">Property Title*</label>
                        <input type="text" placeholder="Your Property Name" name="PropertyTitle" value="<?php echo $PropertyTitle; ?>">
                    </div>
                    <!-- /.dash-input-wrapper -->
                    <div class="dash-input-wrapper mb-30">
                        <label for="">Description*</label>
                        <textarea class="size-lg" placeholder="Write about property..." name="PropertyDescription"><?php echo $PropertyDescription; ?></textarea>
                    </div>
                    <!-- /.dash-input-wrapper -->
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Category*</label>
                                <select class="nice-select" name="PropertyCategory">

                                    <option value="Bunglow" <?php echo ($PropertyCategory == 'Bunglow') ? 'selected' : ''; ?>>Bunglow</option>

                                    <option value="Flat" <?php echo ($PropertyCategory == 'Flat') ? 'selected' : ''; ?>>Flat</option>


                                    <option value="Tenament" <?php echo ($PropertyCategory == 'Tenament') ? 'selected' : ''; ?>>Tenament</option>

                                </select>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>

                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Price*</label>
                                <input type="text" placeholder="Your Price" name="PropertyPrice" value="<?php echo $PropertyPrice; ?>">
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>

                    </div>
                </div>
                <!-- /.card-box -->
                <div class="bg-white card-box border-20 mt-40">
                    <h4 class="dash-title-three">Listing Details</h4>
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Size in ft*</label>
                                <input type="text" placeholder="Ex: 3,210 sqft" name="PropertySize" value="<?php echo $PropertySize; ?>">
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Bedrooms*</label>
                                <select class="nice-select" name="PropertyBedrooms">
                                    <?php echo ($PropertyBedrooms == 0) ? '<option value="0" selected>0</option>' : '<option value="0">0</option>'; ?>
                                    <?php echo ($PropertyBedrooms == 1) ? '<option value="1" selected>1</option>' : '<option value="1">1</option>'; ?>
                                    <?php echo ($PropertyBedrooms == 2) ? '<option value="2" selected>2</option>' : '<option value="2">2</option>'; ?>
                                    <?php echo ($PropertyBedrooms == 3) ? '<option value="3" selected>3</option>' : '<option value="3">3</option>'; ?>
                                    <?php echo ($PropertyBedrooms == 4) ? '<option value="4" selected>4</option>' : '<option value="4">4</option>'; ?>

                                </select>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Beds*</label>
                                <select class="nice-select" name="PropertyBeds">
                                    <?php echo ($PropertyBeds == 0) ? '<option value="0" selected>0</option>' : '<option value="0">0</option>'; ?>
                                    <?php echo ($PropertyBeds == 1) ? '<option value="1" selected>1</option>' : '<option value="1">1</option>'; ?>
                                    <?php echo ($PropertyBeds == 2) ? '<option value="2" selected>2</option>' : '<option value="2">2</option>'; ?>
                                    <?php echo ($PropertyBeds == 3) ? '<option value="3" selected>3</option>' : '<option value="3">3</option>'; ?>
                                    <?php echo ($PropertyBeds == 4) ? '<option value="4" selected>4</option>' : '<option value="4">4</option>'; ?>
                                    <?php echo ($PropertyBeds == 5) ? '<option value="5" selected>5</option>' : '<option value="5">5</option>'; ?>
                                    <?php echo ($PropertyBeds == 6) ? '<option value="6" selected>6</option>' : '<option value="6">6</option>'; ?>
                                    <?php echo ($PropertyBeds == 7) ? '<option value="7" selected>7</option>' : '<option value="7">7</option>'; ?>
                                    <?php echo ($PropertyBeds == 8) ? '<option value="8" selected>8</option>' : '<option value="8">8</option>'; ?>
                                    <?php echo ($PropertyBeds == 9) ? '<option value="9" selected>9</option>' : '<option value="9">9</option>'; ?>
                                    <?php echo ($PropertyBeds == 10) ? '<option value="10" selected>10</option>' : '<option value="10">10</option>'; ?>
                                    <?php echo ($PropertyBeds == 11) ? '<option value="11" selected>11</option>' : '<option value="11">11</option>'; ?>
                                    <?php echo ($PropertyBeds == 12) ? '<option value="12" selected>12</option>' : '<option value="12">12</option>'; ?>
                                    <?php echo ($PropertyBeds == 13) ? '<option value="13" selected>13</option>' : '<option value="13">13</option>'; ?>
                                    <?php echo ($PropertyBeds == 14) ? '<option value="14" selected>14</option>' : '<option value="14">14</option>'; ?>
                                    <?php echo ($PropertyBeds == 15) ? '<option value="15" selected>15</option>' : '<option value="15">15</option>'; ?>
                                </select>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Bathrooms*</label>
                                <select class="nice-select" name="PropertyBathrooms">
                                    <?php echo ($PropertyBathrooms == 0) ? '<option value="0" selected>0</option>' : '<option value="0">0</option>'; ?>
                                    <?php echo ($PropertyBathrooms == 1) ? '<option value="1" selected>1</option>' : '<option value="1">1</option>'; ?>
                                    <?php echo ($PropertyBathrooms == 2) ? '<option value="2" selected>2</option>' : '<option value="2">2</option>'; ?>
                                    <?php echo ($PropertyBathrooms == 3) ? '<option value="3" selected>3</option>' : '<option value="3">3</option>'; ?>
                                    <?php echo ($PropertyBathrooms == 4) ? '<option value="4" selected>4</option>' : '<option value="4">4</option>'; ?>
                                    <?php echo ($PropertyBathrooms == 5) ? '<option value="5" selected>5</option>' : '<option value="5">5</option>'; ?>

                                </select>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Kitchens*</label>
                                <select class="nice-select" name="PropertyKitchens">
                                    <?php echo ($PropertyKitchens == 0) ? '<option value="0" selected>0</option>' : '<option value="0">0</option>'; ?>
                                    <?php echo ($PropertyKitchens == 1) ? '<option value="1" selected>1</option>' : '<option value="1">1</option>'; ?>
                                    <?php echo ($PropertyKitchens == 2) ? '<option value="2" selected>2</option>' : '<option value="2">2</option>'; ?>
                                    <?php echo ($PropertyKitchens == 3) ? '<option value="3" selected>3</option>' : '<option value="3">3</option>'; ?>
                                    <?php echo ($PropertyKitchens == 4) ? '<option value="4" selected>4</option>' : '<option value="4">4</option>'; ?>

                                </select>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>
                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Number Of Persons</label>
                                <select class="nice-select" name="PropertyNumberOfPersons">

                                    <?php echo ($PropertyNumberOfPersons == 1) ? '<option value="1" selected>1</option>' : '<option value="1">1</option>'; ?>
                                    <?php echo ($PropertyNumberOfPersons == 2) ? '<option value="2" selected>2</option>' : '<option value="2">2</option>'; ?>
                                    <?php echo ($PropertyNumberOfPersons == 3) ? '<option value="3" selected>3</option>' : '<option value="3">3</option>'; ?>
                                    <?php echo ($PropertyNumberOfPersons == 4) ? '<option value="4" selected>4</option>' : '<option value="4">4</option>'; ?>
                                    <?php echo ($PropertyNumberOfPersons == 5) ? '<option value="5" selected>5</option>' : '<option value="5">5</option>'; ?>
                                    <?php echo ($PropertyNumberOfPersons == 6) ? '<option value="6" selected>6</option>' : '<option value="6">6</option>'; ?>
                                    <?php echo ($PropertyNumberOfPersons == 7) ? '<option value="7" selected>7</option>' : '<option value="7">7</option>'; ?>
                                    <?php echo ($PropertyNumberOfPersons == 8) ? '<option value="8" selected>8</option>' : '<option value="8">8</option>'; ?>
                                    <?php echo ($PropertyNumberOfPersons == 9) ? '<option value="9" selected>9</option>' : '<option value="9">9</option>'; ?>
                                    <?php echo ($PropertyNumberOfPersons == 10) ? '<option value="10" selected>10</option>' : '<option value="10">10</option>'; ?>
                                    <?php echo ($PropertyNumberOfPersons == 11) ? '<option value="11" selected>11</option>' : '<option value="11">11</option>'; ?>
                                    <?php echo ($PropertyNumberOfPersons == 12) ? '<option value="12" selected>12</option>' : '<option value="12">12</option>'; ?>
                                    <?php echo ($PropertyNumberOfPersons == 13) ? '<option value="13" selected>13</option>' : '<option value="13">13</option>'; ?>
                                    <?php echo ($PropertyNumberOfPersons == 14) ? '<option value="14" selected>14</option>' : '<option value="14">14</option>'; ?>
                                    <?php echo ($PropertyNumberOfPersons == 15) ? '<option value="15" selected>15</option>' : '<option value="15">15</option>'; ?>
                                    <?php echo ($PropertyNumberOfPersons == 16) ? '<option value="16" selected>16</option>' : '<option value="16">16</option>'; ?>
                                    <?php echo ($PropertyNumberOfPersons == 17) ? '<option value="17" selected>17</option>' : '<option value="17">17</option>'; ?>
                                    <?php echo ($PropertyNumberOfPersons == 18) ? '<option value="18" selected>18</option>' : '<option value="18">18</option>'; ?>
                                    <?php echo ($PropertyNumberOfPersons == 19) ? '<option value="19" selected>19</option>' : '<option value="19">19</option>'; ?>
                                    <?php echo ($PropertyNumberOfPersons == 20) ? '<option value="20" selected>20</option>' : '<option value="20">20</option>'; ?>


                                </select>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>

                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Farnichar</label>
                                <select class="nice-select" name="PropertyFarnichar">


                                    <?php echo ($PropertyFarnichar == 'Furnished') ? '<option value="Furnished" selected>Furnished</option>' : '<option value="Furnished">Furnished</option>'; ?>
                                    <?php echo ($PropertyFarnichar == 'Semi Farnished') ? '<option value="Semi Farnished" selected>Semi-Furnished</option>' : '<option value="Semi Farnished">Semi-Furnished</option>'; ?>
                                    <?php echo ($PropertyFarnichar == 'Unfarnished') ? '<option value="Unfarnished" selected>Unfurnished</option>' : '<option value="Unfarnished">Unfurnished</option>'; ?>

                                </select>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>



                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Year Built*</label>
                                <input type="text" placeholder="Type Year" name="PropertyYearBuilt" value="<?php echo $PropertyYearBuilt; ?>">
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>

                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Availability Status*</label>
                                <select class="nice-select" name="PropertyAvailabilityStatus">

                                    <?php echo ($PropertyAvailabilityStatus == 'Available') ? '<option value="Available" selected>Available</option>' : '<option value="Available">Available</option>'; ?>
                                    <?php echo ($PropertyAvailabilityStatus == 'Not Available') ? '<option value="Not Available" selected>Not Available</option>' : '<option value="Not Available">Not Available</option>'; ?>
                                </select>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>



                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">For*</label>
                                <select class="nice-select" name="PropertyFor">
                                    <!-- <option value="Boys Only">Boys Only</option>
                                    <option value="Girls Only">Girls Only</option>
                                    <option value="Both">Both</option> -->

                                    <?php echo ($PropertyFor == 'For Boys') ? '<option value="Boys Only" selected>Boys</option>' : '<option value="Boys On;y">Boys Only</option>'; ?>

                                    <?php echo ($PropertyFor == 'For Girls') ? '<option value="Girls Only" selected>Girls</option>' : '<option value="Boys On;y">Boys Only</option>'; ?>

                                    <?php echo ($PropertyFor == 'For Both') ? '<option value="Both" selected>Both</option>' : '<option value = "Both">Both</option>'; ?>



                                </select>

                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>




                    </div>
                </div>
                <!-- /.card-box -->

                <div class="bg-white card-box border-20 mt-40">
                    <h4 class="dash-title-three">Photo & Video Attachment</h4>
                    <div class="dash-input-wrapper mb-20">
                        <label for="">File Attachment*</label>

                        <div class="attached-file d-flex align-items-center justify-content-between mb-15">
                            <span>PorpertyImage_01.jpg</span>
                            <a href="#" class="remove-btn"><i class="bi bi-x"></i></a>
                        </div>
                        <div class="attached-file d-flex align-items-center justify-content-between mb-15">
                            <span>PorpertyImage_02.jpg</span>
                            <a href="#" class="remove-btn"><i class="bi bi-x"></i></a>
                        </div>
                    </div>
                    <!-- /.dash-input-wrapper -->
                    <div class="dash-btn-one d-inline-block position-relative me-3">
                        <i class="bi bi-plus"></i>
                        Upload File
                        <input type="file" id="uploadCV" name="uploadCV" placeholder="">
                    </div>
                    <small>Upload file .jpg, .png, .mp4</small>
                </div>
                <!-- /.card-box -->

                <div class="bg-white card-box border-20 mt-40">
                    <h4 class="dash-title-three m0 pb-5">Select Amenities</h4>
                    <ul class="style-none d-flex flex-wrap filter-input">
                        <!-- <li>
                            <input type="checkbox" value="AC" placeholder="" name="AC">
                            <label>A/C</label>
                        </li>

                        <li>
                            <input type="checkbox" value="Geyser" name="Geyser">
                            <label>Geyser</label>
                        <li>
                            <input type="checkbox" " value=" Parking" placeholder="" name="Parking">
                            <label>Parking</label>
                        </li>


                        <li>
                            <input type="checkbox" value="VisitorsAllowed" name="VisitorsAllowed">
                            <label>Visitor Allowed</label>
                        </li>


                        <li>
                            <input type="checkbox" value="Refrigerator" name="Refrigerator">
                            <label>Refrigerator</label>
                        </li>

                        <li>
                            <input type="checkbox" value="Wifi" name="Wifi">
                            <label>Wifi</label>
                        </li>
                        <li>
                            <input type="checkbox" value="TV" name="TV">
                            <label>TV</label>
                        </li>

                        <li>
                            <input type="checkbox" value="Laundry" name="Laundry">
                            <label>Laundry</label>
                        </li>

                        <li>
                            <input type="checkbox" value="Elevator" name="Elevator">
                            <label>Elevator</label>
                        </li>

                        <li>
                            <input type="checkbox" value="CCTV" name="CCTV">
                            <label>CCTV</label>
                        </li> -->

                        <?php echo ($PropertyWifi == '1') ? '<li><input type="checkbox" value="Wifi" name="Wifi" checked><label>Wifi</label></li>' : '<li><input type="checkbox" value="Wifi" name="Wifi"><label>Wifi</label></li>'; ?>


                        <?php echo ($PropertyAC == '1') ? '<li><input type="checkbox" value="AC" placeholder="" name="AC" checked><label>A/C</label></li>' : '<li><input type="checkbox" value="AC" placeholder="" name="AC"><label>A/C</label></li>'; ?>

                        <?php echo ($PropertyGeyser == '1') ? '<li><input type="checkbox" value="Geyser" name="Geyser" checked><label>Geyser</label></li>' : '<li><input type="checkbox" value="Geyser" name="Geyser"><label>Geyser</label></li>'; ?>

                        <?php echo ($PropertyTV == '1') ? '<li><input type="checkbox" value="TV" name="TV" checked><label>TV</label></li>' : '<li><input type="checkbox" value="TV" name="TV"><label>TV</label></li>'; ?>

                        <?php echo ($PropertyParking == '1') ? '<li><input type="checkbox" value="Parking" placeholder="" name="Parking" checked><label>Parking</label></li>' : '<li><input type="checkbox" value="Parking" placeholder="" name="Parking"><label>Parking</label></li>'; ?>

                        <?php echo ($PropertyLaundry == '1') ? '<li><input type="checkbox" value="Laundry" name="Laundry" checked><label>Laundry</label></li>' : '<li><input type="checkbox" value="Laundry" name="Laundry"><label>Laundry</label></li>'; ?>


                        <?php echo ($PropertyVisitorsAllowed == '1') ? '<li><input type="checkbox" value="VisitorsAllowed" name="VisitorsAllowed" checked><label>Visitor Allowed</label></li>' : '<li><input type="checkbox" value="VisitorsAllowed" name="VisitorsAllowed"><label>Visitor Allowed</label></li>'; ?>

                        <?php echo ($PropertyElevator == '1') ? '<li><input type="checkbox" value="Elevator" name="Elevator" checked><label>Elevator</label></li>' : '<li><input type="checkbox" value="Elevator" name="Elevator"><label>Elevator</label></li>'; ?>

                        <?php echo ($PropertyRefrigerator == '1') ? '<li><input type="checkbox" value="Refrigerator" name="Refrigerator" checked><label>Refrigerator</label></li>' : '<li><input type="checkbox" value="Refrigerator" name="Refrigerator"><label>Refrigerator</label></li>'; ?>




                        <?php echo ($PropertyCCTV == '1') ? '<li><input type="checkbox" value="CCTV" name="CCTV" checked><label>CCTV</label></li>' : '<li><input type="checkbox" value="CCTV" name="CCTV"><label>CCTV</label></li>'; ?>


                    </ul>
                </div>
                <!-- /.card-box -->

                <div class="bg-white card-box border-20 mt-40">
                    <h4 class="dash-title-three">Address & Location</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="dash-input-wrapper mb-25">
                                <label for="">Address*</label>
                                <input type="text" placeholder="145/A, Ranchview" name="PropertyAddress" value="<?php echo $PropertyAddress; ?>">
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>

                        <div class="col-lg-4">
                            <div class="dash-input-wrapper mb-25">
                                <label for="">City*</label>
                                <select class="nice-select" name="PropertyCity">
                                    <!-- <option value="0">Select City</option>
                                    <option value="Ahmedabad">Ahmedabad</option>
                                    <option value="Surat">Surat</option>
                                    <option value="Vadodara">Vadodara</option>
                                    <option value="Rajkot">Rajkot</option>
                                    <option value="Bangalore">Bangalore</option>
                                    <option value="Mumbai">Mumbai</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Chennai">Chennai</option>
                                    <option value="Kolkata">Kolkata</option>
                                    <option value="Hyderabad">Hyderabad</option>
                                    <option value="Pune">Pune</option>
                                    <option value="Jaipur">Jaipur</option>
                                    <option value="Lucknow">Lucknow</option>
                                    <option value="Kanpur">Kanpur</option>
                                    <option value="Nagpur">Nagpur</option>
                                    <option value="Indore">Indore</option>
                                    <option value="Thane">Thane</option>
                                    <option value="Bhopal">Bhopal</option>
                                    <option value="Visakhapatnam">Visakhapatnam</option>
                                    <option value="Pimpri-Chinchwad">Pimpri-Chinchwad</option>
                                    <option value="Patna">Patna</option>
                                    <option value="Vadodara">Vadodara</option>
                                    <option value="Ghaziabad">Ghaziabad</option>
                                    <option value="Ludhiana">Ludhiana</option>
                                    <option value="Agra">Agra</option> -->
                                    <?php echo ($PropertyCity == 'Ahmedabad') ? '<option value="Ahmedabad" selected>Ahmedabad</option>' : '<option value="Ahmedabad">Ahmedabad</option>'; ?>

                                    <?php echo ($PropertyCity == 'Surat') ? '<option value="Surat" selected>Surat</option>' : '<option value="Surat">Surat</option>'; ?>

                                    <?php echo ($PropertyCity == 'Vadodara') ? '<option value="Vadodara" selected>Vadodara</option>' : '<option value="Vadodara">Vadodara</option>'; ?>

                                    <?php echo ($PropertyCity == 'Rajkot') ? '<option value="Rajkot" selected>Rajkot</option>' : '<option value="Rajkot">Rajkot</option>'; ?>

                                    <?php echo ($PropertyCity == 'Bangalore') ? '<option value="Bangalore" selected>Bangalore</option>' : '<option value="Bangalore">Bangalore</option>'; ?>

                                    <?php echo ($PropertyCity == 'Mumbai') ? '<option value="Mumbai" selected>Mumbai</option>' : '<option value="Mumbai">Mumbai</option>'; ?>

                                    <?php echo ($PropertyCity == 'Delhi') ? '<option value="Delhi" selected>Delhi</option>' : '<option value="Delhi">Delhi</option>'; ?>

                                    <?php echo ($PropertyCity == 'Chennai') ? '<option value="Chennai" selected>Chennai</option>' : '<option value="Chennai">Chennai</option>'; ?>

                                    <?php echo ($PropertyCity == 'Kolkata') ? '<option value="Kolkata" selected>Kolkata</option>' : '<option value="Kolkata">Kolkata</option>'; ?>

                                    <?php echo ($PropertyCity == 'Hyderabad') ? '<option value="Hyderabad" selected>Hyderabad</option>' : '<option value="Hyderabad">Hyderabad</option>'; ?>

                                    <?php echo ($PropertyCity == 'Pune') ? '<option value="Pune" selected>Pune</option>' : '<option value="Pune">Pune</option>'; ?>

                                    <?php echo ($PropertyCity == 'Jaipur') ? '<option value="Jaipur" selected>Jaipur</option>' : '<option value="Jaipur">Jaipur</option>'; ?>

                                    <?php echo ($PropertyCity == 'Lucknow') ? '<option value="Lucknow" selected>Lucknow</option>' : '<option value="Lucknow">Lucknow</option>'; ?>

                                    <?php echo ($PropertyCity == 'Kanpur') ? '<option value="Kanpur" selected>Kanpur</option>' : '<option value="Kanpur">Kanpur</option>'; ?>

                                    <?php echo ($PropertyCity == 'Nagpur') ? '<option value="Nagpur" selected>Nagpur</option>' : '<option value="Nagpur">Nagpur</option>'; ?>

                                    <?php echo ($PropertyCity == 'Indore') ? '<option value="Indore" selected>Indore</option>' : '<option value="Indore">Indore</option>'; ?>

                                    <?php echo ($PropertyCity == 'Thane') ? '<option value="Thane" selected>Thane</option>' : '<option value="Thane">Thane</option>'; ?>

                                    <?php echo ($PropertyCity == 'Bhopal') ? '<option value="Bhopal" selected>Bhopal</option>' : '<option value="Bhopal">Bhopal</option>'; ?>

                                    <?php echo ($PropertyCity == 'Visakhapatnam') ? '<option value="Visakhapatnam" selected>Visakhapatnam</option>' : '<option value="Visakhapatnam">Visakhapatnam</option>'; ?>






                                </select>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>

                        <div class="col-md-6">
                            <div class="dash-input-wrapper mb-30">
                                <label for="">Pin Code*</label>
                                <input type="text" placeholder="Type Pincode" name="PropertyPinCode" value="<?php echo $PropertyPinCode; ?>">
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>




                        <div class="col-lg-4">
                            <div class="dash-input-wrapper mb-25">
                                <label for="">State*</label>
                                <select class="nice-select" name="PropertyState">

                                    <?php echo ($PropertyState == 'Gujarat') ? '<option value="Gujarat" selected>Gujarat</option>' : '<option value="Gujarat">Gujarat</option>'; ?>

                                    <?php echo ($PropertyState == 'Maharashtra') ? '<option value="Maharashtra" selected>Maharashtra</option>' : '<option value="Maharashtra">Maharashtra</option>'; ?>

                                    <?php echo ($PropertyState == 'Delhi') ? '<option value="Delhi" selected>Delhi</option>' : '<option value="Delhi">Delhi</option>'; ?>

                                    <?php echo ($PropertyState == 'Karnataka') ? '<option value="Karnataka" selected>Karnataka</option>' : '<option value="Karnataka">Karnataka</option>'; ?>

                                    <?php echo ($PropertyState == 'Tamil Nadu') ? '<option value="Tamil Nadu" selected>Tamil Nadu</option>' : '<option value="Tamil Nadu">Tamil Nadu</option>'; ?>

                                    <?php echo ($PropertyState == 'West Bengal') ? '<option value="West Bengal" selected>West Bengal</option>' : '<option value="West Bengal">West Bengal</option>'; ?>

                                    <?php echo ($PropertyState == 'Telangana') ? '<option value="Telangana" selected>Telangana</option>' : '<option value="Telangana">Telangana</option>'; ?>

                                    <?php echo ($PropertyState == 'Uttar Pradesh') ? '<option value="Uttar Pradesh" selected>Uttar Pradesh</option>' : '<option value="Uttar Pradesh">Uttar Pradesh</option>'; ?>

                                    <?php echo ($PropertyState == 'Rajasthan') ? '<option value="Rajasthan" selected>Rajasthan</option>' : '<option value="Rajasthan">Rajasthan</option>'; ?>

                                    <?php echo ($PropertyState == 'Madhya Pradesh') ? '<option value="Madhya Pradesh" selected>Madhya Pradesh</option>' : '<option value="Madhya Pradesh">Madhya Pradesh</option>'; ?>

                                    <?php echo ($PropertyState == 'Andhra Pradesh') ? '<option value="Andhra Pradesh" selected>Andhra Pradesh</option>' : '<option value="Andhra Pradesh">Andhra Pradesh</option>'; ?>




                                </select>
                            </div>
                            <!-- /.dash-input-wrapper -->
                        </div>

                    </div>
                </div>
                <!-- /.card-box -->
                <div class="button-group d-inline-flex align-items-center mt-30">
                    <button type="submit" name="submit" class="dash-btn-two tran3s me-3">Submit Property</button>
                    <a href="#" class="dash-cancel-btn tran3s">Cancel</a>
                </div>
        </div>
    </div>
    <!-- /.dashboard-body -->

















    </div>

    <!-- jQuery first, then Bootstrap JS -->
    <!-- jQuery -->
    <script src="../../vendor/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- WOW js -->
    <script src="../../vendor/wow/wow.min.js"></script>
    <!-- Slick Slider -->
    <script src="../../vendor/slick/slick.min.js"></script>
    <!-- Fancybox -->
    <script src="../../vendor/fancybox/fancybox.umd.js"></script>
    <!-- Lazy -->
    <script src="../../vendor/jquery.lazy.min.js"></script>
    <!-- js Counter -->
    <script src="../../vendor/jquery.counterup.min.js"></script>
    <script src="../../vendor/jquery.waypoints.min.js"></script>
    <!-- Nice Select -->
    <script src="../../vendor/nice-select/jquery.nice-select.min.js"></script>
    <!-- validator js -->
    <script src="../../vendor/validator.js"></script>
    <!-- Chart js -->
    <script src="../../vendor/chart.js"></script>

    <!-- Theme js -->
    <script src="../../js/theme.js"></script>

    <!-- Include jQuery and jQuery Validation Plugin -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#edit-property-form").validate({
                rules: {
                    PropertyTitle: {
                        required: true,
                        minlength: 3,
                        maxlength: 50,
                        alphanumericSpace: true
                    },
                    PropertyDescription: {
                        required: true,
                        minlength: 10,
                        maxlength: 500
                    },
                    PropertyPrice: {
                        required: true,
                        number: true,
                        min: 0,
                        max: 100000000
                    },
                    PropertyYearBuilt: {
                        required: true,
                        digits: true,
                        minlength: 4,
                        maxlength: 4,
                        min: 1900,
                        max: new Date().getFullYear()
                    },
                    PropertyAddress: {
                        required: true,
                        minlength: 5,
                        maxlength: 100
                    },

                    PropertyCity: {
                        required: true
                    },
                    PropertyPinCode: {
                        required: true,
                        digits: true,
                        minlength: 6,
                        maxlength: 6
                    },
                    PropertyState: {
                        required: true
                    }
                },
                messages: {
                    PropertyTitle: {
                        required: "Please enter property title",
                        minlength: "Title must be at least 3 characters long",
                        maxlength: "Title must be at most 50 characters long",
                        alphanumericSpace: "Title must contain only letters, numbers, and spaces"
                    },
                    PropertyDescription: {
                        required: "Please enter property description",
                        minlength: "Description must be at least 10 characters long",
                        maxlength: "Description must be at most 500 characters long"
                    },
                    PropertyPrice: {
                        required: "Please enter property price",
                        number: "Price must be a number",
                        min: "Price must be more then 500",
                        max: "Price must be at most 40000"
                    },
                    PropertyYearBuilt: {
                        required: "Please enter year built",
                        digits: "Year built must be a number",
                        minlength: "Year built must be 4 digits long",
                        maxlength: "Year built must be 4 digits long",
                        min: "Year built must be at least 1900",
                        max: "Year built must be at most current year"
                    },
                    PropertyAddress: {
                        required: "Please enter property address",
                        minlength: "Address must be at least 5 characters long",
                        maxlength: "Address must be at most 100 characters long"
                    },
                    PropertyCity: {
                        required: "Please select property city"
                    },
                    PropertyPinCode: {
                        required: "Please enter property pin code",
                        digits: "Pin code must be a number",
                        minlength: "Pin code must be 6 digits long",
                        maxlength: "Pin code must be 6 digits long"
                    },
                    PropertyState: {
                        required: "Please select property state"
                    }
                }
            });

            $.validator.addMethod("alphanumericSpace", function(value, element) {
                return this.optional(element) || /^[a-zA-Z0-9\s]+$/i.test(value);
            }, "Title must contain only letters, numbers, and spaces.");
        });
    </script>











</body>
</html>