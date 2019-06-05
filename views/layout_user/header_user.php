<?php include_once('models/Category.php'); 
$cate_model= new Category();
$loai=$cate_model->ALL();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Fashe</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="public_user/images/icons/favicon.png"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public_user/vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public_user/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public_user/fonts/themify/themify-icons.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public_user/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public_user/fonts/elegant-font/html-css/style.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public_user/vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public_user/vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public_user/vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public_user/vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public_user/vendor/slick/slick.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public_user/vendor/lightbox2/css/lightbox.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="public_user/css/util.css">
	<link rel="stylesheet" type="text/css" href="public_user/css/main.css">
	<!--===============================================================================================-->
	<script type="text/javascript" src="public_user/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<!-- link nextsilde -->
	<link rel="stylesheet" type="text/css" href="public_user/css/tab.css">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!-- link css dsads -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

	<!-- css weather -->
	<link rel="stylesheet" type="text/css" href="public/css/weather.css">
	<!-- link css datatables -->
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

	<!-- dfghjadsdsadsad -->
	<!-- link css toastr -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<!--  -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- Xem trước ảnh  -->
	<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />

	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
	<!-- hết xem trước ảnh -->
	<link rel="stylesheet" type="text/css" href="public_user/css/DETAILproduct.css">
	<script type="text/javascript" src="public_user/js/detailproduct.js"></script>
	<!-- search -->
	
	<link rel="stylesheet" type="text/css" href="public_user/css/search.css">
	<link rel="stylesheet" type="text/css" href="public_user/css/searchbill.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
	<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
	<!-- profile CSS -->
	<link rel="stylesheet" type="text/css" href="public/css/profile.css">
	<!-- Xem trước ảnh  -->
	<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />

	<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
	<!-- hết xem trước ảnh -->
	<!-- profile customer -->
	<link rel="stylesheet" type="text/css" href="public_user/css/profile.css">
	


	
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<span class="topbar-child1">
					

					<div  id="custom-search-input">
						<form  action="?mod=user&act=search_product" method="POST" role="form" enctype="multipart/form-data">
							<div class="input-group col-md-12">
								
								<input type="text" class="  search-query form-control" name="search" placeholder="Search" />
								<span class="input-group-btn">
									<button  class="btn btn-info" type="submit">
										<span class=" glyphicon glyphicon-search"></span>
									</button>
								</span>
								
							</div>
						</form>
					</div>
					

				</span>

				<div class="topbar-child2">
					<ul class="main_menu">
						<li>
							<?php if (!isset($_SESSION['customer_online'])) {
							?>
							<a href="?mod=user&act=formlogin_online">Đăng nhập</a>
							<?php  
						}
						 ?>
							

						</li>
						<li>
							<?php if (isset($_SESSION['customer_online'])) {
							?>
							<a href="?mod=user&act=logout">Đăng xuất</a>
							<?php  
						}
						 ?>
							
						</li>

					</ul>
					<span class="topbar-email">
						<?php if (isset($_SESSION['customer_online'])) {
							echo $_SESSION['customer_online']['email'];
						}
						 ?>
					</span>

					<div class="topbar-language rs1-select2">

					</div>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="?mod=user&act=user" class="logo">
					<img src="public_user/images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="?mod=user&act=user">Home</a>

							</li>

							<li>
								<a href="javascript:;">Shop</a>
								<ul class="sub_menu">
									<?php foreach ($loai as $row) {
										?>
										<li><a href="?mod=user&act=category&category_code=<?php echo $row['id'] ?>"><?php echo $row['name']; ?></a></li>
									<?php 	# code...
								} ?>


							</ul>
						</li>

						


						<li>
							<a href="javascript:;">Blog</a>
						</li>

						<li>
							<a href="javascript:;">About</a>
						</li>

						<li>
							<div class="container">
								<div class="row">
									<form action="?mod=sale_online&act=bill_status" method="POST" class="form" >
										<div class="input-group">
											<input class="form-control" name="bill_code" type="text" placeholder="Search" aria-label="Search" style="padding-left: 20px; border-radius: 40px;" id="mysearch">
											<div class="input-group-addon" style="margin-left: -50px; z-index: 3; border-radius: 40px; background-color: transparent; border:none;">
												<button class="btn btn-warning btn-sm" name="submit_search" type="submit" style="border-radius: 20px;" id="search-btn"><i class="fa fa-search"></i></button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</li>

					</ul>
				</nav>
			</div>

			<!-- Header Icon -->
			<div class="header-icons">
				<?php if (isset($_SESSION['customer_online'])) {
						?>
						<a href="?mod=sale_online&act=profile_customer" class="header-wrapicon1 dis-block ">

							<img src="public/images/customer/<?php echo $_SESSION['customer_online']['avatar']; ?>" class="header-icon1" alt="ICON">
							
						</a>
						<?php 

					}  
						?>
						

				

				<span class="linedivide1"></span>

				<div class="header-wrapicon2">
					<a href="?mod=sale_online&act=customer_cart">
						<img src="public_user/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti"><?php if (isset($_SESSION['cart'])){
							echo count($_SESSION['cart']);
						} 
						else{
							echo "0";
						} ?>

					</span>
				</a>


			</div>
		</div>
	</div>
