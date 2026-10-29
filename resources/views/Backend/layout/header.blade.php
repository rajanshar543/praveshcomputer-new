<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/rocker/demo/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Apr 2025 05:43:31 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('Backend/assets')}}/images/favicon-32x32.png" type="image/png"/>
	<!--plugins-->
	<link href="{{asset('Backend/assets')}}/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="{{asset('Backend/assets')}}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="{{asset('Backend/assets')}}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="{{asset('Backend/assets')}}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
	<!-- loader-->
	<link href="{{asset('Backend/assets')}}/css/pace.min.css" rel="stylesheet"/>
	<script src="{{asset('Backend/assets')}}/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('Backend/assets')}}/css/bootstrap.min.css" rel="stylesheet">
	<link href="{{asset('Backend/assets')}}/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="{{asset('Backend/assets')}}/css/app.css" rel="stylesheet">
	<link href="{{asset('Backend/assets')}}/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('Backend/assets')}}/css/dark-theme.css"/>
	<link rel="stylesheet" href="{{asset('Backend/assets')}}/css/semi-dark.css"/>
	<link rel="stylesheet" href="{{asset('Backend/assets')}}/css/header-colors.css"/>
	<link href="{{asset('Backend/assets')}}/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<title>Admin Dashboard</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{asset('Backend/assets')}}/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">Admin</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
				</div>
			 </div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{ route('dashboard') }}">
						<div class="parent-icon"><i class='bx bx-home-alt'></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					
				</li>
				<li>
					<a href="javascript:;" class="has-arrow">
						<div class="parent-icon"><i class="bx bx-category"></i>
						</div>
						<div class="menu-title">Application</div>
					</a>
					<ul>
						<li> <a href="{{ route('contact.list') }}"><i class='bx bx-radio-circle'></i>Contact Inquiries</a>
						</li>
						<li> <a href="{{ route('complaint.list') }}"><i class='bx bx-radio-circle'></i>Complaint Registers</a>
						</li>
						</li>
					</ul>
				</li>
				 
			</ul>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<header>
			<div class="topbar d-flex align-items-center">
				<nav class="navbar navbar-expand gap-3">
					<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					</div>

					  <div class="search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
					     <a href="avascript:;" class="btn d-flex align-items-center"><i class='bx bx-search'></i>Search</a>
					  </div>

					  <div class="top-menu ms-auto">
						<ul class="navbar-nav align-items-center gap-1">
							<li class="nav-item mobile-search-icon d-flex d-lg-none" data-bs-toggle="modal" data-bs-target="#SearchModal">
								<a class="nav-link" href="avascript:;"><i class='bx bx-search'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-laungauge d-none d-sm-flex">
						
							
							</li>
							<li class="nav-item dark-mode d-none d-sm-flex">
								<a class="nav-link dark-mode-icon" href="javascript:;"><i class='bx bx-moon'></i>
								</a>
							</li>
							<li class="nav-item dropdown dropdown-app">

								<div class="dropdown-menu dropdown-menu-end p-0">
									<div class="app-container p-2 my-2">
									
				
									</div>
								</div>
							</li>

							<li class="nav-item dropdown dropdown-large">
								
								<div class="dropdown-menu dropdown-menu-end">
						
									<div class="header-notifications-list">
										
								
							
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">
											<button class="btn btn-primary w-100">View All Notifications</button>
										</div>
									</a>
								</div>
							</li>
							<li class="nav-item dropdown dropdown-large">
							
								<div class="dropdown-menu dropdown-menu-end">
								
									<div class="header-message-list">
										
									</div>
									<a href="javascript:;">
										<div class="text-center msg-footer">
											<div class="d-flex align-items-center justify-content-between mb-3">
												<h5 class="mb-0">Total</h5>
												<h5 class="mb-0 ms-auto">$489.00</h5>
											</div>
											<button class="btn btn-primary w-100">Checkout</button>
										</div>
									</a>
								</div>
							</li>
						</ul>
					</div>
					<div class="user-box dropdown px-3">
						<a class="d-flex align-items-center nav-link dropdown-toggle gap-3 dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<img src="{{asset('Backend/assets')}}/images/avatars/admin.png" class="user-img" alt="user avatar">
							<div class="user-info">
								<p class="user-name mb-0">Admin</p>
						
							</div>
						</a>
						<ul class="dropdown-menu dropdown-menu-end">
						
							<li><a class="dropdown-item d-flex align-items-center" href="{{route('logout')}}"><i class="bx bx-log-out-circle"></i><span>Logout</span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</header>
		<!--end header -->