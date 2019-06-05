<?php include_once('views/layout_user/header_user.php'); ?>
<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(public/images/product/bam.jpg);">
	<h2 class="l-text2 t-center">
		Cart
	</h2>
</section>
<?php
if(isset($_SESSION['cart'])){
						$product_buy=$_SESSION['cart'];
						
						$tong_tien=0; 
if(isset($_COOKIE['khongtontai'])){
	?>
	<script type="text/javascript">
		toastr["error"]("Trang hiện không tồn tại", "Thông báo :");
	</script>
	<?php
}

if(isset($_COOKIE['huysanpham'])){ 
	?>
	<script type="text/javascript">
		toastr["error"]("Hủy sản phẩm thành công!", "Thông báo :");
	</script>
	<?php

}
if(isset($_COOKIE['soluonglonhon'])){
	?>
	<script type="text/javascript">
		toastr["error"]("Số lượng mua lớn hơn số lượng trong kho !", "Thông báo :");
	</script>
	<?php
}
if(isset($_COOKIE['giamsoluong'])){
	?>
	<script type="text/javascript">
		toastr["error"]("Giảm số lượng mua thành công !", "Thông báo :");
	</script>
	<?php
}


if(isset($_COOKIE['themsanpham'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Thêm sản phẩm mới sản phẩm vào giỏ hàng thành công !", "Thông báo :");
	</script>
	<?php

}
if(isset($_COOKIE['themsoluong'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Thêm số lượng sản phẩm thành công !", "Thông báo :");
	</script>
	<?php

}
if(isset($_COOKIE['guithanhcong'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Gửi email thành công !", "Thông báo :");
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

<section class="cart bgwhite p-t-70 p-b-100">
	<div class="container">
		<div class="container-table-cart pos-relative">
			<div class="wrap-table-shopping-cart bgwhite">
				<table class="table-shopping-cart">
					<tr class="table-head">
						<th class="column-1">Image</th>
						<th class="column-2">Product</th>
						<th class="column-3">Price</th>
						<th class="column-4 p-l-70">Quantity</th>
						<th class="column-5">Total</th>
						<th class="column-6">Unset</th>
					</tr>
					<?php
					
						foreach ($product_buy as  $product) { 
							$tong_tien+=($product['price']-ceil($product['price']*$product['discount']/100))*$product['product_quantity'];
							?>
							<tr class="table-row">
								<td class="column-1">
									<div class="cart-img-product b-rad-4 o-f-hidden">
										<img src="public/images/product/<?php echo $product['image'] ?>" alt="IMG-PRODUCT">
									</div>
								</td>
								<td class="column-2"><?php echo $product['name']; ?></td>
								<td class="column-3"><?php echo number_format($product['price']-ceil($product['price']*$product['discount']/100)) ?>
								<td class="column-4">
									<div class="flex-w bo5 of-hidden w-size17">
										<a href="?mod=sale_online&act=remove_product&product_code=<?php echo $product['id']; ?>" class=" color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-minus"></i>
										</a>

										<input class="size8 m-text18 t-center" type="number" name="num-product1" value="<?php echo $product['product_quantity']; ?>">

										<a href="?mod=sale_online&act=add2cart_online&product_code=<?php echo $product['id']; ?>" class="color1 flex-c-m size7 bg8 eff2">
											<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
										</a>

									</div>
									

								</td>
								<td class="column-5"><?php echo number_format(($product['price']-ceil($product['price']*$product['discount']/100))*$product['product_quantity']) ?></td>
								<td class="column-6"><a style="padding: 1% !important;" href="?mod=sale_online&act=unset_product_online&product_code=<?php echo $product['id']; ?>" class="color1 flex-c-m size7 bg8 eff2 deletecart">Hủy</a></td>
							</tr>
							<?php 
						} ?>
						
					
					</table>
				</div>
			</div>
			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<h5>Tổng tiền thanh toán : <?= number_format($tong_tien) ?></h5>
				<div class="flex-w flex-m w-full-sm">
					

					<div class="size12 trans-0-4 m-t-10 m-b-10 m-r-10">
						<!-- Button -->
						<a href="?mod=sale_online&act=pay_online" style="color: white;" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							<!-- <i class="fas fa-shipping-fast"></i> -->
							Buy Now
						</a>
					</div>
				</div>

				<div class="size10 trans-0-4 m-t-10 m-b-10">
					<!-- Button -->
					<a href="?mod=sale_online&act=delete_cart" style="color: white;" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4 deletecart">
						Delete Cart
					</a>
				</div>
			</div>
		</div>
	</section>
	<?php 
				} ?>
	<?php include_once('views/layout_user/footer_user.php'); ?>
	<script type="text/javascript">
      $(document).ready(function(){


        $('.deletecart').click(function(e){
          e.preventDefault();
          var url = $(this).attr('href');
          console.log(url);
          swal({
            title: "Bạn có muốn xóa không ?",
            text: "Sau khi xóa sẽ không thể khôi phục lại!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.location.href=url;
              swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
              });
            } else {
              swal("Bạn đã hủy chức năng xóa!");
            }
          })
        });
      });
      
    </script>