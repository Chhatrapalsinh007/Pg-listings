<?php
session_start();



echo "<script>console.log('PHP Session Variables: " . json_encode($_SESSION) . "');</script>";

//retrive the OwnerId from the session data variable
$OwnerId = $_SESSION['data'][0]['OwnerId'];

//print the OwnerId
echo "<script>console.log('OwnerId: " . $OwnerId . "');</script>";

//Fetch the total number of properties from the database

// Include the database connection
include '../../db_connect.php';

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

	//  <!--
	// 	=============================================
	// 	Fetch 5 properties for specific OwnerId from the database Start and use pagination Start
	// 	==============================================
	// 	-->

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
	$property = "SELECT * FROM pg_listings WHERE OwnerId = :OwnerId LIMIT $this_page_first_result, $results_per_page";
	$stmt = $conn->prepare($property);

	// Bind parameters
	$stmt->bindParam(':OwnerId', $OwnerId);

	// Execute the statement
	$stmt->execute();

	// Set the resulting array to associative
	$property = $stmt->setFetchMode(PDO::FETCH_ASSOC);

	// Retrieve the result
	$property = $stmt->fetchAll();

	//print the result
	echo "<script>console.log('Fetch Properties: " . json_encode($property) . "');</script>";



	//Fetch all the properties for specific OwnerId from the database
	// $property = "SELECT * FROM pg_listings WHERE OwnerId = :OwnerId";
	// $stmt = $conn->prepare($property);

	// // Bind parameters
	// $stmt->bindParam(':OwnerId', $OwnerId);

	// // Execute the statement
	// $stmt->execute();

	// // Set the resulting array to associative
	// $property = $stmt->setFetchMode(PDO::FETCH_ASSOC);

	// // Retrieve the result
	// $property = $stmt->fetchAll();

	// //print the result
	// echo "<script>console.log('Fetch Properties: " . json_encode($property) . "');</script>";
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

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
							<img src="../../images/lazy.svg" data-src="images/avatar_01.jpg" alt="" class="lazy-img">
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

			<h2 class="main-title d-block d-lg-none">My Properties</h2>
			<div class="d-sm-flex align-items-center justify-content-between mb-25">

				<?php

				//show the total number of properties out of total properties and show the pagination

				//show x-x of total results
				echo "<div class='fs-16'>Showing <span class='color-dark fw-500'>" . $this_page_first_result + 1 . "–" . $this_page_first_result + 5 . "</span> of <span class='color-dark fw-500'>" . $total_property_count[0]['total'] . "</span> results</div>";


				?>

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


							<?php foreach ($property as $property) {

								$property_id = $property['PGID'];
								//if property name is more than 10 characters then use ... after 20 characters
								if (strlen($property['PG_Title']) > 20) {
									$property_name = substr($property['PG_Title'], 0, 20) . "...";
								} else {
									$property_name = $property['PG_Title'];
								}
								$property_address = $property['PG_Address'];
								$property_approval_status = $property['PG_ApprovalStatus'];
								//if the views are more than 1000 then convert it to K
								if ($property['PG_TotalViews'] >= 1000) {
									$property_total_views = $property['PG_TotalViews'] / 1000 . "K";
								} else {
									$property_total_views = $property['PG_TotalViews'];
								}
								//show the date in the format of 01/Jan/2024
								$property_date = date("d/M/Y", strtotime($property['PG_BuiltYear']));



								$property_description = $property['PG_Description'];
								$property_owner_id = $property['OwnerId'];
								$property_city = $property['PG_City'];
								$property_state = $property['PG_State'];
								$property_pincode = $property['PG_Pincode'];
								$property_type = $property['PG_Type'];


								//Fetch the image name from the database
								$image_query = "SELECT file_name FROM property_attachments WHERE pg_id = :PGID ";
								$stmt = $conn->prepare($image_query);
								$stmt->bindParam(':PGID', $property_id);
								$stmt->execute();
								$image = $stmt->fetch(PDO::FETCH_ASSOC);

								//print in the console
								echo "<script>console.log('Image: " . json_encode($image) . "');</script>";


								//print the result in the table

								echo "<tr>";
								echo "<td>";
								echo "<div class='d-lg-flex align-items-center position-relative'>";
								echo "<img src='uploads/" . htmlspecialchars($image['file_name']) . "' alt='' class='lazy-img property-img' style='width: 220px;height: 120px;'>";
								echo "<div class='ps-lg-4 md-pt-10'>";
								echo "<a href='edit-property.php?property_id=$property_id' class='property-name tran3s color-dark fw-500 fs-20 stretched-link'>$property_name</a>";
								echo "<div class='address'>$property_address</div>";
								echo "</div>";
								echo "</div>";
								echo "</td>";
								echo "<td>$property_date</td>";
								//if the views are more than 10000 then convert it to K and if views are less than 10 then use 0 before the views and if views are null or 0 then use 00
								if ($property['PG_TotalViews'] >= 10000) {
									echo "<td>$property_total_views K</td>";
								} elseif ($property['PG_TotalViews'] < 10) {
									echo "<td>0$property_total_views</td>";
								} elseif ($property['PG_TotalViews'] == null || $property['PG_TotalViews'] == 0) {
									echo "<td>00</td>";
								} else {
									echo "<td>$property_total_views</td>";
								}

								echo "<td>";
								//if the property status is not approved then use pending class as well
								if ($property_approval_status == "Approved") {
									echo "<div class='property-status'>$property_approval_status</div>";
								} elseif ($property_approval_status == "Under Process") {
									$temp = "Pending";
									echo "<div class='property-status pending'>$temp</div>";
								}

								echo "</td>";
								echo "<td>";
								echo "<div class='action-dots float-end'>";

								echo "<button class='action-btn dropdown-toggle' type='button' data-bs-toggle='dropdown' aria-expanded='false'>";
								echo "<span></span>";
								echo "</button>";
								echo "<ul class='dropdown-menu dropdown-menu-end'>";


								echo "<li><a class='dropdown-item' href='edit-property.php?property_id=$property_id'><img src='../images/lazy.svg' data-src='images/icon/icon_20.svg' alt='' class='lazy-img'> Edit</a></li>";

								echo "<li><a class='dropdown-item' href='javascript:void(0)' onclick='confirmDeletion(" . $property_id . ")'><img src='../images/lazy.svg' data-src='images/icon/icon_21.svg' alt='' class='lazy-img'> Delete</a></li>";
								echo "</ul>";
								echo "</div>";
								echo "</td>";
								echo "</tr>";
							} ?>


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
	</div>


	<!-- 
		=============================================
			Dashboard Body End
		============================================== 
		-->



	<!-- if user wants to delete the property then show the delete popup using sweetalert -->
	<script>
		function confirmDeletion(propertyId) {
			Swal.fire({
				title: 'Are you sure?',
				text: 'You will not be able to recover this property!',
				icon: 'error',
				showCancelButton: true,
				confirmButtonText: 'Yes, delete it!',
				cancelButtonText: 'No, keep it'
			}).then((result) => {
				if (result.isConfirmed) {
					window.location.href = `delete-property.php?property_id=${propertyId}&delete=true`;

				} else if (result.dismiss === Swal.DismissReason.cancel) {
					Swal.fire(
						'Cancelled',
						'Your property is safe :)',
						'warning'
					);
				}
			});
		}
	</script>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			const urlParams = new URLSearchParams(window.location.search);
			const deletionStatus = urlParams.get('deletionStatus');

			if (deletionStatus) {
				if (deletionStatus === 'success') {
					Swal.fire({
						title: 'Success',
						text: 'The property has been successfully deleted.',
						icon: 'success',
						confirmButtonText: 'OK'
					});
				} else if (deletionStatus === 'error') {
					Swal.fire({
						title: 'Error',
						text: 'Something went wrong. Your property was not deleted.',
						icon: 'error',
						confirmButtonText: 'OK'
					});
				}

				// Modify the URL to remove the query parameters
				const newUrl = window.location.pathname;
				history.pushState(null, '', newUrl);
			}
		});
	</script>


















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