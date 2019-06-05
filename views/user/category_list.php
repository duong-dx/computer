<?php require_once('views/layout_user/header_user.php'); ?>
<div class="container">
		<h3 style="text-align:center; margin-top: 5%;"><?php echo $category_name['name']; ?> </h3>
		<?php if ($category==null) :
				echo '<h1 style="text-align:center; margin-top: 5%;" >Không có sản phẩm nào</h1>';
			 ?>
			
		<?php else: ?>
		
		<div class="row">
			<div class="col-lg-12 my-3">
				<div class="pull-right">
					<div class="btn-group">
						<button class="btn btn-info" id="list">
							List View
						</button>
						<button class="btn btn-danger" id="grid">
							Grid View
						</button>
					</div>
				</div>
			</div>
		</div> 
		<div id="products" class="row view-group">
			<?php 
			
			foreach ($category as $row) {
				?>
				<div class="item col-xs-4 col-lg-4">
				<div class="thumbnail card">
					<div style="height: 350px;" class="img-event">
						<img class="group list-group-image img-fluid" src="public/images/product/<?php  echo $row['image']; ?>" alt="" />
					</div>
					<div style="text-align: center;"  class="caption card-body">
						<h4 class="group card-title inner list-group-item-heading">
							<?php  echo $row['name']; ?></h4>
							<p class="group inner list-group-item-text">
								<?php if ($row['discount']==0): ?>
											<?php  echo number_format($row['price']) ; ?>
										<?php else: ?>
											<p ><span style="color: red; text-decoration: line-through"><?php  echo number_format($row['price']) ; ?></span> VNĐ</p>
											<p ><?php  echo number_format($row['price'] - $row['price']*$row['discount']/100) ; ?>VNĐ</p>
										<?php endif ?>
									
								</p>
								<a class="btn btn-success" href="?mod=user&act=detail_product&product_code=<?php echo $row['id']; ?>">
										Detail</a>
							</div>
						</div>
					</div>
					<?php  } ?>	

				</div>
				<?php endif ?>
			</div>
<?php require_once('views/layout_user/footer_user.php'); ?>

				<script type="text/javascript">
					$(document).ready(function() {
						$('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
						$('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
					});
				</script>