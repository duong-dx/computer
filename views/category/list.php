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
		toastr["success"]("Xóa loại sản phẩm thành công!", "Thông báo :");
	</script>
	<?php

}
if(isset($_COOKIE['themnvtc'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Thêm mới loại sản phẩm thành công !", "Thông báo :");
	</script>
	<?php

}
if(isset($_COOKIE['editnvtc'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Chỉnh sửa thông tin loại sản phẩm thành công !", "Thông báo :");
	</script>
	<?php

}
?>
<div class="container">
	<h2 align="center">DANH SÁCH LOẠI SẢN PHẨM</h2>
	<a href="?mod=category&act=add" class="btn btn-primary">Thêm mới loại sản phẩm</a>
	<table id="myTable" class="table">
		<thead>
			<tr>
				<th>Mã loại sản phẩm</th>
				<th>Tên loại sản phẩm</th>				
				
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
						<a href="?mod=category&act=edit&category_code=<?= $row['id']?>" class="btn btn-warning">Update</a>  
						<a href="?mod=category&act=delete&category_code=<?php echo $row['id']?>" class="btn btn-danger delete">Delete</a>
					</td>
				</tr>
			<?php  } ?>
		</tbody>
		

	</table>

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
<?php include_once('views/layout/footer.php'); ?>

<script type="text/javascript" src="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
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



