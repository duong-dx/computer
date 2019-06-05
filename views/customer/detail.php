<?php 
include_once('views/layout/header.php'); ?>
<div id="decss">
	<div class="container portfolio">
		<div class="row">
			<div class="col-md-12">
				<div class="heading">				
					<img src="https://image.ibb.co/cbCMvA/logo.png" />
				</div>
			</div>	
		</div>
		<div class="bio-info">
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-12">
							<div class="bio-image">
								<img style="width: 300px;height: 300px;" src="public/images/customer/<?php echo $customer['avatar']; ?>" alt="image" />
							</div>			
						</div>
					</div>	
				</div>
				<div class="col-md-6">
					<div  class="bio-content">
						<h3 style="margin-bottom: 8%;"><?php echo $customer['name']; ?></h3>
						<?php if($customer['name']==true){
							?>
							<p>Giới tính : <i class="fas fa-male" style="color:blue; font-size: 30px;"></i></p>
							<?php 
						} 
						else{
							?>
							<p>Giới tính :<i class="fas fa-female" style="color:pink; font-size: 30px;"></i></p>
							<?php 
						}
						?>
						<p style="font-size: 20px !important;">Email : <?php echo $customer['email']; ?></p>
						<p style="font-size: 20px !important;">Address : <?php echo $customer['address']; ?></p>

						<p style="font-size: 20px !important;">Mobile : <?php echo $customer['mobile']; ?></p>
					</div>
				</div>
			</div>	
		</div>
	</div>

</div>
<?php 
include_once('views/layout/footer.php'); ?>