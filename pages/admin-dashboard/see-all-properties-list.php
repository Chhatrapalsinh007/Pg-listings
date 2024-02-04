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

						<li class="plr"><a href="see-all-properties-list.php" class="d-flex w-100 align-items-center active">
								<img src="images/icon/icon_6_active.svg" alt="">
								<span>See All Properties</span>
							</a></li>

						<li class="plr"><a href="accept-reject-property.php" class="d-flex w-100 align-items-center">
								<img src="images/icon/icon_7.svg" alt="">
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
					<h4 class="m0 d-none d-lg-block">All Properties</h4>
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
				<div class="fs-16">Showing <span class="color-dark fw-500">1–5</span> of <span class="color-dark fw-500">40</span> results</div>

			</div>

			<div class="bg-white card-box p0 border-20">
				<div class="table-responsive pt-25 pb-25 pe-4 ps-4">
					<table class="table property-list-table">
						<thead>
							<tr>
								<th scope="col">Title</th>
								<th scope="col">Date</th>
								<th scope="col">Agent Name</th>
								<th scope="col">Agent Id</th>

								<th scope="col"></th>
							</tr>
						</thead>
						<tbody class="border-0">

							<tr>
								<td>
									<div class="d-lg-flex align-items-center position-relative">
										<img src="images/img_02.jpg" alt="" class="p-img">
										<div class="ps-lg-4 md-pt-10">
											<a href="#" class="property-name tran3s color-dark fw-500 fs-20 stretched-link">White House villa</a>
											<div class="address">Ranchview, California, USA</div>
											<strong class="price color-dark">₹42,130</strong>
										</div>
									</div>
								</td>
								<td>09 Jan, 2023</td>

								<td>John Doe</td>


								<!-- <td>
                                        <div class="action-dots float-end">
                                            <button class="action-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <span></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                              <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_18.svg" alt="" class="lazy-img"> View</a></li> -->
								<!-- <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_19.svg" alt="" class="lazy-img"> Share</a></li> -->
								<!-- <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_20.svg" alt="" class="lazy-img"> Accept</a></li>
                                              <li><a class="dropdown-item" href="#"><img src="../images/lazy.svg" data-src="images/icon/icon_21.svg" alt="" class="lazy-img"> Reject</a></li> -->
								<!-- </ul>
                                        </div>
                                    </td> !-->

								<td>
									123456
								</td>

								<td>
									<div class="d-none d-md-block me-3">
										<a href="add-property.html" class="btn-two"><span>Check Details</span> <i class="fa-sharp fa-solid fa-eye"></i></a>
									</div>
								</td>

							</tr>







						</tbody>
					</table>
					<!-- /.table property-list-table -->
				</div>
			</div>
			<!-- /.card-box -->


			<ul class="pagination-one d-flex align-items-center justify-content-center style-none pt-40">
				<li class="active"><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
				<li>....</li>
				<li class="ms-2"><a href="#" class="d-flex align-items-center">Last <img src="../../images/icon/icon_46.svg" alt="" class="ms-2"></a></li>
			</ul>
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