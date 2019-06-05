<?php require_once('views/layout/header.php'); ?>
<div class="container">
	<form class="form" action="?mod=employee&act=thongke_process" method="POST" role="form" enctype="multipart/form-data">
		<select name="thang">
			<option value="01">Tháng 1</option>
			<option value="02">Tháng 2</option>
			<option value="03">Tháng 3</option>
			<option value="04">Tháng 4</option>
			<option value="05">Tháng 5</option>
			<option value="06">Tháng 6</option>
			<option value="07">Tháng 7</option>
			<option value="08">Tháng 8</option>
			<option value="09">Tháng 9</option>
			<option value="10">Tháng 10</option>
			<option value="11">Tháng 11</option>
			<option value="12">Tháng 12</option>
		</select>
		<select name="nam">
			<option value="2019">Năm 2019</option>
			<option value="2020">Năm 2020</option>
			<option value="2021">Năm 2021</option>
			<option value="2022">Năm 2022</option>
			<option value="2023">Năm 2023</option>
			<option value="2024">Năm 2024</option>
			
		</select>
		<button class="btn btn-success" name="timthongke" type="submit">Kiểm tra</button>
	</form>
</div>
<hr style="width: 80%; margin: 5% auto 5%; border: 1px grey solid;">
<?php 
if(isset($bill_thongke)){


if($bill_thongke!=null){?>
	<div style="margin-bottom: 5%;" class="container">
	<h2 align="center">DANH SÁCH HÓA ĐƠN</h2>
	<table id="myTable" class="table">
		<thead>
			<tr>
				<th>Mã hóa đơn</th>
				<th>Tên khách hàng</th>
				<!-- <th>Tên nhân viên</th> -->
				<th>Tổng số tiền</th>
				<th>Thời gian bán</th>
				<!-- <th>Lựa chọn</th> -->
			</tr>
		</thead>
		<tbody>
			<?php 

			foreach ($bill_thongke as $row) {

				?>

				<tr>
					<td><?php  echo $row['bill_code']; ?></td>
					<td><?php  echo $row['customer_name']; ?></td>
				
					
					<td><?php  echo number_format($row['total_money']) ; ?></td>
					<td><?php  echo $row['time_bill'] ; ?></td>
					<!-- <td>
						<a  href="?mod=sale&act=chitietbill&bill_code=<?php echo $row['bill_code']; ?>" class="btn btn-success " >Detail
						</a>
						<?php if($row['statuss']=='1'){
							echo "&nbsp";
						}
						else{
							?>
							<a href="?mod=employee&act=update_process&bill_code=<?php echo $row['bill_code']; ?>" class="btn-danger btn">Xử lý</a>
							<a href="?mod=employee&act=unset_bill&bill_code=<?php echo $row['bill_code']; ?>" class="btn-dark btn">Hủy đơn</a>
							<?php 
						} ?>
						

					</td> -->
				</tr>
			<?php  } ?>
		</tbody>
		

	</table>

</div>
	<?php  
}else{
	?>
	<div style="text-align: center;" class="container"><h5 style="margin: auto;">Không tìm thấy kết quả</h5></div>
	
	<?php  
}
} ?>

<?php require_once('views/layout/footer.php'); ?>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
		
	} );

</script>