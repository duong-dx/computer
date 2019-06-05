
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<!-- css login offline -->
	<link rel="stylesheet" type="text/css" href="public/css/login.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
<script type="text/javascript" src="public_user/vendor/jquery/jquery-3.2.1.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
	<!-- link css toastr -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<!--  -->
	
</head>
<?php
if(isset($_COOKIE['yeucaudn'])){
	?>
	<script type="text/javascript">
		toastr["error"]("Bạn cần đăng nhập để sử dụng dịch vụ", "Thông báo :");
	</script>
	<?php
} 
?>
<body>


	<section class="login-block">
		<?php if (isset($_COOKIE['yeucaudn'])){ ?>
							<div style="text-align: center; width: 40%; margin:1% auto 3%;" class="alert alert-danger">
								<strong>Thông báo!</strong> <p><?php echo $_COOKIE['yeucaudn']; ?></p>
							</div>
							
						<?php  }?>
						<?php if (isset($_COOKIE['dkkhtc'])){ ?>
							<div style="text-align: center; width: 40%; margin:1% auto 3%;" class="alert alert-success">
								<strong>Thông báo!</strong> <p><?php echo $_COOKIE['dkkhtc']; ?></p>
							</div>
							
						<?php  }?>
						<?php if (isset($_COOKIE['themkhktc'])){ ?>
							<div style="text-align: center; width: 40%; margin:1% auto 3%;" class="alert alert-danger">
								<strong>Thông báo!</strong> <p><?php echo $_COOKIE['themkhktc']; ?></p>
							</div>
							
						<?php  }?>
		<div class="container">
			<div class="row">
				<div class="col-md-4 login-sec">
					<h2 class="text-center">Login Now</h2>
					<form action="?mod=user&act=login_customer" method="POST" role="form" enctype="multipart/form-data" class="login-form">
						<div class="form-group">
							<label for="exampleInputEmail1" class="text-uppercase">Username</label>
							<input type="text" name="username" class="form-control" placeholder="">

						</div>
						<div class="form-group">
							<label for="exampleInputPassword1" class="text-uppercase">Password</label>
							<input type="password" name="password" class="form-control" placeholder="">
						</div>

						<?php if (isset($_COOKIE['dnkthanhcong'])){ ?>
							<div style="text-align: center;" class="alert alert-danger">
								<strong>Thông báo!</strong> <p><?php echo $_COOKIE['dnkthanhcong']; ?></p>
							</div>
							
						<?php  }?>
						<?php if (isset($_COOKIE['deactive'])){ ?>
							<div style="text-align: center;" class="alert alert-danger">
								<strong>Thông báo!</strong> <p><?php echo $_COOKIE['deactive']; ?></p>
							</div>
							
						<?php  }?>
						<div class="form-check">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input">
								<small>Remember Me</small>
							</label>
							<button type="submit" class="btn btn-login float-right">Submit</button>
						</div>

					</form>
					<a style="margin:5% auto 1%;" href="?mod=user&act=sign_in">Đăng kí</a>
					<div class="copy-text">Created with <i class="fa fa-heart"></i> by <a href="http://grafreez.com">Grafreez.com</a></div>
				</div>
				<div class="col-md-8 banner-sec">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner" role="listbox">
							<div class="carousel-item active">
								<img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
								<div class="carousel-caption d-none d-md-block">
									<div class="banner-text">
										<h2>This is Heaven</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
									</div>	
								</div>
							</div>
							<div class="carousel-item">
								<img class="d-block img-fluid" src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="First slide">
								<div class="carousel-caption d-none d-md-block">
									<div class="banner-text">
										<h2>This is Heaven</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
									</div>	
								</div>
							</div>
							<div class="carousel-item">
								<img class="d-block img-fluid" src="https://images.pexels.com/photos/872957/pexels-photo-872957.jpeg" alt="First slide">
								<div class="carousel-caption d-none d-md-block">
									<div class="banner-text">
										<h2>This is Heaven</h2>
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
									</div>	
								</div>
							</div>
						</div>	   

					</div>
				</div>
			</div>
		</section>
		<!-- link css toastr -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	</body>
	</html>