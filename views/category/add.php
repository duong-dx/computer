<?php 
include_once('views/layout/header.php'); ?>
<!--  -->
	<?php if(isset($_COOKIE['themnvktc'])){
			?>
			<script type="text/javascript">
				toastr["error"]("Thêm mới không thành công !", "Thông báo :");
			</script>
			<?php
		}
		?> 
	<div style="width: 60%;margin: auto;">
		<form action="?mod=category&act=store" method="POST" role="form" >
		<h3 align="center">Thêm mới loại sản phẩm</h3>
		
		<div class="form-group">
			<label for="">Tên loại sản phẩm</label>
			<input type="text" class="form-control" name="name" placeholder="Tên loại sản phẩm">
		</div>
		

		<button type="submit" class="btn btn-primary" value="submit">Thêm mới</button>
	</form>
	</div>
	
<?php 
include_once('views/layout/footer.php'); ?>



