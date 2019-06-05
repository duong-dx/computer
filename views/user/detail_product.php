<?php 
require_once('views/layout_user/header_user.php');
?>
<div style="margin-top: 5%;" class="container">    
		<div class="row">
			<div class="col-md-8 mx-auto">				
				<div class="panel panel-default  panel--styled">
					<div class="panel-body">
						<div class="col-md-12 panelTop">	
							<div class="col-md-4">	
								<img class="img-responsive" src="public/images/product/<?php echo $product_detail['image']; ?>" alt="">
							</div>
							<div class="col-md-8">	
								<h2><?php echo $product_detail['name']; ?></h2>
								<p><?php echo $category_name['name']; ?></p>
								<p><?php echo $product_detail['title']; ?></p>
								<p><?php echo $product_detail['content']; ?></p>
							</div>
						</div>
						
						<div class="col-md-12 panelBottom">
							<div class="col-md-4 text-center">
								<a href="?mod=sale_online&act=add2cart_online&product_code=<?php echo $product_detail['id']; ?>" class="btn btn-lg btn-add-to-cart add2cart"><span class="glyphicon glyphicon-shopping-cart"></span>   Add to Cart</a>						
							</div>
							<div >
								<?php if ($product_detail['discount']==0): ?>
									<?php  echo number_format($product_detail['price']) ; ?>
									<?php else: ?>
										<h5>Price : <span class="itemPrice"><span style="color: red; text-decoration: line-through"><?php  echo number_format($product_detail['price']) ; ?></span> VNĐ</span></h5>

										<h5>Sale price : <span class="itemPrice"><?php  echo number_format($product_detail['price'] - $product_detail['price']*$product_detail['discount']/100) ; ?>VNĐ</span>
										<?php endif ?>

									</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
<?php 
require_once('views/layout_user/footer_user.php');
?>
<script type="text/javascript">
      $(document).ready(function(){


        $('.add2cart').click(function(e){
          e.preventDefault();
          var url = $(this).attr('href');
          console.log(url);
          swal({
            title: "Bạn có thêm vào giỏ hàng không ?",
            text: "Thêm vào giỏ hàng!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              window.location.href=url;
              swal("Poof! Your imaginary file has been deleted!", {
                icon: "success",
              });
            } else {
              swal("Bạn đã hủy chọn thêm vào giỏ hàng!");
            }
          })
        });
      });
      
    </script>