</div>

<!-- Header Mobile -->
<div class="wrap_header_mobile">
	<!-- Logo moblie -->
	<a href="index.html" class="logo-mobile">
		<img src="public_user/images/icons/logo.png" alt="IMG-LOGO">
	</a>

	<!-- Button show menu -->
	<div class="btn-show-menu">
		<!-- Header Icon mobile -->
		<div class="header-icons-mobile">
			<a href="#" class="header-wrapicon1 dis-block">
				<img src="public_user/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
			</a>

			<span class="linedivide2"></span>

			<div class="header-wrapicon2">
				<img src="public_user/images/icons/icon-header-02.png" class="header-icon1 js-show-header-dropdown" alt="ICON">
				<span class="header-icons-noti">0</span>

				<!-- Header cart noti -->
				<div class="header-cart header-dropdown">
					<ul class="header-cart-wrapitem">
						<li class="header-cart-item">
							<div class="header-cart-item-img">
								<img src="public_user/images/item-cart-01.jpg" alt="IMG">
							</div>

							<div class="header-cart-item-txt">
								<a href="#" class="header-cart-item-name">
									White Shirt With Pleat Detail Back
								</a>

								<span class="header-cart-item-info">
									1 x $19.00
								</span>
							</div>
						</li>

						<li class="header-cart-item">
							<div class="header-cart-item-img">
								<img src="public_user/images/item-cart-02.jpg" alt="IMG">
							</div>

							<div class="header-cart-item-txt">
								<a href="#" class="header-cart-item-name">
									Converse All Star Hi Black Canvas
								</a>

								<span class="header-cart-item-info">
									1 x $39.00
								</span>
							</div>
						</li>

						<li class="header-cart-item">
							<div class="header-cart-item-img">
								<img src="public_user/images/item-cart-03.jpg" alt="IMG">
							</div>

							<div class="header-cart-item-txt">
								<a href="#" class="header-cart-item-name">
									Nixon Porter Leather Watch In Tan
								</a>

								<span class="header-cart-item-info">
									1 x $17.00
								</span>
							</div>
						</li>
					</ul>

					<div class="header-cart-total">
						Total: $75.00
					</div>

					<div class="header-cart-buttons">
						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								View Cart
							</a>
						</div>

						<div class="header-cart-wrapbtn">
							<!-- Button -->
							<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
								Check Out
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</div>
	</div>
</div>

<!-- Menu Mobile -->
<div class="wrap-side-menu" >
	<nav class="side-menu">
		<ul class="main-menu">
			<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
				<span class="topbar-child1">
					Free shipping for standard order over $100
				</span>
			</li>

			<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
				<div class="topbar-child2-mobile">
					<span class="topbar-email">
						fashe@example.com
					</span>

					<div class="topbar-language rs1-select2">
						<select class="selection-1" name="time">
							<option>USD</option>
							<option>EUR</option>
						</select>
					</div>
				</div>
			</li>

			<li class="item-topbar-mobile p-l-10">
				<div class="topbar-social-mobile">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>
			</li>

			<li class="item-menu-mobile">
				<a href="index.html">Home</a>
				<ul class="sub-menu">
					<li><a href="index.html">Homepage V1</a></li>
					<li><a href="home-02.html">Homepage V2</a></li>
					<li><a href="home-03.html">Homepage V3</a></li>
				</ul>
				<i class="arrow-main-menu fa fa-angle-right" aria-hidden="true"></i>
			</li>

			<li class="item-menu-mobile">
				<a href="product.html">Shop</a>
			</li>

			<li class="item-menu-mobile">
				<a href="product.html">Sale</a>
			</li>

			<li class="item-menu-mobile">
				<a href="cart.html">Features</a>
			</li>

			<li class="item-menu-mobile">
				<a href="blog.html">Blog</a>
			</li>

			<li class="item-menu-mobile">
				<a href="about.html">About</a>
			</li>

			<li class="item-menu-mobile">
				<a href="contact.html">Contact</a>
			</li>
		</ul>
	</nav>
</div>
</header>

