<?php 
include_once('views/layout/header.php');

?> 


<div style="width: 95%;margin: 5% auto 5%;">
	<form action="?mod=slide&act=update" method="POST" role="form" enctype="multipart/form-data">
		<h3 style="margin:5% auto 5%;" align="center">Cập nhât thông tin sản phẩm</h3>
		<div class="row">
			<div class="col-lg-4">
				<div class="form-group">
					<label for="">Ảnh sản phẩm</label>
					<img style=" border: 1px grey solid;" class="img-fluid" id="blah" src="public/images/slide/<?php echo $slide['image']; ?>">
				</div>
				<div class="form-group">
					<label for="">Chọn file ảnh mới</label>
					<input  type="file"  onchange="readURL(this)" name="slide_image"  placeholder="Số lượng mới">
				</div>
				
			</div>
			<div class="col-lg-8">
				<div class="row">
					<div class="col-lg-8 form-group">
						<label for="">Id </label>
						<input type="text" class="form-control" name="id" value="<?php echo $code; ?>" placeholder="ID" readonly>
					</div>
					
				<div class="col-lg-8 form-group">
						<label for="">Tiêu đề</label>
						<input type="text" class="form-control" name="title" value="<?php echo $slide['title']; ?>" placeholder="Tiêu đề">
				</div>
				<div class="col-lg-8 form-group">
						<label for="">Nội dung</label>
						<input type="text" class="form-control" name="content" value="<?php echo $slide['content']; ?>" placeholder="Nội dung">
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

