<!DOCTYPE html>
<html lang="en">

<head>


	<title>Homy's Admin Dashboard</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" sizes="56x56" href="../../images/fav-icon/icon.png">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css" media="all">
	<!-- Main style sheet -->
	<link rel="stylesheet" type="text/css" href="../../css/style.css" media="all">
	<!-- responsive style sheet -->
	<link rel="stylesheet" type="text/css" href="../../css/responsive.css" media="all">

	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />



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
					<h4 class="m0 d-none d-lg-block">Dashboard</h4>
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
						<a href="add-property.html" class="btn-two"><span>Approval Requests</span> <i class="fa-thin fa-arrow-up-right"></i></a>
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

			<h2 class="main-title d-block d-lg-none">Dashboard</h2>


			<div class="bg-white border-20">
				<div class="row" style="justify-content: space-between;">
					<div class="col-lg-3 col-6">
						<div class="dash-card-one bg-white border-30 position-relative mb-15 skew-none">
							<div class="d-sm-flex align-items-center justify-content-between">
								<div class="icon rounded-circle d-flex align-items-center justify-content-center order-sm-1"><img src="../images/lazy.svg" data-src="images/icon/icon_12.svg" alt="" class="lazy-img"></div>
								<div class="order-sm-0">
									<span>All Properties</span>
									<div class="value fw-500">1.7k+</div>
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
									<div class="value fw-500">03</div>
								</div>
							</div>
						</div>
						<!-- /.dash-card-one -->
					</div>
					<div class="col-lg-3 col-6">
						<div class="dash-card-one bg-white border-30 position-relative mb-15 ">
							<div class="d-sm-flex align-items-center justify-content-between">
								<div class="icon rounded-circle d-flex align-items-center justify-content-center order-sm-1"><img src="../images/lazy.svg" data-src="../dashboard/images/icon/icon_right_w.svg" alt="" class="lazy-img"></div>
								<div class="order-sm-0">
									<span>Approved</span>
									<div class="value fw-500">


										4.8k
									</div>
								</div>
							</div>
						</div>
						<!-- /.dash-card-one -->
					</div>

				</div>
			</div>

			<div class="bg-white border-20 mt-35">
				<div class="row" style="justify-content: space-between;">
					<div class="col-lg-3 col-6">
						<div class="dash-card-one bg-white border-30 position-relative mb-15 skew-none">
							<div class="d-sm-flex align-items-center justify-content-between">
								<div class="icon rounded-circle d-flex align-items-center justify-content-center order-sm-1"><img src="../images/lazy.svg" data-src="images/icon/icon_12.svg" alt="" class="lazy-img"></div>
								<div class="order-sm-0">
									<span>PG Owners</span>
									<div class="value fw-500">1.7k+</div>
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
									<span>Pending Approval</span>
									<div class="value fw-500">03</div>
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
									<span>Total Approved</span>
									<div class="value fw-500">4.8k</div>
								</div>
							</div>
						</div>
						<!-- /.dash-card-one -->
					</div>

				</div>
			</div>

			<div class="row gx-xxl-5 d-flex pt-15 lg-pt-10">
				<div class="col-xl-7 col-lg-6 d-flex flex-column">
					<div class="user-activity-chart bg-white border-20 mt-30 h-100">
						<div class="d-flex align-items-center justify-content-between plr">
							<h5 class="dash-title-two">Property View</h5>
							<div class="short-filter d-flex align-items-center">
								<div class="fs-16 me-2">Short by:</div>
								<select class="nice-select fw-normal">
									<option value="0">Weekly</option>
									<option value="1">Daily</option>
									<option value="2">Monthly</option>
								</select>
							</div>
						</div>
						<div class="plr mt-50">
							<div class="chart-wrapper">
								<canvas id="property-chart"></canvas>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-5 col-lg-6 d-flex">
					<div class="recent-job-tab bg-white border-20 mt-30 plr w-100">
						<h5 class="dash-title-two">Recent Message</h5>
						<div class="message-wrapper">
							<div class="message-sidebar border-0">
								<div class="email-read-panel">
									<div class="email-list-item read border-0 pt-0">
										<div class="email-short-preview position-relative">
											<div class="d-flex align-items-center justify-content-between">
												<div class="sender-name">Jenny Rio.</div>
												<div class="date">Aug 22</div>
											</div>
											<div class="mail-sub">Work inquiry from google.</div>
											<div class="mail-text">Hello, This is Jenny from google. We’r the largest online platform offer...</div>
											<div class="attached-file-preview d-flex align-items-center mt-15">
												<div class="file d-flex align-items-center me-2">
													<img src="../images/lazy.svg" data-src="images/icon/icon_28.svg" alt="" class="lazy-img me-2">
													<span>details.pdf</span>
												</div>
											</div>
											<!-- /.attached-file-preview -->
										</div>
										<!-- /.email-short-preview -->
									</div>
									<!-- /.email-list-item -->

									<div class="email-list-item primary">
										<div class="email-short-preview position-relative">
											<div class="d-flex align-items-center justify-content-between">
												<div class="sender-name">Hasan Islam.</div>
												<div class="date">May 22</div>
											</div>
											<div class="mail-sub">Product Designer Opportunities</div>
											<div class="mail-text">Hello, Greeting from Uber. Hope you doing great. I am approcing to you for..</div>
										</div>
										<!-- /.email-short-preview -->
									</div>
									<!-- /.email-list-item -->

									<div class="email-list-item">
										<div class="email-short-preview position-relative">
											<div class="d-flex align-items-center justify-content-between">
												<div class="sender-name">Jakie Chan</div>
												<div class="date">July 22</div>
											</div>
											<div class="mail-sub">Hunting Marketing Specialist</div>
											<div class="mail-text">Hello, This is Jannat from HuntX. We offer business solution to our client..</div>
										</div>
										<!-- /.email-short-preview -->
									</div>
									<!-- /.email-list-item -->
								</div>
								<!-- /.email-read-panel -->
							</div>
							<!-- /.message-sidebar -->
						</div>
						<!-- /.message-wrapper -->
					</div>
				</div>
			</div>
		</div>
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

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var lastShown = localStorage.getItem("popupLastShown");
			var today = new Date().toDateString();

			if (lastShown !== today) {
				Swal.fire({
					title: 'Remember!',
					text: 'Great powers come with great responsibilities.',
					icon: 'info',
					confirmButtonText: 'Understood'
				});

				localStorage.setItem("popupLastShown", today);
			}
		});
	</script>

</body>

</html>