<?php require_once('views/layout_user/header_user.php'); ?>
<?php if($bill_stt==null){
	?>
	<div style="font-size: 20px; width: 60%;margin: 5% auto 5%;text-align: center;" class="alert alert-danger">
		<strong>Thông báo!</strong> Mã hóa đơn sai ! vui lòng kiểm tra lại tại email.
	</div>
	<?php 
}
else{
	if ($bill_stt['statuss']=='1') {
		?>

		<div style="font-size: 20px; width: 60%;margin: 5% auto 5%;text-align: center;" class="alert alert-success">
			<strong>Thông báo!</strong> Đơn hàng đã được thanh toán !
		</div>
		<?php  
	}
	else{
		?>
		<div style="font-size: 20px; width: 60%;margin: 5% auto 5%;text-align: center;" class="alert alert-warning">
			<strong>Thông báo!</strong> Đơn hàng đang chờ để xử lý !
		</div>
		<?php 
	}
	?>
	<section class="cart bgwhite p-t-70 p-b-100">
<h3 style="margin:2% auto 2%; text-align: center;">Mã đơn hàng của bạn : <?php echo $bill_stt['bill_code']; ?></h3>
		<div class="container">
			
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1">Image</th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4">Quantity</th>
							<th class="column-5">Total</th>

						</tr>
						<?php
						$tong_tien=0;
						foreach ($dt_bill as  $product) { 
							$tong_tien+=($product['price']-ceil($product['price']*$product['discount']/100))*$product['quantity_buy'];
							?>
							<tr class="table-row">
								<td class="column-1">
									<div class="cart-img-product b-rad-4 o-f-hidden">
										<img src="public/images/product/<?php echo $product['image'] ?>" alt="IMG-PRODUCT">
									</div>
								</td>
								<td class="column-2"><?php echo $product['name']; ?></td>
								<td class="column-3"><?php echo number_format($product['price']-ceil($product['price']*$product['discount']/100)) ?> </td>
								<td class="column-3"><?php echo $product['quantity_buy'];?>
								<td class="column-5"><?php echo number_format(($product['price']-ceil($product['price']*$product['discount']/100))*$product['quantity_buy']) ?></td>
								
							</tr>
							<?php 
						} ?>
						

					</table>
				</div>
			</div>
			<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
				<h5>Tổng tiền thanh toán : <?= number_format($tong_tien) ?></h5>
				
			</div>
		</div>
	</section>
	<?php 
} ?>
<?php require_once('views/layout_user/footer_user.php'); ?>