<?php
session_start();



echo "<script>console.log('PHP Session Variables: " . json_encode($_SESSION) . "');</script>";

//retrive the OwnerId from the session data variable
$OwnerId = $_SESSION['data'][0]['OwnerId'];

//print the OwnerId
echo "<script>console.log('OwnerId: " . $OwnerId . "');</script>";

//Fetch the total number of properties from the database

// Include the database connection
include '../../db_connect.php'; // Adjust the path as needed

try {

	//  <!--
	// 	=============================================
	// 	count the total number of properties for specific OwnerId from the database Start
	// 	==============================================
	// 	-->

	//count the total number of properties for specific OwnerId from the database
	$total_property = "SELECT COUNT(*) AS total FROM pg_listings WHERE OwnerId = :OwnerId";
	$stmt = $conn->prepare($total_property);

	// Bind parameters
	$stmt->bindParam(':OwnerId', $OwnerId);

	// Execute the statement
	$stmt->execute();

	// Set the resulting array to associative
	$total_property_count = $stmt->setFetchMode(PDO::FETCH_ASSOC);

	// Retrieve the result
	$total_property_count = $stmt->fetchAll();

	//print the result
	echo "<script>console.log('Total Properties: " . json_encode($total_property_count) . "');</script>";

	// <!--
	// =============================================
	// count the total number of properties for specific OwnerId from the database End
	// ==============================================
	// -->

	//  <!--
	// 	=============================================
	// 	count the total number of approved properties for specific OwnerId from the database Start
	// 	==============================================
	// 	-->

	//count the total number of approved properties for specific OwnerId from the database
	$total_approved_property = "SELECT COUNT(*) AS total FROM pg_listings WHERE OwnerId = :OwnerId AND PG_ApprovalStatus = 'Approved'";
	$stmt = $conn->prepare($total_approved_property);

	// Bind parameters
	$stmt->bindParam(':OwnerId', $OwnerId);

	// Execute the statement
	$stmt->execute();

	// Set the resulting array to associative
	$total_approved_property_count = $stmt->setFetchMode(PDO::FETCH_ASSOC);

	// Retrieve the result
	$total_approved_property_count = $stmt->fetchAll();

	//print the result
	echo "<script>console.log('Total Approved Properties: " . json_encode($total_approved_property_count) . "');</script>";

	//  <!--
	// 	=============================================
	// 	count the total number of approved properties for specific OwnerId from the database End
	// 	==============================================


	//  <!-- 
	// 	=============================================
	// 	count the total number of pending properties for specific OwnerId from the database Start
	// 	============================================== 
	// 	-->


	$total_pending_property = "SELECT COUNT(*) AS total FROM pg_listings WHERE OwnerId = :OwnerId AND PG_ApprovalStatus = 'Under Process'";
	$stmt = $conn->prepare($total_pending_property);

	// Bind parameters
	$stmt->bindParam(':OwnerId', $OwnerId);

	// Execute the statement
	$stmt->execute();

	// Set the resulting array to associative
	$total_pending_property_count = $stmt->setFetchMode(PDO::FETCH_ASSOC);

	// Retrieve the result
	$total_pending_property_count = $stmt->fetchAll();

	//print the result
	echo "<script>console.log('Total Pending Properties: " . json_encode($total_pending_property_count) . "');</script>";

	//  <!-- 
	// 	=============================================
	// 	count the total number of pending properties for specific OwnerId from the database End
	// 	============================================== 
	// 	-->


	//  <!--
	// 	=============================================
	// 	count the total number OF views for the properties for specific OwnerId from the database // Start	
	// 	==============================================
	// 	-->

	//count the total number of views for the properties for specific OwnerId from the database
	$total_property_views = "SELECT SUM(PG_TotalViews) AS total FROM pg_listings WHERE OwnerId = :OwnerId";
	$stmt = $conn->prepare($total_property_views);

	// Bind parameters
	$stmt->bindParam(':OwnerId', $OwnerId);

	// Execute the statement
	$stmt->execute();

	// Set the resulting array to associative
	$total_property_views_count = $stmt->setFetchMode(PDO::FETCH_ASSOC);

	// Retrieve the result
	$total_property_views_count = $stmt->fetchAll();

	//print the result

	echo "<script>console.log('Total Property Views: " . json_encode($total_property_views_count) . "');</script>";

	//  <!--
	// 	=============================================
	// 	count the total number OF views for the properties for specific OwnerId from the database // End
	// 	==============================================
	// 	-->



	//  <!--
	// 	=============================================
	// 	Fetch the active properties for specific OwnerId from the database // Start
	// 	==============================================
	// 	-->

	//Fetch the active properties for specific OwnerId from the database
	$active_propery = "SELECT * FROM pg_listings WHERE OwnerId = :OwnerId AND PG_ApprovalStatus = 'Approved'";

	$stmt = $conn->prepare($active_propery);

	// Bind parameters
	$stmt->bindParam(':OwnerId', $OwnerId);

	// Execute the statement
	$stmt->execute();

	// Set the resulting array to associative
	$active_propery = $stmt->setFetchMode(PDO::FETCH_ASSOC);

	// Retrieve the result
	$active_propery = $stmt->fetchAll();

	//print the result
	echo "<script>console.log('Active Properties: " . json_encode($active_propery) . "');</script>";

	//  <!--
	// 	=============================================
	// 	Fetch the active properties for specific OwnerId from the database // End
	// 	==============================================
	// 	-->



} catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
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

						<li class="plr"><a href="#" class="d-flex w-100 align-items-center active">
								<img src="images/icon/icon_1_active.svg" alt="">
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

						<li class="plr"><a href="add-property.php" class="d-flex w-100 align-items-center">
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
					<h4 class="m0 d-none d-lg-block">Welcome <?php echo $_SESSION['pgowner_name']; ?></h4>
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

			<h2 class="main-title d-block d-lg-none">Dashboard</h2>
			<div class="bg-white border-20">
				<div class="row" style="justify-content: space-between;">
					<div class="col-lg-3 col-6">
						<div class="dash-card-one bg-white border-30 position-relative mb-15 skew-none">
							<div class="d-sm-flex align-items-center justify-content-between">
								<div class="icon rounded-circle d-flex align-items-center justify-content-center order-sm-1"><img src="../images/lazy.svg" data-src="images/icon/icon_12.svg" alt="" class="lazy-img"></div>
								<div class="order-sm-0">
									<span>All Properties</span>
									<div class="value fw-500">


										<?php if ($total_property_count[0]['total'] < 10) {
											echo "0" . $total_property_count[0]['total'];
										} else {
											echo $total_property_count[0]['total'];
										} ?>


									</div>
								</div>
							</div>
						</div>
						<!-- /.dash-card-one -->
					</div>
					<div class="col-lg-3 col-6">
						<div class="dash-card-one bg-white border-30 position-relative mb-15 ">
							<div class="d-sm-flex align-items-center justify-content-between">
								<div class="icon rounded-circle d-flex align-items-center justify-content-center order-sm-1"><img src="../images/lazy.svg" data-src="images/icon/icon_right_w.svg" alt="" class="lazy-img"></div>
								<div class="order-sm-0">
									<span>Approved</span>
									<div class="value fw-500">


										<?php if ($total_approved_property_count[0]['total'] < 10) {
											echo "0" . $total_approved_property_count[0]['total'];
										} else {
											echo $total_approved_property_count[0]['total'];
										} ?>

									</div>
								</div>
							</div>
						</div>
						<!-- /.dash-card-one -->
					</div>

					<div class="col-lg-3 col-6">
						<div class="dash-card-one bg-white border-30 position-relative mb-15">
							<div class="d-sm-flex align-items-center justify-content-between">
								<div class="icon rounded-circle d-flex align-items-center justify-content-center order-sm-1"><img src="../images/lazy.svg" data-src="images/icon/icon_13.svg" alt="" class="lazy-img"></div>
								<div class="order-sm-0">
									<span>Pending</span>
									<div class="value fw-500">


										<?php if ($total_pending_property_count[0]['total'] < 10) {
											echo "0" . $total_pending_property_count[0]['total'];
										} else {
											echo $total_pending_property_count[0]['total'];
										} ?>


									</div>
								</div>
							</div>
						</div>
						<!-- /.dash-card-one -->
					</div>
					<div class="col-lg-3 col-6">
						<div class="dash-card-one bg-white border-30 position-relative mb-15">
							<div class="d-sm-flex align-items-center justify-content-between">
								<div class="icon rounded-circle d-flex align-items-center justify-content-center order-sm-1"><img src="../images/lazy.svg" data-src="images/icon/icon_14.svg" alt="" class="lazy-img"></div>
								<div class="order-sm-0">
									<span>Total Views</span>
									<div class="value fw-500">

										<?php if ($total_property_views_count[0]['total'] < 10) {
											echo "0" . $total_property_views_count[0]['total'];
										} elseif ($total_property_views_count[0]['total'] >= 1000) {
											echo $total_property_views_count[0]['total'] / 1000 . "K";
										} else {
											echo $total_property_views_count[0]['total'];
										} ?>
									</div>
								</div>
							</div>
							<!-- /.dash-card-one -->
						</div>



					</div>
				</div>


			</div>

			<div class="d-sm-flex align-items-center justify-content-between mb-25 mt-100">
				<div class="fs-16"><span class="color-dark fw-500">Active Properties</span></div>

			</div>

			<div class="bg-white card-box p0 border-20">
				<div class="table-responsive pt-25 pb-25 pe-4 ps-4">
					<table class="table property-list-table">
						<thead>
							<tr>
								<th scope="col">Title</th>
								<th scope="col">Date</th>
								<th scope="col">View</th>
								<th scope="col">Status</th>
								<th scope="col">Action</th>
							</tr>
						</thead>
						<tbody class="border-0">

						<?php foreach ($active_propery as $property) { 
							$property_id = $property['PGID'];
							$property_name = $property['PG_Title'];
							$property_address = $property['PG_Address'];
							$property_approval_status = $property['PG_ApprovalStatus'];
							//if the views are more than 1000 then convert it to K
							if ($property['PG_TotalViews'] >= 1000) {
								$property_total_views = $property['PG_TotalViews'] / 1000 . "K";
							} else
							{
								$property_total_views = $property['PG_TotalViews'];
							}
							//remove the time from the date
							$property_date = substr($property['CreationDate'], 0, 10);
							$property_image = $property['PG_Image'];
							$property_description = $property['PG_Description'];
							$property_owner_id = $property['OwnerId'];
							$property_city = $property['PG_City'];
							$property_state = $property['PG_State'];
							$property_pincode = $property['PG_Pincode'];
							$property_type = $property['PG_Type'];

							//print the result in the table-
							//retrive the image name from the database and display it


							//Fetch the image name from the database
							$image_query = "SELECT file_name FROM property_attachments WHERE pg_id = :PGID ";
							$stmt = $conn->prepare($image_query);
							$stmt->bindParam(':PGID', $property_id);
							$stmt->execute();
							$image = $stmt->fetch(PDO::FETCH_ASSOC);

							//print in the console
							echo "<script>console.log('Image: " . json_encode($image) . "');</script>";



							//print the result





							echo "<tr>";
							echo "<td>";
							echo "<div class='d-lg-flex align-items-center position-relative'>";
							echo "<img src='uploads/" . htmlspecialchars($image['file_name']) . "' alt='' class='lazy-img property-img' style='max-width: 40%;'>";
							echo "<div class='ps-lg-4 md-pt-10'>";
							echo "<a href='view-property.php?property_id=$property_id' class='property-name tran3s color-dark fw-500 fs-20 stretched-link'>$property_name</a>";
							echo "<div class='address'>$property_address</div>";
							echo "</div>";
							echo "</div>";
							echo "</td>";
							echo "<td>$property_date</td>";
							echo "<td>$property_total_views</td>";
							echo "<td>";
							echo "<div class='property-status'>$property_approval_status</div>";

							echo "</td>";
							echo "<td>";
							echo "<div class='action-dots float-end'>";

							echo "<button class='action-btn dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>";
							echo "<span></span>";
							echo "</button>";
							echo "<ul class='dropdown-menu dropdown-menu-end'>";
							echo "<li><a class='dropdown-item' href='view-property.php?property_id=$property_id'><img src='../images/lazy.svg' data-src='images/icon/icon_18.svg' alt='' class='lazy-img'> View</a></li>";

							echo "<li><a class='dropdown-item' href='edit-property.php?property_id=$property_id'><img src='../images/lazy.svg' data-src='images/icon/icon_20.svg' alt='' class='lazy-img'> Edit</a></li>";
							echo "<li><a class='dropdown-item' href='delete-property.php?property_id=$property_id'><img src='../images/lazy.svg' data-src='images/icon/icon_21.svg' alt='' class='lazy-img'> Delete</a></li>";
							echo "</ul>";
							echo "</div>";
							echo "</td>";
							echo "</tr>";
							}?>

						</tbody>
					</table>
					<!-- /.table property-list-table -->
				</div>
			</div>
			<!-- /.card-box -->

			<?php 

			//if the total number of properties are more than 5 then show the pagination else don't show it and if 10 properties are there then show 2 pages and so on

			echo "<ul class='pagination-one d-flex align-items-center justify-content-center style-none pt-40'>";
			if ($total_property_count[0]['total'] >= 1) {
				$pages = ceil($total_property_count[0]['total'] / 5);
				for ($i = 1; $i <= $pages; $i++) {
					echo "<li><a href='properties-list.php?page=$i'>$i</a></li>";
				}
			}
			echo "</ul>";

			?>


		</div>
		<!-- 
		=============================================
			Dashboard Body End
		============================================== 
		-->






















		<button class="scroll-top">
			<i class="bi bi-arrow-up-short"></i>
		</button>
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