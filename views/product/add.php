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

<div style="width: 95%;margin:5% auto 5%;">

	<form action="?mod=product&act=store" method="POST" role="form" enctype="multipart/form-data">
		<h3 style="margin:5% auto 5%;" align="center">Thêm mới sản phẩm</h3>
		<div class="row">
			<div class="col-lg-4">
				<div  class="form-group">
					<label for="">Ảnh sản phẩm</label>
					<img style="border: 2px grey solid;" class="img-fluid" id="blah" src="public/images/product/default.jpg">
				</div>
				<div class="form-group">
					<label for="">Chọn file ảnh sản phẩm</label>
					<input  type="file" onchange="readURL(this)"  name="product_image" placeholder="Số lượng mới">
				</div>
			</div>
			<div class="col-lg-8">
				<div class="row">
					<div class="col-lg-8 form-group">
						<label for="">Tên sản phảm</label>
						<input type="text" class="form-control" name="name" placeholder="Tên sản phảm">
					</div>

					<div class="col-lg-8 form-group">
						<label for="">Số lượng nhập</label>
						<input type="number" class="form-control" name="quantity" placeholder="Số lượng">
					</div>
					<div class="col-lg-8 form-group">
						<label for="">Đơn giá</label>
						<input type="number" class="form-control" name="price" placeholder="Đơn giá">
					</div>
					<div class="col-lg-8 form-group">
						<label for="">Giảm giá</label>
						<input type="number" class="form-control" name="discount" placeholder="Giảm giá">
					</div>
					<div class="form-group col-lg-8 ">
						<label for="">Hãng sản phẩm</label>
						<select name='category_id'>
							<?php foreach ($data as $row) {?>
								<option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>


							<?php } ?>
							<option value="default" selected>Chọn loại sản phẩm</option>

						</select>
					</div>
					<div class="col-lg-8 form-group">
						<label for="">Tiều đề</label>
						<input type="text" class="form-control" name="title" placeholder="Giảm giá">
					</div>
					<div class="col-lg-8 form-group">
						<label for="">Nội dung</label>
						<input type="text" class="form-control" name="content" placeholder="Giảm giá">
					</div>
				</div>
				<button type="submit" name="submit" class="btn btn-primary" value="submit">Thêm mới</button>

			</div>

		</div>
	</form>
</div>

<?php 
include_once('views/layout/footer.php'); ?>
<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();

			reader.onload = function (e) {
				$('#blah').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
</script>



