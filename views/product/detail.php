<?php 
include_once('views/layout/header.php'); ?>
	<p>Mã sản phẩm:<?php echo $product['product_code']; ?></p>
	<p>Tên sản phẩm :<?php echo $product['product_name']; ?></p>
	<p>Loại sản phẩm :<?php echo $product['category_code']; ?></p>
	<p>Số lượng sản phẩm :<?php echo $product['product_quantity']; ?></p>
	<p>Đơn giá sản phẩm :<?php echo number_format($product['product_price']); ?></p>
	<img class="img-fluid" src="public/images/product/<?php echo $product['product_image']; ?>">
		
<?php 
include_once('views/layout/footer.php'); ?>
	
