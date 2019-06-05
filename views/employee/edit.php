	<?php
	include_once('views/layout/header.php');  ?>
	<hr>
	<div class="container bootstrap snippet">
		<div class="row">
			<div class="col-sm-10"><h3>Edit Employee</h3></div>
			<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>
		</div>
		<div class="row">
			<div style="margin:auto; width: 30%; float: left;"><!--left col-->

				<form class="form" action="?mod=employee&act=update" method="POST" role="form" enctype="multipart/form-data">
					<div class="text-center">
						<img  id="blah" style="border-radius: 50%;" src="public/images/employee/<?php echo $employee['avatar'] ?>" class="avatar img-circle img-thumbnail" alt="avatar">
						<h6>Upload a different photo...</h6>
						<input type="file" onchange="readURL(this)" name="employee_image" class="text-center center-block file-upload">
					</div></hr><br>


					<div class="panel panel-default">
						<div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
						<div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div>
					</div>


					<ul class="list-group">
						<li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
						<li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
						<li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
						<li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
						<li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
					</ul> 

				</div><!--/col-3-->
				<div style="margin:auto; width: 60%; float: right;">

					<div class="tab-content">
						<div class="tab-pane active" id="home">
							<hr>

							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">

										<div class="col-xs-6">
											<label for="">Mã nhân viên </label>
											<input type="text" class="form-control" name="id" value="<?php echo $code;; ?>" placeholder="Tên nhân viên" readonly>
										</div>
									</div>
									<div class="form-group">

										<div class="col-xs-6">
											<label for="">Tên nhân viên mới</label>
											<input type="text" class="form-control" name="name" value="<?php echo $employee['name']; ?>" placeholder="Tên nhân viên">
										</div>
									</div>
								<div class="form-group">

									<div class="col-xs-6">
										<label for="">Gender</label>
										<div class="form-group">
											<input type="radio" name="gender" <?php if($employee['gender']==true)
											echo "checked"; ?> value="1">Nam
											<input type="radio" <?php if($employee['gender']==false)
											echo "checked"; ?> name="gender" value="0">Nữ
										</div>
									</div>
								</div>


									<div class="form-group">
										<div class="col-xs-6">
											<label for="">Địa chỉ mới</label>
											<input type="text" class="form-control" name="address" value="<?php echo $employee['address']; ?>" placeholder="Địa chỉ">
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">

										<div class="col-xs-6">
											<label for="">Email mới</label>
											<input type="email" class="form-control" name="email" value="<?php echo $employee['email']; ?>" placeholder="Địa chỉ email">
										</div>
									</div>
									<div class="form-group">

										<div class="col-xs-6">
											<input type="password" class="form-control" name="password"  placeholder="Mật khẩu khách hàng">
										</div>
									</div>
									<div class="form-group">

										<div class="col-xs-6">
											<label for="">Số điên thoại mới</label>
											<input type="number" class="form-control" name="mobile" value="<?php echo $employee['mobile']; ?>" placeholder="Số điện thoại">
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12">
									<br>
									<button class="btn btn-lg btn-success" name="submit" value="submit" type="submit"><i class="glyphicon glyphicon-ok-sign" ></i> Save</button>
									<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
								</div>
							</div>
						</form>


					</div>

				</div><!--/tab-pane-->
			</div><!--/tab-content-->

		</div><!--/col-9-->
	</div><!--/row-->

	<?php include_once('views/layout/footer.php'); ?>
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
