<?php 
include_once('views/layout/header.php'); ?>
<?php if(isset($_COOKIE['huydonship'])){
	?>
	<script type="text/javascript">
		toastr["error"]("Hủy đơn ship thành công", "Thông báo :");
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
if(isset($_COOKIE['xulythanhcong'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Xử lý thành công !", "Thông báo :");
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
	<h2 align="center">DANH SÁCH HÓA ĐƠN</h2>
	<table id="myTable" class="table">
		<thead>
			<tr>
				<th>Mã hóa đơn</th>
				<th>Tên khách hàng</th>
				<!-- <th>Tên nhân viên</th> -->
				<th>Tổng số tiền</th>
				<th>Thời gian bán</th>
				<th>Lựa chọn</th>
			</tr>
		</thead>
		<tbody>
			<?php 

			foreach ($data as $row) {

				?>

				<tr>
					<td><?php  echo $row['bill_code']; ?></td>
					<td><?php  echo $row['customer_name']; ?></td>
				
					
					<td><?php  echo number_format($row['total_money']) ; ?></td>
					<td><?php  echo $row['time_bill'] ; ?></td>
					<td>
						<a  href="?mod=sale&act=chitietbill&bill_code=<?php echo $row['bill_code']; ?>" class="btn btn-success " >Detail
						</a>
						<?php if($row['statuss']=='1'){
							echo "&nbsp";
						}
						else{
							?>
							<a href="?mod=employee&act=update_process&bill_code=<?php echo $row['bill_code']; ?>" class="btn-danger btn">Xử lý</a>
							<a href="?mod=employee&act=unset_bill&bill_code=<?php echo $row['bill_code']; ?>" class="btn-dark btn delete">Hủy đơn</a>
							<?php 
						} ?>
						

					</td>
				</tr>
			<?php  } ?>
		</tbody>
		

	</table>

</div>

<?php include_once('views/layout/footer.php'); ?>
 <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
		
	} );

</script>



