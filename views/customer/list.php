<?php 
include_once('views/layout/header.php'); ?>
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
if(isset($_COOKIE['editkhtc'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Chỉnh sửa thông tin khách hàng thành công !", "Thông báo :");
	</script>
	<?php

}
if(isset($_COOKIE['deactive'])){ 
	?>
	<script type="text/javascript">
		toastr["error"]("Khách hàng đã bị khóa tài khoản", "Thông báo :");
	</script>
	<?php

}
if(isset($_COOKIE['active'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Tài khoản được phép hoạt động", "Thông báo :");
	</script>
	<?php

}
?>
<div class="container">
	<h2 align="center">DANH SÁCH KHÁCH HÀNG</h2>
	<a href="?mod=customer&act=add" class="btn btn-primary">Thêm mới khách hàng</a>
	<table id="myTable" class="table">
		<thead>
			<tr>
				<th>Mã khách hàng</th>
				<th>Tên khách hàng</th>
				<th>Ảnh</th>
				<th>Số điện thoại</th>
				<th>Trạng thái</th>
				<th>Lựa chọn</th>
			</tr>
		</thead>
		<tbody>
			<?php 

			foreach ($data as $row) {

				?>

				<tr>
					<td><?php  echo strtoupper($row['id']); ?></td>
					<td><?php  echo $row['name']; ?></td>
					<td><img style="width: 60px; height:60px;"  src="public/images/customer/<?php  echo $row['avatar']; ?>" alt=""></td>
					<td><?php  echo ($row['mobile']) ; ?></td>
					<td><?php if ($row['status']==1): ?>
					<a href="?mod=customer&act=deactive&customer_code=<?= $row['id']?>" style="color: green;">Active</a>
					<?php else: ?>
						<a href="?mod=customer&act=active&customer_code=<?= $row['id']?>" style="color: red;">Deactive</a>
						<?php endif ?></td>
						<td>

							<a href="?mod=customer&act=detail&customer_code=<?php echo $row['id']; ?>" class="btn btn-success">Profile</a>  

							<a href="?mod=customer&act=edit&customer_code=<?php echo $row['id']; ?>" class="btn btn-warning">Update</a>  
							<a href="?mod=customer&act=delete&customer_code=<?php echo $row['id']; ?>" class="btn btn-danger delete">Delete</a>

						</td>
					</tr>
				<?php  } ?>
			</tbody>


		</table>

	</div>

	<?php 
	include_once('views/layout/footer.php'); ?>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
	<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		$(document).ready( function () {
			$('#myTable').DataTable();


		} );


	</script>

