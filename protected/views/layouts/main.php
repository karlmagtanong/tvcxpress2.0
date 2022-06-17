<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>TVCXpress 2.0</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/vendors/core/core.css">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->

	<!-- Layout styles -->
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css">
	<!-- End layout styles -->

	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.png" />

	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/vendors/select2/select2.min.css">
	
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css">


	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-4-autocomplete/dist/bootstrap-4-autocomplete.min.js" crossorigin="anonymous"></script>



</head>

<body>
	<style>
		.btn-primary,
		.wizard>.actions a,
		.wizard>.actions a:active,
		.wizard>.actions a:hover,
		div.tox .tox-button:not(.tox-button--naked):not(.tox-button--secondary),
		.swal2-popup .swal2-actions button.swal2-confirm,
		.fc .fc-button-primary:not(:disabled).fc-button-active,
		.fc .fc-button-primary:not(:disabled):active {
			color: #fff !important;
			background-color: #fb6340 !important;
			border-color: #fb6340 !important;

		}


		.sidebar .sidebar-body .nav.sub-menu .nav-item .nav-link.active {
			color: black !important;
		}

		.sidebar .sidebar-body .nav .nav-item.active .nav-link {
			color: black !important;
		}


		.select2-container--default .select2-selection--single .select2-selection__rendered {
			line-height: 28px !important;
		}








		/* .sidebar .sidebar-body .nav .nav-item.active .nav-link .link-icon {
			fill: rgba(239, 243, 255, 0.5);
			color: orange;
		} */


		.select2-container--default .select2-selection--single {

			border-radius: 0px !important;
		}

		.select2-container .select2-selection--single {

			height: 38px !important;

		}
	</style>


	<?php if (!Yii::app()->user->isGuest) { ?>

		<div class="main-wrapper">

			<!-- partial:partials/_sidebar.html -->
			<nav class="sidebar">
				<div class="sidebar-header">
					<a href="#" class="sidebar-brand">
						<!-- TVCXpress 2.0 -->
					</a>
					<div class="sidebar-toggler not-active">
						<span></span>
						<span></span>
						<span></span>
					</div>
				</div>
				<div class="sidebar-body">
					<ul class="nav">
						<li class="nav-item">
							<a href="dashboard.html" class="nav-link">
								<i class="link-icon" data-feather="tv"></i>
								<span class="link-title">Dashboard</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
								<i class="link-icon" data-feather="mail"></i>
								<span class="link-title">Email</span>
								<i class="link-arrow" data-feather="chevron-down"></i>
							</a>
							<div class="collapse" id="emails">
								<ul class="nav sub-menu">
									<li class="nav-item">
										<a href="../../pages/email/inbox.html" class="nav-link">Inbox</a>
									</li>
									<li class="nav-item">
										<a href="../../pages/email/read.html" class="nav-link">Read</a>
									</li>
									<li class="nav-item">
										<a href="../../pages/email/compose.html" class="nav-link">Compose</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-bs-toggle="collapse" href="#order" role="button" aria-expanded="false" aria-controls="order">
								<i class="link-icon" data-feather="shopping-cart"></i>
								<span class="link-title">Orders</span>
								<i class="link-arrow" data-feather="chevron-down"></i>
							</a>
							<div class="collapse" id="order">
								<ul class="nav sub-menu">
									<li class="nav-item">
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=tvcOrder/create" class="nav-link">Order Form</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=tvcOrder/admin_save" class="nav-link">Saved Orders</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=tvcOrder/admin" class="nav-link">My Orders</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a href="dashboard.html" class="nav-link">
								<i class="link-icon" data-feather="map-pin"></i>
								<span class="link-title">Cost Estimate</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="dashboard.html" class="nav-link">
								<i class="link-icon" data-feather="trending-up"></i>
								<span class="link-title">Traffic Dashboard</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="dashboard.html" class="nav-link">
								<i class="link-icon" data-feather="dollar-sign"></i>
								<span class="link-title">Sales, Billing and Collection</span>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=TvcMgmtRate/admin" class="nav-link">
								<i class="link-icon" data-feather="box"></i>
								<span class="link-title">Rate Configuration</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-bs-toggle="collapse" href="#datamanagement" role="button" aria-expanded="false" aria-controls="datamanagement">
								<i class="link-icon" data-feather="briefcase"></i>
								<span class="link-title">Data Management</span>
								<i class="link-arrow" data-feather="chevron-down"></i>
							</a>
							<div class="collapse" id="datamanagement">
								<ul class="nav sub-menu">

									<li class="nav-item">
										<!-- <?php $controllers = Yii::app()->controller->id.'/'.Yii::app()->controller->action->id; ?> -->
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=tvcMgmtProductCat/admin" class="nav-link " id="test">Product Category</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=tvcMgmtChannel/admin" class="nav-link ">Channels</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=tvcMgmtChannelCluster/admin" class="nav-link ">Channel Cluster</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=tvcMgmtExtraServices/admin" class="nav-link">Non-Transmission</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=TvcMgmtExtraServicesSub/admin" class="nav-link">Non-Transmission (Sub-Cat)</a>
									</li>
									<li class="nav-item">
										<a href="#" class="nav-link">Billing Information</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=TvcMgmtAdvertiser/admin" class="nav-link">Advertiser</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=TvcMgmtAscBrand/admin" class="nav-link">ASC Brand</a>
									</li>
									<li class="nav-item">
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=TvcMgmtProducer/admin" class="nav-link">Producer</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-bs-toggle="collapse" href="#settings" role="button" aria-expanded="false" aria-controls="settings">
								<i class="link-icon" data-feather="user"></i>
								<span class="link-title">System Settings</span>
								<i class="link-arrow" data-feather="chevron-down"></i>
							</a>
							<div class="collapse" id="settings">
								<ul class="nav sub-menu">
									<li class="nav-item">
										<a href="#" class="nav-link">User Management</a>
									</li>
									<li class="nav-item">
										<a href="#" class="nav-link">Roles Management</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-bs-toggle="collapse" href="#reportmgmt" role="button" aria-expanded="false" aria-controls="reportmgmt">
								<i class="link-icon" data-feather="list"></i>
								<span class="link-title">Reports</span>
								<i class="link-arrow" data-feather="chevron-down"></i>
							</a>
							<div class="collapse" id="reportmgmt">
								<ul class="nav sub-menu">
									<li class="nav-item">
										<a href="#" class="nav-link">Report</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</nav>
			<!-- partial -->

			<div class="page-wrapper">

				<!-- partial:partials/_navbar.html -->
				<nav class="navbar">
					<a href="#" class="sidebar-toggler">
						<i data-feather="menu"></i>
					</a>
					<div class="navbar-content">
						<form class="search-form">
							<div class="input-group">
								<div class="input-group-text">
									<i data-feather="search"></i>
								</div>
								<input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
							</div>
						</form>
						<ul class="navbar-nav">
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="flag-icon flag-icon-us mt-1" title="us"></i> <span class="ms-1 me-1 d-none d-md-inline-block">English</span>
								</a>
								<div class="dropdown-menu" aria-labelledby="languageDropdown">
									<a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> <span class="ms-1"> English </span></a>
									<a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i> <span class="ms-1"> French </span></a>
									<a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-de" title="de" id="de"></i> <span class="ms-1"> German </span></a>
									<a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt" title="pt" id="pt"></i> <span class="ms-1"> Portuguese </span></a>
									<a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es" title="es" id="es"></i> <span class="ms-1"> Spanish </span></a>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i data-feather="grid"></i>
								</a>
								<div class="dropdown-menu p-0" aria-labelledby="appsDropdown">
									<div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
										<p class="mb-0 fw-bold">Web Apps</p>
										<a href="javascript:;" class="text-muted">Edit</a>
									</div>
									<div class="row g-0 p-1">
										<div class="col-3 text-center">
											<a href="pages/apps/chat.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="message-square" class="icon-lg mb-1"></i>
												<p class="tx-12">Chat</p>
											</a>
										</div>
										<div class="col-3 text-center">
											<a href="pages/apps/calendar.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="calendar" class="icon-lg mb-1"></i>
												<p class="tx-12">Calendar</p>
											</a>
										</div>
										<div class="col-3 text-center">
											<a href="pages/email/inbox.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="mail" class="icon-lg mb-1"></i>
												<p class="tx-12">Email</p>
											</a>
										</div>
										<div class="col-3 text-center">
											<a href="pages/general/profile.html" class="dropdown-item d-flex flex-column align-items-center justify-content-center wd-70 ht-70"><i data-feather="instagram" class="icon-lg mb-1"></i>
												<p class="tx-12">Profile</p>
											</a>
										</div>
									</div>
									<div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
										<a href="javascript:;">View all</a>
									</div>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i data-feather="mail"></i>
								</a>
								<div class="dropdown-menu p-0" aria-labelledby="messageDropdown">
									<div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
										<p>9 New Messages</p>
										<a href="javascript:;" class="text-muted">Clear all</a>
									</div>
									<div class="p-1">
										<a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
											<div class="me-3">
												<img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
											</div>
											<div class="d-flex justify-content-between flex-grow-1">
												<div class="me-4">
													<p>Leonardo Payne</p>
													<p class="tx-12 text-muted">Project status</p>
												</div>
												<p class="tx-12 text-muted">2 min ago</p>
											</div>
										</a>
										<a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
											<div class="me-3">
												<img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
											</div>
											<div class="d-flex justify-content-between flex-grow-1">
												<div class="me-4">
													<p>Carl Henson</p>
													<p class="tx-12 text-muted">Client meeting</p>
												</div>
												<p class="tx-12 text-muted">30 min ago</p>
											</div>
										</a>
										<a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
											<div class="me-3">
												<img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
											</div>
											<div class="d-flex justify-content-between flex-grow-1">
												<div class="me-4">
													<p>Jensen Combs</p>
													<p class="tx-12 text-muted">Project updates</p>
												</div>
												<p class="tx-12 text-muted">1 hrs ago</p>
											</div>
										</a>
										<a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
											<div class="me-3">
												<img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
											</div>
											<div class="d-flex justify-content-between flex-grow-1">
												<div class="me-4">
													<p>Amiah Burton</p>
													<p class="tx-12 text-muted">Project deatline</p>
												</div>
												<p class="tx-12 text-muted">2 hrs ago</p>
											</div>
										</a>
										<a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
											<div class="me-3">
												<img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
											</div>
											<div class="d-flex justify-content-between flex-grow-1">
												<div class="me-4">
													<p>Yaretzi Mayo</p>
													<p class="tx-12 text-muted">New record</p>
												</div>
												<p class="tx-12 text-muted">5 hrs ago</p>
											</div>
										</a>
									</div>
									<div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
										<a href="javascript:;">View all</a>
									</div>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i data-feather="bell"></i>
									<div class="indicator">
										<div class="circle"></div>
									</div>
								</a>
								<div class="dropdown-menu p-0" aria-labelledby="notificationDropdown">
									<div class="px-3 py-2 d-flex align-items-center justify-content-between border-bottom">
										<p>6 New Notifications</p>
										<a href="javascript:;" class="text-muted">Clear all</a>
									</div>
									<div class="p-1">
										<a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
											<div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
												<i class="icon-sm text-white" data-feather="gift"></i>
											</div>
											<div class="flex-grow-1 me-2">
												<p>New Order Recieved</p>
												<p class="tx-12 text-muted">30 min ago</p>
											</div>
										</a>
										<a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
											<div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
												<i class="icon-sm text-white" data-feather="alert-circle"></i>
											</div>
											<div class="flex-grow-1 me-2">
												<p>Server Limit Reached!</p>
												<p class="tx-12 text-muted">1 hrs ago</p>
											</div>
										</a>
										<a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
											<div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
												<img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="userr">
											</div>
											<div class="flex-grow-1 me-2">
												<p>New customer registered</p>
												<p class="tx-12 text-muted">2 sec ago</p>
											</div>
										</a>
										<a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
											<div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
												<i class="icon-sm text-white" data-feather="layers"></i>
											</div>
											<div class="flex-grow-1 me-2">
												<p>Apps are ready for update</p>
												<p class="tx-12 text-muted">5 hrs ago</p>
											</div>
										</a>
										<a href="javascript:;" class="dropdown-item d-flex align-items-center py-2">
											<div class="wd-30 ht-30 d-flex align-items-center justify-content-center bg-primary rounded-circle me-3">
												<i class="icon-sm text-white" data-feather="download"></i>
											</div>
											<div class="flex-grow-1 me-2">
												<p>Download completed</p>
												<p class="tx-12 text-muted">6 hrs ago</p>
											</div>
										</a>
									</div>
									<div class="px-3 py-2 d-flex align-items-center justify-content-center border-top">
										<a href="javascript:;">View all</a>
									</div>
								</div>
							</li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<img class="wd-30 ht-30 rounded-circle" src="https://via.placeholder.com/30x30" alt="profile">
								</a>
								<div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
									<div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
										<div class="mb-3">
											<img class="wd-80 ht-80 rounded-circle" src="https://via.placeholder.com/80x80" alt="">
										</div>
										<div class="text-center">
											<p class="tx-16 fw-bolder">Amiah Burton</p>
											<p class="tx-12 text-muted">amiahburton@gmail.com</p>
										</div>
									</div>
									<ul class="list-unstyled p-1">
										<li class="dropdown-item py-2">
											<a href="pages/general/profile.html" class="text-body ms-0">
												<i class="me-2 icon-md" data-feather="user"></i>
												<span>Profile</span>
											</a>
										</li>
										<li class="dropdown-item py-2">
											<a href="javascript:;" class="text-body ms-0">
												<i class="me-2 icon-md" data-feather="edit"></i>
												<span>Edit Profile</span>
											</a>
										</li>
										<li class="dropdown-item py-2">
											<a href="javascript:;" class="text-body ms-0">
												<i class="me-2 icon-md" data-feather="repeat"></i>
												<span>Switch User</span>
											</a>
										</li>
										<li class="dropdown-item py-2">
											<a href="javascript:;" class="text-body ms-0">
												<i class="me-2 icon-md" data-feather="log-out"></i>
												<span>Log Out</span>
											</a>
										</li>
									</ul>
								</div>
							</li>
						</ul>
					</div>
				</nav>

				<div class="page-content">
					<?php echo $content; ?>

				</div>


				<!-- partial:partials/_footer.html -->
				<footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between px-4 py-3 border-top small">
					<p class="text-muted mb-1 mb-md-0">Copyright © 2022 <a href="https://www.nobleui.com" target="_blank">NobleUI</a>.</p>
					<p class="text-muted">Handcrafted With <i class="mb-1 text-primary ms-1 icon-sm" data-feather="heart"></i></p>
				</footer>
				<!-- partial -->
			</div>
		</div>


	<?php } else {
    echo $content;
}

    ?>


	<!-- core:js -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/vendors/core/core.js"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/vendors/chartjs/Chart.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/vendors/jquery.flot/jquery.flot.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/vendors/jquery.flot/jquery.flot.resize.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/vendors/apexcharts/apexcharts.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/vendors/inputmask/jquery.inputmask.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/vendors/typeahead.js/typeahead.bundle.min.js"></script>



	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/vendors/feather-icons/feather.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/template.js"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/dashboard-light.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/datepicker.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/timepicker.js"></script>

	<!-- End custom js for this page -->

	<script src="<?php echo Yii::app()->request->baseUrl; ?>/vendors/select2/select2.min.js"></script>

	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/select2.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/vendors/moment/moment.min.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/vendors/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/inputmask.js"></script>
	<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/typeahead.js"></script>

	<script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
	<script>
	
		$(document).on('click', '.nav-link.active', function() {
			$('.nav .nav-item').removeClass('active');
			var $this = $(this);
			if (!$this.hasClass('active')) {
				$this.addClass('active');
			}
			e.preventDefault();

		});
	</script>

</body>

</html>