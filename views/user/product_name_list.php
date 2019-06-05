<?php require_once('views/layout_user/header_user.php'); ?>

<div style="margin: 5% auto 5%;" class="container">
				<h2 style="text-align:center;margin: 5% auto 5%;">Kết quả tìm kiếm : <?php echo $name['search'] ?></h2>
				<div class="row">
					<div class="col-md-12">
						<?php 
						foreach ($data as $row) {
							?>
							<div class="col-sm-6 col-md-4">
								<div class="thumbnail" >
									
									<img style="height: 300px;" src="public/images/product/<?php  echo $row['image']; ?>" class="img-responsive">
									<hr style="border:1px grey solid;">
									<div class="caption">
										<div class="row">
											<div class="col-md-6 col-xs-6">
												<h4><?php  echo $row['name']; ?></h4>
											</div>
											<div class="col-md-6 col-xs-6 price">
												<h5>
													<label><?php if ($row['discount']==0): ?>
											<?php  echo number_format($row['price']) ; ?>
										<?php else: ?>
											<span ><span style="color: red; text-decoration: line-through"><?php  echo number_format($row['price']) ; ?></span> VNĐ</span>
											<span ><?php  echo number_format($row['price'] - $row['price']*$row['discount']/100) ; ?>VNĐ</span>
										<?php endif ?></label></h5>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<a href="javascript:;" class="btn btn-primary btn-product"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a> 
												</div>
												<div class="col-md-6">
													<a href="?mod=user&act=detail_product&product_code=<?php echo $row['id']; ?>" class="btn btn-success btn-product"><span class="glyphicon glyphicon-shopping-cart"></span> Detail</a></div>
												</div>

												<p> </p>
											</div>
										</div>
									</div>
								<?php  } ?>	

							</div> 

						</div>
						<!--  -->
					</div>
<?php require_once('views/layout_user/footer_user.php'); ?>