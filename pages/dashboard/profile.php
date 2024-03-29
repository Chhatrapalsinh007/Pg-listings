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
						<li class="plr"><a href="profile.php" class="d-flex w-100 align-items-center active">
								<img src="images/icon/icon_3_active.svg" alt="">
								<span>Profile</span>
							</a></li>



			</div>

			<!-- Profile Management Section End -->

			</ul>
			</nav>



			<!-- /.dasboard-main-nav -->

			<!-- /.profile-complete-status -->


			<div class="plr pt-30">
				<a href="../sign-up_in-handler/logout_button.php"" class="d-flex w-100 align-items-center logout-btn">
					<div class="icon tran3s d-flex align-items-center justify-content-center rounded-circle"><img
							src="images/icon/icon_41.svg" alt=""></div>
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
						<button class="noti-btn dropdown-toggle" type="button" id="notification-dropdown"
							data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
							<img src="../images/lazy.svg" data-src="images/icon/icon_11.svg" alt="" class="lazy-img">
							<div class="badge-pill"></div>
						</button>
						<ul class="dropdown-menu" aria-labelledby="notification-dropdown">
							<li>
								<h4>Notification</h4>
								<ul class="style-none notify-list">
									<li class="d-flex align-items-center unread">
										<img src="../images/lazy.svg" data-src="images/icon/icon_36.svg" alt=""
											class="lazy-img icon">
										<div class="flex-fill ps-2">
											<h6>You have 3 new mails</h6>
											<span class="time">3 hours ago</span>
										</div>
									</li>
									<li class="d-flex align-items-center">
										<img src="../images/lazy.svg" data-src="images/icon/icon_37.svg" alt=""
											class="lazy-img icon">
										<div class="flex-fill ps-2">
											<h6>Your listing post has been approved</h6>
											<span class="time">1 day ago</span>
										</div>
									</li>
									<li class="d-flex align-items-center unread">
										<img src="../images/lazy.svg" data-src="images/icon/icon_38.svg" alt=""
											class="lazy-img icon">
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
						<a href="add-property.php" class="btn-two"><span>Add Listing</span> <i
								class="fa-thin fa-arrow-up-right"></i></a>
					</div>
					<div class="user-data position-relative">
						<button class="user-avatar online position-relative rounded-circle dropdown-toggle"
							type="button" id="profile-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside"
							aria-expanded="false">
							<img src="../images/lazy.svg" data-src="images/avatar_01.jpg" alt="" class="lazy-img">
						</button>
						<!-- /.user-avatar -->
						<div class="user-name-data">
							<ul class="dropdown-menu" aria-labelledby="profile-dropdown">
								<li>
									<a class="dropdown-item d-flex align-items-center" href="profile.php"><img
											src="../images/lazy.svg" data-src="images/icon/icon_23.svg" alt=""
											class="lazy-img"><span class="ms-2 ps-1">Profile</span></a>
								</li>
								<li>
									<a class="dropdown-item d-flex align-items-center" href="account-settings.php"><img
											src="../images/lazy.svg" data-src="images/icon/icon_24.svg" alt=""
											class="lazy-img"><span class="ms-2 ps-1">Account Settings</span></a>
								</li>
								<li>
									<a class="dropdown-item d-flex align-items-center" href="#" data-bs-toggle="modal"
										data-bs-target="#deleteModal"><img src="../images/lazy.svg"
											data-src="images/icon/icon_25.svg" alt="" class="lazy-img"><span
											class="ms-2 ps-1">Delete Account</span></a>
								</li>
							</ul>
						</div>
					</div>
					<!-- /.user-data -->
				</div>
			</header>
			<!-- End Header -->

			<h2 class="main-title d-block d-lg-none">Profile</h2>

			<div class="bg-white card-box border-20">
				<div class="user-avatar-setting d-flex align-items-center mb-30">
					<img src="../images/lazy.svg" data-src="images/avatar_02.jpg" alt="" class="lazy-img user-img">
					<div class="upload-btn position-relative tran3s ms-4 me-3">
						Upload new photo
						<input type="file" id="uploadImg" name="uploadImg" placeholder="">
					</div>
					<button class="delete-btn tran3s">Delete</button>
				</div>
				<!-- /.user-avatar-setting -->
				<div class="row">
					<div class="col-12">
						<div class="dash-input-wrapper mb-30">
							<label for="">Username*</label>
							<input type="text" placeholder="JonyRio">
						</div>
						<!-- /.dash-input-wrapper -->
					</div>
					<div class="col-sm-6">
						<div class="dash-input-wrapper mb-30">
							<label for="">First Name*</label>
							<input type="text" placeholder="Mr Johny">
						</div>
						<!-- /.dash-input-wrapper -->
					</div>
					<div class="col-sm-6">
						<div class="dash-input-wrapper mb-30">
							<label for="">Last Name*</label>
							<input type="text" placeholder="Riolek">
						</div>
						<!-- /.dash-input-wrapper -->
					</div>
					<div class="col-sm-6">
						<div class="dash-input-wrapper mb-30">
							<label for="">Email*</label>
							<input type="email" placeholder="companyinc@mail.com">
						</div>
						<!-- /.dash-input-wrapper -->
					</div>

					<div class="col-sm-6">
						<div class="dash-input-wrapper mb-30">
							<label for="">Phone Number*</label>
							<input type="tel" placeholder="+880 01723801729">
						</div>
						<!-- /.dash-input-wrapper -->
					</div>


				</div>


			</div>
			<!-- /.card-box -->

			<div class="bg-white card-box border-20 mt-40">
				<h4 class="dash-title-three">Social Media</h4>

				<div class="dash-input-wrapper mb-20">
					<label for="">Facebook</label>
					<input type="text" placeholder="">
				</div>
				<!-- /.dash-input-wrapper -->


				<div class="dash-input-wrapper mb-20">
					<label for="">Instagram</label>
					<input type="text" placeholder="">
				</div>
				<!-- /.dash-input-wrapper -->

				<div class="dash-input-wrapper mb-20">
					<label for="">Twitter</label>
					<input type="text" placeholder="">
				</div>
				<!-- /.dash-input-wrapper -->

				<div class="dash-input-wrapper mb-20">
					<label for="">Linkedin</label>
					<input type="text" placeholder="">
				</div>
				<!-- /.dash-input-wrapper -->




			</div>
			<!-- /.card-box -->

			<div class="bg-white card-box border-20 mt-40">
				<h4 class="dash-title-three">Address & Location</h4>
				<div class="row">
					<div class="col-12">
						<div class="dash-input-wrapper mb-25">
							<label for="">Address*</label>
							<input type="text" placeholder="19 Yawkey Way">
						</div>
						<!-- /.dash-input-wrapper -->
					</div>

					
					
					<div class="col-lg-3">
						<div class="dash-input-wrapper mb-25">
							<label for="">State*</label>
							<select class="nice-select" id="state-select" onchange="getCities()">
								<option value="0"> Select State </option>
								<option>Gujarat</option>
								<option>Delhi</option>
								<option>Rajasthan</option>
								<option>Maharashtra</option>
								<option>Uttar Pradesh</option>
								<option>West Bengal</option>
								<option>Andhra Pradesh</option>
								<option>Arunachal Pradesh</option>
								<option>Assam</option>
								<option>Bihar</option>
								<option>Chhattisgarh</option>
								<option>Goa</option>
								<option>Haryana</option>
								<option>Himachal Pradesh</option>
								<option>Jharkhand</option>
								<option>Karnataka</option>
								<option>Kerala</option>
								<option>Madhya Pradesh</option>
								<option>Manipur</option>
								<option>Meghalaya</option>
								<option>Mizoram</option>
								<option>Nagaland</option>
								<option>Odisha</option>
								<option>Punjab</option>
								<option>Sikkim</option>
								<option>Tamil Nadu</option>
								<option>Telangana</option>
								<option>Tripura</option>
								<option>Uttarakhand</option>
								<option>Jammu and Kashmir</option>
								<option>Ladakh</option>

							</select>
						</div>
						<!-- /.dash-input-wrapper -->
					</div>

					<div class="col-lg-3">
						<div class="dash-input-wrapper mb-25">
							<label for="">City*</label>
							<select class="nice-select" id="city-select">

								<option> Select City </option>

							</select>
						</div>
						<!-- /.dash-input-wrapper -->
					</div>

					<div class="col-lg-3">
						<div class="dash-input-wrapper mb-25">
							<label for="">Zip Code*</label>
							<input type="text" placeholder="1708">
						</div>
						<!-- /.dash-input-wrapper -->
					</div>
					
					
				</div>
			</div>
			<!-- /.card-box -->

			<div class="button-group d-inline-flex align-items-center mt-30">
				<a href="#" class="dash-btn-two tran3s me-3">Save</a>
				<a href="#" class="dash-cancel-btn tran3s">Cancel</a>
			</div>
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

	<!-- Api Calls For City and State -->
	<script src="../../js/apiCalls.js"></script>



	

</body>

</html>