<?php 
include_once('views/layout/header.php');

?> 


<div style="width: 95%;margin: 5% auto 5%;">
	<form action="?mod=product&act=update" method="POST" role="form" enctype="multipart/form-data">
		<h3 style="margin:5% auto 5%;" align="center">Cập nhât thông tin sản phẩm</h3>
		<div class="row">
			<div class="col-lg-4">
				<div class="form-group">
					<label for="">Ảnh sản phẩm</label>
					<img style=" border: 1px grey solid;" class="img-fluid" id="blah" src="public/images/product/<?php echo $product['image']; ?>">
				</div>
				<div class="form-group">
					<label for="">Chọn file ảnh mới</label>
					<input  type="file"  onchange="readURL(this)" name="product_image" value="<?php echo $product['product_image']; ?>" placeholder="Số lượng mới">
				</div>
				
			</div>
			<div class="col-lg-8">
				<div class="row">
					<div class="col-lg-8 form-group">
						<label for="">Mã sản phẩm </label>
						<input type="text" class="form-control" name="id" value="<?php echo $code; ?>" placeholder="Mã sản phẩm" readonly>
					</div>
					<div class="col-lg-8 form-group">
						<label for="">Tên mới sản phẩm</label>
						<input type="text" class="form-control" name="name" value="<?php echo $product['name']; ?>" placeholder="Tên mới sản phẩm">
					</div>
					<div class="col-lg-8 form-group">
						<label for="">Số lượng mới</label>
						<input type="number" class="form-control" name="quantity" value="<?php echo $product['quantity']; ?>" placeholder="Số lượng mới">
					</div>
					<div class="col-lg-8 form-group">
						<label for="">Đơn giá nhập</label>
						<input type="number" class="form-control" name="price" value="<?php echo $product['price']; ?>" placeholder="Số lượng mới">
					</div>
					<div class="col-lg-8 form-group">
						<label for="">Giảm giá</label>
						<input type="number" class="form-control" name="discount" value="<?php echo $product['discount']; ?>" placeholder="Giảm giá">
					</div>

					<div class="col-lg-8 form-group">
						Hãng sản phẩm :<select name='category_id'>
							<?php foreach ($data as $row) {?>
								<option <?php if($row['id']==$product['category_id']){
									echo "selected";
								} ?> value="<?php echo $row['id'] ?>"  >
								<?php echo $row['name'] ?>

							</option>



						<?php } ?>


					</select>
				</div>
				<div class="col-lg-8 form-group">
						<label for="">Tiêu đề</label>
						<input type="text" class="form-control" name="title" value="<?php echo $product['title']; ?>" placeholder="Tiêu đề">
				</div>
				<div class="col-lg-8 form-group">
						<label for="">Nội dung</label>
						<input type="text" class="form-control" name="content" value="<?php echo $product['content']; ?>" placeholder="Nội dung">
				</div>
			</div>




			<button type="submit" name="submit" value="submit" class="btn btn-primary">Cập nhập</button>
		</div>
	</div>
</form>
</div>

<?php 
include_once('views/layout/footer.php');
?>
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

