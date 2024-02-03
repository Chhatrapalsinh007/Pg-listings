<?php

session_start();


include '../../db_connect.php'; // Contains the database connection script


// retrieve owner id from session
$OwnerId = $_SESSION['data'][0]['OwnerId'];


//insert property details into database
if (isset($_POST['submit'])) {

	$PropertyTitle = $_POST['PropertyTitle'];
	$PropertyDescription = $_POST['PropertyDescription'];
	$PropertyCategory = $_POST['PropertyCategory'];
	$PropertyPrice = $_POST['PropertyPrice'];
	$PropertySize = $_POST['PropertySize'];
	$PropertyBedrooms = $_POST['PropertyBedrooms'];
	$PropertyBeds = $_POST['PropertyBeds'];
	$PropertyBathrooms = $_POST['PropertyBathrooms'];
	$PropertyFarnichar = $_POST['PropertyFarnichar'];
	$PropertyYearBuilt = $_POST['PropertyYearBuilt'];
	$PropertyApprovalstatus = 'Under Process';
	$PropertyKitchens = $_POST['PropertyKitchens'];

	$Wifi = isset($_POST['Wifi']) ? $_POST['Wifi'] : '0';
	$AC = isset($_POST['AC']) ? $_POST['AC'] : '0';
	$Geyser = isset($_POST['Geyser']) ? $_POST['Geyser'] : '0';
	$TV = isset($_POST['TV']) ? $_POST['TV'] : '0';
	$Parking = isset($_POST['Parking']) ? $_POST['Parking'] : '0';
	$Laundry = isset($_POST['Laundry']) ? $_POST['Laundry'] : '0';
	$VisitorsAllowed = isset($_POST['VisitorsAllowed']) ? $_POST['VisitorsAllowed'] : '0';
	$Elevator = isset($_POST['Elevator']) ? $_POST['Elevator'] : '0';
	$Refrigerator = isset($_POST['Refrigerator']) ? $_POST['Refrigerator'] : '0';
	$CCTV = isset($_POST['CCTV']) ? $_POST['CCTV'] : '0';
	$PropertyAddress = $_POST['PropertyAddress'];
	$PropertyCity = $_POST['PropertyCity'];
	$PropertyState = $_POST['PropertyState'];
	$PropertyPinCode = $_POST['PropertyPinCode'];
	$PropertyFor = $_POST['PropertyFor'];
	$PropertyAvailabilityStatus = $_POST['PropertyAvailabilityStatus'];


	//print all the varaibles in the screen using the echo statement
	echo "Owner Id: " . $OwnerId . "<br>";
	echo "Property Title: " . $PropertyTitle . "<br>";
	echo "Property Description: " . $PropertyDescription . "<br>";
	echo "Property Category: " . $PropertyCategory . "<br>";
	echo "Property Price: " . $PropertyPrice . "<br>";
	echo "Property Size: " . $PropertySize . "<br>";
	echo "Property Bedrooms: " . $PropertyBedrooms . "<br>";
	echo "Property Beds: " . $PropertyBeds . "<br>";
	echo "Property Bathrooms: " . $PropertyBathrooms . "<br>";
	echo "Property Farnichar: " . $PropertyFarnichar . "<br>";
	echo "Property Year Built: " . $PropertyYearBuilt . "<br>";
	echo "Property Approval Status: " . $PropertyApprovalstatus . "<br>";
	echo "Property Kitchens: " . $PropertyKitchens . "<br>";
	echo "Property Wifi: " . $Wifi . "<br>";
	echo "Property AC: " . $AC . "<br>";
	echo "Property Geyser: " . $Geyser . "<br>";
	echo "Property TV: " . $TV . "<br>";
	echo "Property Parking: " . $Parking . "<br>";
	echo "Property Laundry: " . $Laundry . "<br>";
	echo "Property Visitors Allowed: " . $VisitorsAllowed . "<br>";
	echo "Property Elevator: " . $Elevator . "<br>";
	echo "Property Refrigerator: " . $Refrigerator . "<br>";
	echo "Property CCTV: " . $CCTV . "<br>";
	echo "Property Address: " . $PropertyAddress . "<br>";
	echo "Property City: " . $PropertyCity . "<br>";
	echo "Property State: " . $PropertyState . "<br>";
	echo "Property PinCode: " . $PropertyPinCode . "<br>";
	echo "Property For: " . $PropertyFor . "<br>";
	echo "Property Availability Status: " . $PropertyAvailabilityStatus . "<br>";

	// move the uploaded file to the server and store the file name in the database
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	// Check if image file is a actual image or fake image
	$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	if ($check !== false) {
		echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
	}

	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}

	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}

	// Allow certain file formats
	if (
		$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "mp4"
	) {
		echo "Sorry, only JPG, JPEG, PNG & MP4 files are allowed.";
		$uploadOk = 0;
	}

	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
	} else {
		//move the file to the uploads folder and store the file name in the database
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
			echo "<script>console.log('File name: " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . "');</script>";

		
			

			

		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}






	// insert property details into the database
	$sql = "INSERT INTO pg_listings (
	OwnerId, PG_Title,PG_Description,PG_Category,
	PG_Rent,PG_Size_sqft,PG_Bedrooms,PG_Beds,
	PG_Bathrooms,PG_Farnichar,PG_BuiltYear,PG_ApprovalStatus,
	PG_Kitchens,PG_WiFi,PG_AC,PG_Geyser,
	PG_TV,PG_Parking,PG_Laundry,PG_VisitorsAllowed,
	PG_Elevator,PG_Refrigerator,PG_CCTV,PG_Address,
	PG_City,PG_State,PG_PinCode,PG_For,PG_Availability) 
	VALUES 
	('$OwnerId', '$PropertyTitle', '$PropertyDescription','$PropertyCategory', 
	 '$PropertyPrice','$PropertySize', '$PropertyBedrooms','$PropertyBeds',
	 '$PropertyBathrooms','$PropertyFarnichar','$PropertyYearBuilt', '$PropertyApprovalstatus',
	 '$PropertyKitchens', '$Wifi', '$AC','$Geyser','$TV',
	  '$Parking', '$Laundry', '$VisitorsAllowed', '$Elevator', 
	  '$Refrigerator', '$CCTV', '$PropertyAddress', '$PropertyCity', 
	  '$PropertyState', '$PropertyPinCode', '$PropertyFor', '$PropertyAvailabilityStatus')";


	try {
		$stmt = $conn->prepare($sql);
		$stmt->execute();

		//print success message
		echo "New record created successfully";

		//retive the last inserted property id from the database and pass it to the add-image-name.php file


			//pass the file name to the add-image-name.php file to store the file name in the database
			//retive the last inserted property id from the database and pass it to the add-image-name.php file
			$last_inserted_id = $conn->lastInsertId();
			$filename = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
			$_SESSION['filename'] = $filename;
			$_SESSION['last_inserted_id'] = $last_inserted_id;
		header("Location: add-image-name.php");

	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
	}
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

						<li class="plr"><a href="properties-list.php" class="d-flex w-100 align-items-center">
								<img src="images/icon/icon_6.svg" alt="">
								<span>My Properties</span>
							</a></li>

						<li class="plr"><a href="add-property.php" class="d-flex w-100 align-items-center active">
								<img src="images/icon/icon_7_active.svg" alt="">
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
					<h4 class="m0 d-none d-lg-block">My Properties</h4>
					<button class="dash-mobile-nav-toggler d-block d-md-none me-auto">
						<span></span>
					</button>
					<form action="#" class="search-form ms-auto">

					</form>
					<div class="profile-notification position-relative dropdown-center ms-3 ms-md-5 me-4">
						<button class="noti-btn dropdown-toggle" type="button" id="notification-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
							<img src="../images/lazy.svg" data-src="images/icon/icon_11.svg" alt="" class="lazy-img">
							<div class="badge-pill"></div>
						</button>
						<ul class="dropdown-menu" aria-labelledby="notification-dropdown">
							<li>
								<h4>Notification</h4>
								<ul class="style-none notify-list">
									<li class="d-flex align-items-center unread">
										<img src="../images/lazy.svg" data-src="images/icon/icon_36.svg" alt="" class="lazy-img icon">
										<div class="flex-fill ps-2">
											<h6>You have 3 new mails</h6>
											<span class="time">3 hours ago</span>
										</div>
									</li>
									<li class="d-flex align-items-center">
										<img src="../images/lazy.svg" data-src="images/icon/icon_37.svg" alt="" class="lazy-img icon">
										<div class="flex-fill ps-2">
											<h6>Your listing post has been approved</h6>
											<span class="time">1 day ago</span>
										</div>
									</li>
									<li class="d-flex align-items-center unread">
										<img src="../images/lazy.svg" data-src="images/icon/icon_38.svg" alt="" class="lazy-img icon">
										<div class="flex-fill ps-2">
											<h6>Your meeting is cancelled</h6>
											<span class="time">3 days ago</span>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
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

			<form action="add-property.php" method="POST" id="add-property-form" enctype="multipart/form-data">

				<div class="bg-white card-box border-20">
					<h4 class="dash-title-three">Overview</h4>
					<div class="dash-input-wrapper mb-30">
						<label for="">Property Title*</label>
						<input type="text" placeholder="Your Property Name" name="PropertyTitle">
					</div>
					<!-- /.dash-input-wrapper -->
					<div class="dash-input-wrapper mb-30">
						<label for="">Description*</label>
						<textarea class="size-lg" placeholder="Write about property..." name="PropertyDescription"></textarea>
					</div>
					<!-- /.dash-input-wrapper -->
					<div class="row align-items-end">
						<div class="col-md-6">
							<div class="dash-input-wrapper mb-30">
								<label for="">Category*</label>
								<select class="nice-select" name="PropertyCategory">
									<option value="0">Select Category</option>

									<option value="Flat">Flat</option>
									<option value="Bunglow">Bunglow</option>
									<option value="Tenament">Tenament</option>


								</select>
							</div>
							<!-- /.dash-input-wrapper -->
						</div>

						<div class="col-md-6">
							<div class="dash-input-wrapper mb-30">
								<label for="">Price*</label>
								<input type="text" placeholder="Your Price" name="PropertyPrice">
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
								<input type="text" placeholder="Ex: 3,210 sqft" name="PropertySize">
							</div>
							<!-- /.dash-input-wrapper -->
						</div>
						<div class="col-md-6">
							<div class="dash-input-wrapper mb-30">
								<label for="">Bedrooms*</label>
								<select class="nice-select" name="PropertyBedrooms">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
								</select>
							</div>
							<!-- /.dash-input-wrapper -->
						</div>
						<div class="col-md-6">
							<div class="dash-input-wrapper mb-30">
								<label for="">Beds*</label>
								<select class="nice-select" name="PropertyBeds">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>



								</select>
							</div>
							<!-- /.dash-input-wrapper -->
						</div>
						<div class="col-md-6">
							<div class="dash-input-wrapper mb-30">
								<label for="">Bathrooms*</label>
								<select class="nice-select" name="PropertyBathrooms">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
								</select>
							</div>
							<!-- /.dash-input-wrapper -->
						</div>
						<div class="col-md-6">
							<div class="dash-input-wrapper mb-30">
								<label for="">Kitchens*</label>
								<select class="nice-select" name="PropertyKitchens">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
								</select>
							</div>
							<!-- /.dash-input-wrapper -->
						</div>
						<div class="col-md-6">
							<div class="dash-input-wrapper mb-30">
								<label for="">Number Of Persons</label>
								<select class="nice-select" name="PropertyNumberOfPersons">

									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>

								</select>
							</div>
							<!-- /.dash-input-wrapper -->
						</div>

						<div class="col-md-6">
							<div class="dash-input-wrapper mb-30">
								<label for="">Farnichar</label>
								<select class="nice-select" name="PropertyFarnichar">
									<option value="Furnished">Furnished</option>
									<option value="Semi-Furnished">Semi-Furnished</option>
									<option value="Unfurnished">Unfurnished</option>
								</select>
							</div>
							<!-- /.dash-input-wrapper -->
						</div>



						<div class="col-md-6">
							<div class="dash-input-wrapper mb-30">
								<label for="">Year Built*</label>
								<input type="text" placeholder="Type Year" name="PropertyYearBuilt">
							</div>
							<!-- /.dash-input-wrapper -->
						</div>

						<div class="col-md-6">
							<div class="dash-input-wrapper mb-30">
								<label for="">Availability Status*</label>
								<select class="nice-select" name="PropertyAvailabilityStatus">
									<option value="Available">Available</option>
									<option value="Not Available">Not Available</option>
								</select>
							</div>
							<!-- /.dash-input-wrapper -->
						</div>



						<div class="col-md-6">
							<div class="dash-input-wrapper mb-30">
								<label for="">For*</label>
								<select class="nice-select" name="PropertyFor">
									<option value="For Boys">Boys Only</option>
									<option value="For Girls">Girls Only</option>
									<option value="For Both">Both</option>
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

						<!-- Place to display selected file names -->
						<div id="fileList" class="mb-15"></div>
						<div id="errorMessages" style="color: red;"></div>


					</div>
					<!-- /.dash-input-wrapper -->
					<div class="dash-btn-one d-inline-block position-relative me-3">
						<i class="bi bi-plus"></i>
						Upload File
						<input type="file" id="uploadCV" name="fileToUpload" accept="image/*">
					</div>
					<small>Upload file .jpg, .png, .mp4</small>
				</div>
				<!-- /.card-box -->

				<div class="bg-white card-box border-20 mt-40">
					<h4 class="dash-title-three m0 pb-5">Select Amenities</h4>
					<ul class="style-none d-flex flex-wrap filter-input">
						<li>
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
					</ul>
				</div>
				<!-- /.card-box -->

				<div class="bg-white card-box border-20 mt-40">
					<h4 class="dash-title-three">Address & Location</h4>
					<div class="row">
						<div class="col-12">
							<div class="dash-input-wrapper mb-25">
								<label for="">Address*</label>
								<input type="text" placeholder="145/A, Ranchview" name="PropertyAddress">
							</div>
							<!-- /.dash-input-wrapper -->
						</div>

						<div class="col-lg-4">
							<div class="dash-input-wrapper mb-25">
								<label for="">City*</label>
								<select class="nice-select" name="PropertyCity">
									<option value="0">Select City</option>
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
									<option value="Agra">Agra</option>

								</select>
							</div>
							<!-- /.dash-input-wrapper -->
						</div>

						<div class="col-md-6">
							<div class="dash-input-wrapper mb-30">
								<label for="">Pin Code*</label>
								<input type="text" placeholder="Type Pincode" name="PropertyPinCode">
							</div>
							<!-- /.dash-input-wrapper -->
						</div>




						<div class="col-lg-4">
							<div class="dash-input-wrapper mb-25">
								<label for="">State*</label>
								<select class="nice-select" name="PropertyState">
									<option value="0">Select State</option>
									<option value="Andhra Pradesh">Andhra Pradesh</option>
									<option value="Arunachal Pradesh">Arunachal Pradesh</option>
									<option value="Assam">Assam</option>
									<option value="Bihar">Bihar</option>
									<option value="Chhattisgarh">Chhattisgarh</option>
									<option value="Goa">Goa</option>
									<option value="Gujarat">Gujarat</option>
									<option value="Haryana">Haryana</option>
									<option value="Himachal Pradesh">Himachal Pradesh</option>
									<option value="Jammu and Kashmir">Jammu and Kashmir</option>
									<option value="Jharkhand">Jharkhand</option>
									<option value="Karnataka">Karnataka</option>
									<option value="Kerala">Kerala</option>
									<option value="Madhya Pradesh">Madhya Pradesh</option>
									<option value="Maharashtra">Maharashtra</option>
									<option value="Manipur">Manipur</option>
									<option value="Meghalaya">Meghalaya</option>
									<option value="Mizoram">Mizoram</option>
									<option value="Nagaland">Nagaland</option>
									<option value="Odisha">Odisha</option>
									<option value="Punjab">Punjab</option>
									<option value="Rajasthan">Rajasthan</option>
									<option value="Sikkim">Sikkim</option>
									<option value="Tamil Nadu">Tamil Nadu</option>
									<option value="Telangana">Telangana</option>
									<option value="Tripura">Tripura</option>
									<option value="Uttar Pradesh">Uttar Pradesh</option>
									<option value="Uttarakhand">Uttarakhand</option>
									<option value="West Bengal">West Bengal</option>
									<option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
									<option value="Chandigarh">Chandigarh</option>
									<option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>

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
		//handle the file upload and show file name in the input field



		var allSelectedFiles = []; // Array to keep track of all selected files
		var allowedExtensions = ['jpg', 'jpeg', 'png', 'mp4']; // Allowed file extensions

		document.getElementById('uploadCV').addEventListener('change', function(e) {
			// Clear previous error messages
			document.getElementById('errorMessages').innerHTML = '';

			Array.from(this.files).forEach(file => {
				var fileExtension = file.name.split('.').pop().toLowerCase();

				if (allowedExtensions.includes(fileExtension)) {
					allSelectedFiles.push(file); // Add file to global array if it matches allowed types
				} else {
					// Display error message for disallowed file types
					var errorMessages = document.getElementById('errorMessages');
					var errorMessage = document.createElement('div');
					errorMessage.textContent = `Error: The file "${file.name}" is not allowed. Only ${allowedExtensions.join(", ")} files are permitted.`;
					errorMessages.appendChild(errorMessage);
				}
			});

			displayFiles(); // Update the display
		});

		function displayFiles() {
			var fileList = document.getElementById('fileList');
			fileList.innerHTML = ''; // Clear current file list

			allSelectedFiles.forEach(function(file, index) {
				var fileDiv = document.createElement('div');
				fileDiv.className = 'attached-file d-flex align-items-center justify-content-between mt-20';
				fileDiv.textContent = file.name;

				var removeBtn = document.createElement('a');
				removeBtn.href = '#';
				removeBtn.className = 'remove-btn';
				removeBtn.innerHTML = '<i class="bi bi-x"></i>';
				removeBtn.addEventListener('click', function(e) {
					e.preventDefault();
					allSelectedFiles.splice(index, 1); // Remove file from array
					displayFiles(); // Refresh displayed file list
				});

				fileDiv.appendChild(removeBtn);
				fileList.appendChild(fileDiv);
			});
		}






		$(document).ready(function() {
			$("#add-property-form").validate({
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