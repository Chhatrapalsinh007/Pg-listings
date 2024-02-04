<?php

// Include the database connection
include '../../db_connect.php';

try {

	//count the total number of properties for specific OwnerId from the database
	$total_property = "SELECT COUNT(*) AS total FROM pg_listings WHERE PG_ApprovalStatus = 'Under Process'";
	$stmt = $conn->prepare($total_property);

	// Execute the statement
	$stmt->execute();

	// Set the resulting array to associative
	$total_property_count = $stmt->setFetchMode(PDO::FETCH_ASSOC);

	// Retrieve the result
	$total_property_count = $stmt->fetchAll();



	//set the number of results per page
	$results_per_page = 5;

	//determine the total number of pages available
	$number_of_pages = ceil($total_property_count[0]['total'] / $results_per_page);

	//determine which page number visitor is currently on
	if (!isset($_GET['page'])) {
		$page = 1;
	} else {
		$page = $_GET['page'];
	}

	//determine the sql LIMIT starting number for the results on the displaying page
	$this_page_first_result = ($page - 1) * $results_per_page;

	//Fetch 5 properties for specific OwnerId from the database
	$property = "SELECT * FROM pg_listings WHERE PG_ApprovalStatus = 'Under Process' LIMIT $this_page_first_result, $results_per_page";
	$stmt = $conn->prepare($property);


	// Execute the statement
	$stmt->execute();

	// Set the resulting array to associative
	$property = $stmt->setFetchMode(PDO::FETCH_ASSOC);

	// Retrieve the result
	$property = $stmt->fetchAll();

	//print the result
	echo "<script>console.log('Fetch Properties: " . json_encode($property) . "');</script>";
}
//catch any error
catch (PDOException $e) {
	//console log
	echo "<script>console.log('Connection failed: " . $e->getMessage() . "');</script>";
}

