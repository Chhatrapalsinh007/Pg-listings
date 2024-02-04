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

						<li class="plr"><a href="#" class="d-flex w-100 align-items-center">
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

						<li class="plr"><a href="accept-reject-property.php" class="d-flex w-100 align-items-center">
								<img src="images/icon/icon_7.svg" alt="">
								<span>Approval Requests</span>
							</a></li>


						<li class="plr"><a href="approved-property.php" class="d-flex w-100 align-items-center active">
								<img src="../dashboard/images/icon/icon_right_w.svg" alt="">
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

			<h2 class="main-title d-block d-lg-none">Approve Property</h2>

			<div class="bg-white card-box border-20">
				<h4 class="dash-title-three">Overview</h4>
				<div class="dash-input-wrapper mb-30">
					<label for="">Property Title*</label>
					<input type="text" placeholder="Your Property Name">
				</div>
				<!-- /.dash-input-wrapper -->
				<div class="dash-input-wrapper mb-30">
					<label for="">Description*</label>
					<textarea class="size-lg" placeholder="Write about property..."></textarea>
				</div>
				<!-- /.dash-input-wrapper -->
				<div class="row align-items-end">
					<div class="col-md-6">
						<div class="dash-input-wrapper mb-30">
							<label for="">Category*</label>
							<select class="nice-select">
								<option value="1">Apartments</option>
								<option value="2">Condos</option>
								<option value="3">Houses</option>
								<option value="4">Industrial</option>
								<option value="6">Villas</option>
							</select>
						</div>
						<!-- /.dash-input-wrapper -->
					</div>

					<div class="col-md-6">
						<div class="dash-input-wrapper mb-30">
							<label for="">Price*</label>
							<input type="text" placeholder="Your Price">
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
							<input type="text" placeholder="Ex: 3,210 sqft">
						</div>
						<!-- /.dash-input-wrapper -->
					</div>
					<div class="col-md-6">
						<div class="dash-input-wrapper mb-30">
							<label for="">Bedrooms*</label>
							<select class="nice-select">
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
							<select class="nice-select">
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
							<label for="">Bathrooms*</label>
							<select class="nice-select">
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
							<label for="">Kitchens*</label>
							<select class="nice-select">
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
							<select class="nice-select">
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
							<label for="">Farnichar</label>
							<select class="nice-select">
								<option value="0">Fully Farnished</option>
								<option value="1">Semi Farnished</option>
								<option value="2">Unfarnished</option>
							</select>
						</div>
						<!-- /.dash-input-wrapper -->
					</div>



					<div class="col-md-6">
						<div class="dash-input-wrapper mb-30">
							<label for="">Year Built*</label>
							<input type="text" placeholder="Type Year">
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
					<li>
						<input type="checkbox" name="Amenities" value="01">
						<label>A/C</label>
					</li>

					<li>
						<input type="checkbox" name="Amenities" value="03">
						<label>Geyser</label>
					<li>
						<input type="checkbox" name="Amenities" value="02" placeholder="">
						<label>Parking</label>
					</li>


					<li>
						<input type="checkbox" name="Amenities" value="04">
						<label>Visitor Allowed</label>
					</li>


					<li>
						<input type="checkbox" name="Amenities" value="11">
						<label>Refrigerator</label>
					</li>

					<li>
						<input type="checkbox" name="Amenities" value="13">
						<label>Wifi</label>
					</li>
					<li>
						<input type="checkbox" name="Amenities" value="14">
						<label>TV</label>
					</li>

					<li>
						<input type="checkbox" name="Amenities" value="16">
						<label>Laundry</label>
					</li>

					<li>
						<input type="checkbox" name="Amenities" value="19">
						<label>Elevator</label>
					</li>

					<li>
						<input type="checkbox" name="Amenities" value="20">
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
							<input type="text" placeholder="145/A, Ranchview">
						</div>
						<!-- /.dash-input-wrapper -->
					</div>

					<div class="col-lg-4">
						<div class="dash-input-wrapper mb-25">
							<label for="">City*</label>
							<select class="nice-select">
								<option value="0">Select City</option>

								<option>Ahmedabad</option>
								<option>Surat</option>
								<option>Vadodara</option>
								<option>Bangalore</option>
								<option>Chennai</option>
								<option>Hyderabad</option>
								<option>Kolkata</option>
								<option>Mumbai</option>
								<option>Pune</option>
								<option>Jaipur</option>
								<option>Delhi</option>
								<option>Chandigarh</option>


							</select>
						</div>
						<!-- /.dash-input-wrapper -->
					</div>

					<div class="col-md-6">
						<div class="dash-input-wrapper mb-30">
							<label for="">Pin Code*</label>
							<input type="text" placeholder="Type Pincode">
						</div>
						<!-- /.dash-input-wrapper -->
					</div>




					<div class="col-lg-4">
						<div class="dash-input-wrapper mb-25">
							<label for="">State*</label>
							<select class="nice-select">
								<option value="0">Select State</option>
								<option>Dhaka</option>
								<option>Tokyo</option>
								<option>Delhi</option>
								<option>Shanghai</option>
								<option>Mumbai</option>
								<option>Bangalore</option>
							</select>
						</div>
						<!-- /.dash-input-wrapper -->
					</div>

				</div>
			</div>
			<!-- /.card-box -->
			<div class="button-group d-inline-flex align-items-center mt-30">
				<a href="#" class="dash-btn-two tran3s me-3" style="background-color: green;">Accept </a>
				<a href="#" class="dash-btn-two tran3s me-3" style="background-color: red;">Reject </a>

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

</body>

</html>