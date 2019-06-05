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
if(isset($_COOKIE['hottc'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Sản phẩm đã ở trạng thái hot !", "Thông báo :");
	</script>
	<?php

}
if(isset($_COOKIE['unhottc'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Sản phẩm đã trở lại trạng thái thường !", "Thông báo :");
	</script>
	<?php

}
?>
<div class="container">
	<h2 align="center">DANH SÁCH SẢN PHẨM</h2>
	<a href="?mod=product&act=add" class="btn btn-primary">Thêm mới sản phẩm</a>
	<table id="myTable" class="table">
		<thead>
			<tr>
				<th>Tên sản phẩm</th>
				<th>Ảnh sản phẩm</th>
				<th>Hot</th>
				<th>Loại sản phẩm</th>
				<th>Số lượng</th>
				<th>Đơn giá</th>
				<th>Lựa chọn</th>
			</tr>
		</thead>
		<tbody>
			<?php 

			foreach ($data as $row) {

				?>

				<tr>
					<td><?php  echo $row['name'];?>
					</td>
					<td><img style="width: 60px;height: 60px; border: 1px grey solid;" src="public/images/product/<?php echo $row['image'] ?>"></td>
					<td><?php if ($row['hot']==1) {
						?>
					 		<a href="?mod=product&act=unhot&product_code=<?= $row['id']?>"><i class="fab fa-hotjar" style="font-size: 30px; color:red;"></i></a>
						<?php  
					 }
					 else{
					 	?>
					 	<a href="?mod=product&act=hot&product_code=<?= $row['id']?>">Không hot</a>
					 	<?php  
					 }
					 ?>
					</td>
					<td><?php  echo $row['category_name'];?></td>
					<td><?php  echo $row['quantity']; ?></td>
					<td><?php  if ($row['discount']==0) {
						echo number_format($row['price']) ; 
					}
					else {
						echo number_format($row['price']-ceil($row['price']*$row['discount']/100));
						?>
						<p style="color: green">Giảm giá: &nbsp<?php echo  $row['discount'] ?>%</p>
						<?php 
					}
					?></td>
					<td>
						<a data-id="<?= $row['id']?>" href="javascript:;" class="btn btn-success btn-detailnv" ><i class="far fa-eye"></i>
						</a>
						<a href="?mod=product&act=edit&product_code=<?= $row['id']?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>  
						<a href="?mod=product&act=delete&product_code=<?php echo $row['id']?>" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></a>

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
					<div style="margin:auto; width: 200px; height:200px;">
					<img id="image_show" style="width: 100%; height:100%; " src="" alt="">
						
					</div>
					<p>Tên sản phẩm : <span id="name_detail"></span></p>
										<p>Tiêu đề : <span id="title_show"></span></p>
					<p>Nội dung : <span id="content_show"></span></p>


				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
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