try {

	//retive the owner details from the database for ownerid from pg_listings
	$owner = "SELECT * FROM pg_owners WHERE OwnerId = " . $property[0]['OwnerID'];
	$stmt = $conn->prepare($owner);

	// Execute the statement
	$stmt->execute();

	// Set the resulting array to associative
	$owner = $stmt->setFetchMode(PDO::FETCH_ASSOC);

	// Retrieve the result
	$owner = $stmt->fetchAll();

	//print the result
	echo "<script>console.log('Owner Details: " . json_encode($owner) . "');</script>";
} catch (PDOException $e) {
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

						<li class="plr"><a href="dashboard.php" class="d-flex w-100 align-items-center">
								<img src="images/icon/icon_1.svg" alt="">
								<span>Admin Dashboard</span>
							</a></li>


						<!-- Property Management Section -->


						<li class="bottom-line pt-30 lg-pt-20 mb-40 lg-mb-30"></li>
						<li>
							<div class="nav-title">Listing</div>
						</li>

						<li class="plr"><a href="see-all-properties-list.php" class="d-flex w-100 align-items-center">
								<img src="images/icon/icon_6.svg" alt="">
								<span>See All Properties</span>
							</a></li>

						<li class="plr"><a href="accept-reject-property.php" class="d-flex w-100 align-items-center active">
								<img src="images/icon/icon_7_active.svg" alt="">
								<span>Approval Requests</span>
							</a></li>


						<li class="plr"><a href="approved-property.php" class="d-flex w-100 align-items-center">
								<img src="../dashboard/images/icon/icon_right.svg" alt="">
								<span>Approved Properties</span>
							</a></li>
						<!-- Property Management Section End -->


						<!-- Profile Management Section Start -->

						<li class="bottom-line pt-30 lg-pt-20 mb-40 lg-mb-30"></li>
						<li>
							<div class="nav-title">Profile</div>
						</li>
						<li class="plr"><a href="profile.html" class="d-flex w-100 align-items-center">
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
				<a href="#" class="d-flex w-100 align-items-center logout-btn">
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
					<h4 class="m0 d-none d-lg-block">Approval Requests</h4>
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
						<a href="add-property.html" class="btn-two"><span>Add Listing</span> <i class="fa-thin fa-arrow-up-right"></i></a>
					</div>
					<div class="user-data position-relative">
						<button class="user-avatar online position-relative rounded-circle dropdown-toggle" type="button" id="profile-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
							<img src="../images/lazy.svg" data-src="images/avatar_01.jpg" alt="" class="lazy-img">
						</button>
						<!-- /.user-avatar -->
						<div class="user-name-data">
							<ul class="dropdown-menu" aria-labelledby="profile-dropdown">
								<li>
									<a class="dropdown-item d-flex align-items-center" href="profile.html"><img src="../images/lazy.svg" data-src="images/icon/icon_23.svg" alt="" class="lazy-img"><span class="ms-2 ps-1">Profile</span></a>
								</li>
								<li>
									<a class="dropdown-item d-flex align-items-center" href="account-settings.html"><img src="../images/lazy.svg" data-src="images/icon/icon_24.svg" alt="" class="lazy-img"><span class="ms-2 ps-1">Account Settings</span></a>
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

			<h2 class="main-title d-block d-lg-none">My Properties</h2>
			<div class="d-sm-flex align-items-center justify-content-between mb-25">

				<?php

				//show the total number of properties out of total properties and show the pagination

				//show x-x of total results
				echo "<div class='fs-16'>Showing <span class='color-dark fw-500'>" . $this_page_first_result + 1 . "–" . $this_page_first_result + 5 . "</span> of <span class='color-dark fw-500'>" . $total_property_count[0]['total'] . "</span> results</div>";

				$property_id = $property[0]['PGID'];

				//Fetch the image name from the database
				$image_query = "SELECT file_name FROM property_attachments WHERE pg_id = :PGID ";
				$stmt = $conn->prepare($image_query);
				$stmt->bindParam(':PGID', $property_id);
				$stmt->execute();
				$image = $stmt->fetch(PDO::FETCH_ASSOC);

				//print in the console
				echo "<script>console.log('Image: " . json_encode($image) . "');</script>";



				?>

			</div>



			<?php

			//show all the properties in a loop
			//if the total number of properties are more than 5 then show the pagination else don't show it and if 10 properties are there then show 2 pages and so on
			//loop through the properties and show the details of each property

			echo "<div class='bg-white card-box p0 border-20'>";
			echo "<div class='table-responsive pt-25 pb-25 pe-4 ps-4'>";
			echo "<table class='table property-list-table'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th scope='col'>Title</th>";
			echo "<th scope='col'>Date</th>";
			echo "<th scope='col'>Agent Name</th>";
			echo "<th scope='col'>Agent Id</th>";
			echo "<th scope='col'></th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody class='border-0'>";
			foreach ($property as $key => $value) {
				echo "<tr>";
				echo "<td>";
				echo "<div class='d-lg-flex align-items-center position-relative'>";
				echo "<img src='../dashboard/uploads/" . $image['file_name'] . "' alt='' class='p-img' style='width: 155px; height: 135px;'>";
				echo "<div class='ps-lg-4 md-pt-10'>";
				echo "<a href='#' class='property-name tran3s color-dark fw-500 fs-20 stretched-link'>" . $value['PG_Title'] . "</a>";
				echo "<div class='address'>" . $value['PG_Address'] . "</div>";
				echo "<strong class='price color-dark'>" . '₹ ' . $value['PG_Rent'] . " / Month</strong>";
				echo "</div>";
				echo "</div>";
				echo "</td>";
				echo "<td>";
				$date = $value['CreationDate'];
				$timestamp = strtotime($date);
				echo $date = date("d-m-Y", $timestamp);
				echo "</td>";
				echo "<td>" . $owner[0]['Owner_Name'] . "</td>";
				echo "<td>";
				echo $owner[0]['Owner_UUID'];
				echo "</td>";
				echo "<td>";
				echo "<div class='d-none d-md-block me-3'>";
				echo "<a href='property-detail_for_approval.php?propertyid=" . $value['PGID'] . "' class='btn-two'><span>Details</span> <i class='fa-sharp fa-solid fa-eye '></i></a>";
				echo "</div>";
				echo "</td>";
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";
			echo "</div>";
			echo "</div>";

			echo "<ul class='pagination-one d-flex align-items-center justify-content-center style-none pt-40'>";
			if ($total_property_count[0]['total'] > 1) {
				$pages = ceil($total_property_count[0]['total'] / 5);
				for ($i = 1; $i <= $pages; $i++) {
					echo "<li><a href='accept-reject-property.php?page=" . $i . "'>" . $i . "</a></li>";
				}
			}
			echo "</ul>";


			?>






		</div>
	</div>


	<!-- 
		=============================================
			Dashboard Body End
		============================================== 
		-->















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
</body>

</html>