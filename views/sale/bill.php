<?php 

include_once('views/layout/header.php'); ?>
<?php if(isset($_COOKIE['khongtontai'])){
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


if(isset($_COOKIE['taohoadon'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Tạo mới hóa đơn thành công !", "Thông báo :");
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

if(isset($_COOKIE['huydonhang'])){ 
	?>
	<script type="text/javascript">
		toastr["error"]("Hủy đơn hàng thành công !", "Thông báo :");
	</script>
	<?php

}
?>
<div class="container">
	<div style="width: 48%; float: left; border: 1px #EEEEEE solid;">
		<div style="background: #EEEEEE; padding-top: 2%;padding-bottom: 2%;"><h5 align="center" ><i class="fas fa-cubes"></i>&nbsp&nbsp&nbspDanh sách sản phẩm :</h5></div>
		<div style="width: 80%; margin: 5% auto 5%;">


			<a style="margin-bottom: 5%;" href="?mod=product&act=add" class="btn btn-primary">Thêm mới sản phẩm</a>

			<table id="myTable" class="table">
				<thead>
					<tr>
						<th>Mã Sản phẩm</th>
						<th>Tên sản phẩm</th>
						<th>Lựa chọn</th>
					</tr>
				</thead>
				<tbody>
					<?php 

					foreach ($data as $row) {

						?>

						<tr>
							<td><?php  echo $row['id']; ?></td>
							<td><?php  echo $row['name']; ?></td>
							

							<td>
								<a href="?mod=sale&act=add2cart&product_code=<?php echo $row['id']; ?>" class="btn btn-info">
									<i class="fas fa-shopping-cart"></i>
								</a> 

							</td>
						</tr>
					<?php  } ?>
				</tbody>


			</table>
		</div>
	</div>
	<div style="width: 50%; float: right;border: 1px #EEEEEE solid;">
		<div style="background: #EEEEEE; padding-top: 2%;padding-bottom: 2%;"><h5 align="center" ><i class="fas fa-shopping-cart"></i>&nbsp&nbsp&nbspHóa đơn khách hàng :</h5></div>
		<div style="width: 90%; margin: 5% auto 5%;">
			<p>Mã khách hàng : <?php  echo $customer['id']; ?></p>
			<p>Tên khách hàng : <?php  echo $customer['name']; ?></p>
			<p>Địa chỉ : <?php  echo $customer['address']; ?></p>
			<p>Số điện thoại liên hệ : <?php  echo $customer['mobile']; ?></p>
			<p>Email : <?php  echo $customer['email']; ?></p>
			<table style="font-size: 15px;" id="myTable22" border="1px">
				<thead>
					<tr>

						<th>Tên sản phẩm</th>
						<th>Số lượng mua</th>
						<th>Đơn giá</th>
						<th>Thành tiền</th>
						<th>Lựa chọn</th>
					</tr>
				</thead>
				<tbody>


					<?php
					if(isset($_SESSION['cart'])){
						$product_buy=$_SESSION['cart'];
						
						$tong_tien=0;
						foreach ($product_buy as  $product) { 
							$tong_tien+=($product['price']-ceil($product['price']*$product['discount']/100))*$product['product_quantity'];
							?>

							
							


							<tr>


								<td><?php echo $product['name'] ?></td>
								<td>
									<?php echo $product['product_quantity'] ?>
									
									

								</td>
								<td><?php echo number_format($product['price']-ceil($product['price']*$product['discount']/100)) ?></td>
								<td align="right">
									<?php echo number_format(($product['price']-ceil($product['price']*$product['discount']/100))*$product['product_quantity']) ?>
								</td>
								<td>
									<a href="?mod=sale&act=add2cart&product_code=<?php echo $product['id']; ?>"  class="btn btn-success">+</a>
									<a href="?mod=sale&act=remove_product&product_code=<?php echo $product['id']; ?>"  class="btn btn-danger">-</a> 
									<a href="?mod=sale&act=unset_product&product_code=<?php echo $product['id']; ?>"  class="btn btn-warning">Hủy</a> 
								</td>

							</tr>

							<?php

						} ?>
						
						
						
						<h5>Tổng tiền thanh toán : <?= number_format($tong_tien) ?></h5>
					</tbody>
					
					
					<?php 
				} ?>
				

			</table>
			
			<a style="margin: 2% auto 2%;" href="?mod=sale&act=pay" class="btn btn-success"><i class="fas fa-money-check-alt">
				
			</i>
		&nbsp&nbspThanh toán</a>
		<a style="margin: 2% auto 2%;" href="?mod=sale&act=delete_cart" class="btn btn-danger"><i class="fas fa-broom"></i>
			
		</i> &nbsp&nbsp
	Hủy Hóa Đơn</a>
</div>
</div>
<div style="clear: both;"></div>

</div>
<div class="modal fade" id="modal_detailnv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Thông tin sản phẩm</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="container">
					<p>Mã sản phẩm : <span id="id_detail"></span></p>
					<p>Tên sản phẩm : <span id="name_detail"></span></p>
					<p>Số lượng : <span id="quantity_detail"></span></p>
					<p>Đơn giá : <span id="price_detail"></span></p>


				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>
<?php include_once('views/layout/footer.php'); 

?>


<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
		$('#myTable22').DataTable();
		$('.btn-detailnv').click(function(){
			//Bật modal
			$('#modal_detailnv').modal('show');
			//Lấy id cần gửi lên server xử lý
			$product_code=$(this).attr("data-id");
			$.ajax({
				type: "GET",
				url: "product_info.php?product_code="+$product_code,
				dataType:"json",
				data:{

				},
				success: function(response)
				{

					$("#id_detail").html(response.product_code);
					$("#name_detail").html(response.product_name);
					$("#quantity_detail").html(response.product_quantity);
					$("#price_detail").html(response.product_price);


				},
				error: function (xhr, ajaxOptions, thrownError) {

				}
			});
		});

	} );

</script>



