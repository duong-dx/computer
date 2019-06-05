<?php 
include_once('views/layout/header.php'); ?>
<?php if(isset($_COOKIE['khongtontai'])){
	?>
	<script type="text/javascript">
		toastr["error"]("Trang hiện không tồn tại", "Thông báo :");
	</script>
	<?php
}
if(isset($_COOKIE['xoanv'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Xóa sản phẩm thành công!", "Thông báo :");
	</script>
	<?php

}
if(isset($_COOKIE['themnvtc'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Thêm mới sản phẩm thành công !", "Thông báo :");
	</script>
	<?php

}
if(isset($_COOKIE['editnvtc'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Chỉnh sửa thông tin sản phẩm thành công !", "Thông báo :");
	</script>
	<?php

}
?>
<div class="container">
	<h3  align="center">Cộng hòa xã hội chủ nghĩa Việt Nam
		</h3>
		<h5 align="center">*** Độc lập - Tự do - Hạnh phúc ***</h5>
		<h6 style="margin: 5%;" align="center">Hóa đơn mua hàng :</h6>
	<h6 style="margin: 5%;" align="center">Công ty thương mai điện tử đa quốc gia
		<p style="color: red;">Fashe</p></h6>

	<h6>Mã hóa đơn : <?php echo $code; ?></h6>
	<h6>Tên khách hàng: <?php echo $customer_name['name']; ?></h6>
	<h6>Địa chỉ khách hàng: <?php echo $customer_name['address']; ?></h6>
	<table  style="text-align: right; margin-top: 5%;" id="myTable" >
		<thead>
			<tr>
				
				<th>Mã sản phẩm</th>
				<th>Tên sản phẩm</th>
				<th>Số lượng mua</th>
				
				<th>Thời gian bán</th>
				<th>Tổng số tiền</th>
				
			</tr>
		</thead>
		<tbody>
			<?php 

			foreach ($detail_bill as $row) {

				?>

				<tr>
					
					<td><?php  echo $row['product_id']; ?></td>
					<td><?php  echo $row['product_name']; ?></td>
					
					<td><?php  echo $row['quantity_buy']; ?></td>
					
					<td><?php echo $bill['time_bill']; ?></td>
					<td><?php  echo number_format( $row['into_money']) ?>VNĐ</td>
					
				</tr>
			<?php  } ?>
			<tr align="right" style="line-height: 100px;" height="100px">
				<td colspan="2">Tổng thanh toán: </td>
				<td colspan="3"><?php echo number_format($bill['total_money']); ?>VNĐ</td>
				
			</tr>
			<tr>
				<td colspan="2">Tổng thanh toán bằng chữ: </td>
				<td colspan="3"><?php echo $this->VndText($bill['total_money']); ?></td>
				
			</tr>
			<tr style="text-align: right; line-height: 100px;">
				<td colspan="5">Hà Nội , <?php echo $bill['time_bill'] ?> </td>
				
				
			</tr>
			
			<tr style="text-align: center; line-height: 100px;" height="100px">
				<td colspan="2">Người mua hàng: </td>
				<td colspan="3">Nhân viên</td>
				
			</tr>
			<tr style="text-align: center; line-height: 100px;" height="100px">
				<td colspan="2"><?php echo $customer_name['name']; ?></td>
				<td colspan="3"><?php echo $employee_name['name']; ?></td>
				
			</tr>
		</tbody>
		

	</table>
	<a style="float: right;" href="#" class="btn-success btn">In hóa đơn</a>

</div>


<?php include_once('views/layout/footer.php'); ?>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
		
	} );

</script>



