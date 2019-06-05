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
		toastr["success"]("Thêm mới slide thành công !", "Thông báo :");
	</script>
	<?php

}
if(isset($_COOKIE['editnvtc'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Chỉnh sửa thông tin thành công !", "Thông báo :");
	</script>
	<?php

}
if(isset($_COOKIE['active'])){ 
	?>
	<script type="text/javascript">
		toastr["error"]("Ảnh không được phép hiện !", "Thông báo :");
	</script>
	<?php

}
if(isset($_COOKIE['deactive'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Ảnh đang được phép hiện !", "Thông báo :");
	</script>
	<?php

}
?>
<div class="container">
	<h2 align="center">DANH SÁCH SẢN PHẨM</h2>
	<a href="?mod=slide&act=add" class="btn btn-primary">Thêm mới sản phẩm</a>
	<table id="myTable" class="table">
		<thead>
			<tr>
				<th>Id</th>
				
				<th>Ảnh </th>
				<th>Trạng thái</th>
				<th>Tiêu đề</th>
				<th>Nội dung</th>
				
				<th>Lựa chọn</th>
			</tr>
		</thead>
		<tbody>
			<?php 

			foreach ($data as $row) {

				?>

				<tr>
					<td><?php  echo $row['id'];?>
					
					<td><img style="width: 100px;height: 60px; border: 1px grey solid;" src="public/images/slide/<?php echo $row['image'] ?>"></td>
					<td><?php if ($row['status']==1) {
						?>
					 		<a style="color: green" href="?mod=slide&act=deactive&slide_code=<?= $row['id']?>">Active</a>
						<?php  
					 }
					 else{
					 	?>
					 	<a style="color: red" href="?mod=slide&act=active&slide_code=<?= $row['id']?>">Deactive</a>
					 	<?php  
					 }
					 ?>
					</td>
					<td><?php  echo $row['title'];?>
					</td>
					<td><?php  echo $row['content'];?>
					</td>
					<td>
						
						<a href="?mod=slide&act=edit&slide_code=<?= $row['id']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>  
						<a href="?mod=product&act=delete&slide_code=<?php echo $row['id']?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></a>

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
		
		$('.btn-detailnv').click(function(){
			//Bật modal
			$('#modal_detailnv').modal('show');
			//Lấy id cần gửi lên server xử lý
			$product_code=$(this).attr("data-id");
			debugger;
			
			$.ajax({
				type: "GET",
				url: "index.php?mod=product&act=detail&product_code="+$product_code,
				dataType:"json",
				success: function(response)
				{
					console.log(response);
					$("#image_show").attr('src','public/images/product/'+response.image);
					$("#name_detail").html(response.name);
					$("#title_show").html(response.title);
					$("#content_show").html(response.content);
					
				

				},
				error: function (xhr, ajaxOptions, thrownError) {

				}
			});
		});
		$('#myTable').DataTable();
		
	} );

</script>



