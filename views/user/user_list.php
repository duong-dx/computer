<?php require_once('views/layout_user/header_user.php'); ?>
<?php if(isset($_COOKIE['khongtontai'])){
	?>
	<script type="text/javascript">
		toastr["error"]("Trang hiện không tồn tại", "Thông báo :");
	</script>
	<?php
}
if(isset($_COOKIE['xoakh'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Xóa nhân viên thành công!", "Thông báo :");
	</script>
	<?php

}
if(isset($_COOKIE['themkhtc'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Thêm mới nhân viên thành công !", "Thông báo :");
	</script>
	<?php

}
if(isset($_COOKIE['themsanpham'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Thêm sản phẩm vào giỏ hàng thành công !", "Thông báo :");
	</script>
	<?php

}
if(isset($_COOKIE['dntc'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Đăng nhập thành công !", "Thông báo :");
	</script>
	<?php

}
if(isset($_COOKIE['huydonhang'])){ 
	?>
	<script type="text/javascript">
		toastr["error"]("Hủy đơn hàng thành công !", "Thông báo :");
	</script>
	<?php

}
?>


<div class="container">
	
	<!-- Slide1 -->
	<section class="slide1">
		<div class="wrap-slick1">
			<div  class="slick1">
				<?php foreach ($slides as $key => $slide): ?>
					
				
				<div  class="item-slick1 item1-slick1" style="background-image: url(public/images/slide/<?php echo $slide['image']; ?>">
					<div  class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
						<span style="color: white;" class="caption1-slide1 m-text1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
							<?php echo $slide['content']; ?>
						</span>

						<h2 style="color: white;" class="caption2-slide1 xl-text1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
							
							<?php echo $slide['title']; ?>
						</h2>

						<div class="wrap-btn-slide1 w-size1 animated visible-false" data-appear="zoomIn">
							<!-- Button -->
							<a href="javascript:;" class="flex-c-m size2 bo-rad-23 s-text2 bgwhite hov1 trans-0-4">
								Shop Now
							</a>
						</div>
					</div>
				</div>

				<?php endforeach ?>

			</div>
		</div>
	</section>
	
	<section class="newproduct bgwhite p-t-45 p-b-105">
		<div class="container">
			<div class="sec-title p-b-60">
				<h3 class="m-text5 t-center">
					Hot product
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<?php 
					foreach ($data as $row) {
						?>
						<div class="item-slick2 p-l-15 p-r-15">
							<!-- Block2 -->
							<div class="block2">
								<div style="height: 300px;" class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
									<img src="public/images/product/<?php  echo $row['image']; ?>" alt="IMG-PRODUCT">

									<div class="block2-overlay trans-0-4">
										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
										</a>

										<div class="block2-btn-addcart w-size1 trans-0-4">
											<!-- Button -->
											<a href="?mod=user&act=detail_product&product_code=<?php echo $row['id']; ?>" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
												Detail
											</a>
										</div>
									</div>
								</div>

								<div style="text-align: center;" class="block2-txt p-t-20">
									<a href="javascript:;" class="block2-name dis-block s-text3 p-b-5">
										<?php  echo $row['name']; ?>
									</a>

									<span class="block2-price m-text6 p-r-5">
										<?php if ($row['discount']==0): ?>
											<?php  echo number_format($row['price']) ; ?>
										<?php else: ?>
											<span ><span style="color: red; text-decoration: line-through"><?php  echo number_format($row['price']) ; ?></span> VNĐ</span>
											<span ><?php  echo number_format($row['price'] - $row['price']*$row['discount']/100) ; ?>VNĐ</span>
										<?php endif ?>
										
									</span>
								</div>
							</div>
						</div>

					<?php  } ?>	

				</div>

			</div>

			
		</div>

	</section>

	<hr style="margin: 5% auto 5%;border:1px grey solid;">
	
	<h3 style="text-align:center;">Sale product </h3>
	<div class="row">
		<div class="col-lg-12 my-3">
			<div class="pull-right">
				<div class="btn-group">
					<button class="btn btn-info" id="list">
						List View
					</button>
					<button class="btn btn-danger" id="grid">
						Grid View
					</button>
				</div>
			</div>
		</div>
	</div> 
	<div id="products" class="row view-group">
		<?php 
		foreach ($sale_product as $row) {
			?>
			<div class="item col-xs-4 col-lg-4">
				<div class="thumbnail card">
					<div style="height: 350px;" class="img-event">
						<img class="group list-group-image img-fluid" src="public/images/product/<?php  echo $row['image']; ?>" alt="" />
					</div>
					<div style="text-align: center;"  class="caption card-body">
						<h4 class="group card-title inner list-group-item-heading">
							<?php  echo $row['name']; ?></h4>
							<p class="group inner list-group-item-text">
								<?php if ($row['discount']==0): ?>
											<?php  echo number_format($row['price']) ; ?>
										<?php else: ?>
											<p ><span style="color: red; text-decoration: line-through"><?php  echo number_format($row['price']) ; ?></span> VNĐ</p>
											<p ><?php  echo number_format($row['price'] - $row['price']*$row['discount']/100) ; ?>VNĐ</p>
										<?php endif ?>
									
								</p>
								<a class="btn btn-success" href="?mod=user&act=detail_product&product_code=<?php echo $row['id']; ?>">
										Detail</a>
							</div>
						</div>
					</div>
				<?php  } ?>	
<?php require_once('views/layout_user/footer_user.php'); ?>

			<script type="text/javascript">
				$(document).ready(function() {
					$('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
					$('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
				});
			</script>


		
	
		