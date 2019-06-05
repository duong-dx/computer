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
		toastr["success"]("Xóa nhân viên thành công!", "Thông báo :");
	</script>
	<?php

}
if(isset($_COOKIE['themnvtc'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Thêm mới nhân viên thành công !", "Thông báo :");
	</script>
	<?php

}
if(isset($_COOKIE['editnvtc'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Chỉnh sửa thông tin nhân viên thành công !", "Thông báo :");
	</script>
	<?php

}
if(isset($_COOKIE['deactive'])){ 
	?>
	<script type="text/javascript">
		toastr["error"]("Nhân viên đã bị khóa tài khoản", "Thông báo :");
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
	<h2 align="center">DANH SÁCH NHÂN VIÊN</h2>
	<a href="index.php?mod=employee&act=add" class="btn btn-primary">Thêm mới nhân viên</a>
	<table id="myTable" class="table">
		<thead>
			<tr>
				<th>Mã nhân viên</th>
				<th>Tên nhân viên</th>
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
					<td><?php  echo $row['id']; ?></td>
					<td><?php  echo $row['name']; ?></td>
					<td><img  style="width:60px; height:60px;" src="public/images/employee/<?php  echo $row['avatar']; ?>" alt=""></td>
					<td><?php  echo ($row['mobile']) ; ?></td>
					<td><?php if ($row['status']==1): ?>
					<a href="?mod=employee&act=deactive&employee_code=<?= $row['id']?>" style="color: green;">Active</a>
					<?php else: ?>
						<a href="?mod=employee&act=active&employee_code=<?= $row['id']?>" style="color: red;">Deactive</a>
					<?php endif ?></td>
					<td>
						<a href="?mod=employee&act=detail&employee_code=<?= $row['id']?>" class="btn btn-success">Detail</a> 
						<a href="?mod=employee&act=edit&employee_code=<?= $row['id']?>" class="btn btn-warning">Update</a>  
						<a href="?mod=employee&act=delete&employee_code=<?= $row['id']?>" class="btn btn-danger delete">Delete</a>

					</td>
				</tr>
			<?php  } ?>
		</tbody>
		

	</table>

</div>

<?php include_once('views/layout/footer.php'); ?>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
		
	} );

</script>



