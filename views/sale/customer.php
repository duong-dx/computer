<?php 
include_once('views/layout/header.php'); ?>
<?php if(isset($_COOKIE['khongtontai'])){
			?>
			<script type="text/javascript">
				toastr["error"]("Trang hiện không tồn tại", "Thông báo :");
			</script>
			<?php
		}
		if(isset($_COOKIE['xoakh'])){ 
			?>
			<script type="text/javascript">
				toastr["success"]("Xóa nhân viên thành công!", "Thông báo :");
			</script>
			<?php

		}
		if(isset($_COOKIE['themkhtc'])){ 
			?>
			<script type="text/javascript">
				toastr["success"]("Thêm mới nhân viên thành công !", "Thông báo :");
			</script>
			<?php

		}
		if(isset($_COOKIE['editkhtc'])){ 
			?>
			<script type="text/javascript">
				toastr["success"]("Chỉnh sửa thông tin khách hàng thành công !", "Thông báo :");
			</script>
			<?php

		}
		if(isset($_COOKIE['huydonhang'])){ 
			?>
			<script type="text/javascript">
				toastr["error"]("Hủy đơn hàng thành công !", "Thông báo :");
			</script>
			<?php

		}
		?>
		

<div style="width: 90%; margin: auto;" class="container">
	<h2 align="center">DANH SÁCH KHÁCH HÀNG</h2>
	<p style="color: #CC0000;">- Vui lòng chọn khách hàng để tạo hóa đơn :</p>
	<p style="color: #CC0000;">- Nếu không tìm thấy khách hàng bạn có thể chọn thêm mới khách hàng :</p>
	<a href="?mod=customer&act=add" class="btn btn-primary">Thêm mới khách hàng</a>
	<table id="myTable" class="table">
		<thead>
			<tr>
				<th>Mã khách hàng</th>
				<th>Tên khách hàng</th>
				<th>Số điện thoại</th>
				<th>Lựa chọn</th>
			</tr>
		</thead>
		<tbody>
			<?php 

			foreach ($data as $row) {

				?>

				<tr>
					<td><?php  echo strtoupper($row['id']); ?></td>
					<td><?php  echo $row['name']; ?></td>
					<td><?php  echo ($row['mobile']) ; ?></td>
					<td>
						
						<a href="?mod=sale&act=purchase&customer_code=<?php echo $row['id']; ?>" class="btn btn-info">
							Tạo hóa đơn
							<i class="fas fa-shopping-cart"></i>
						</a>  

						

					</td>
				</tr>
			<?php  } ?>
		</tbody>
		

	</table>

</div>
<div class="modal fade" id="modal_detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Thông tin sản phẩm</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="container">
					<p>Mã khách hàng : <span id="id_detail"></span></p>
					<p>Tên khách hàng : <span id="name_detail"></span></p>
					<p>Địa chỉ : <span id="address_detail"></span></p>
					<p>Ngày sinh : <span id="birthday_detail"></span></p>
					<p>Email : <span id="email_detail"></span></p>

				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

			</div>
		</div>
	</div>
</div>
	<?php 
include_once('views/layout/footer.php'); ?>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
		$('.btn_detail').click(function(){
			//Bật modal
			$('#modal_detail').modal('show');
			//Lấy id cần gửi lên server xử lý
			$customer_code=$(this).attr("data-id");
			$.ajax({
            type: "GET",
            url: "customer_info.php?customer_code="+$customer_code,
            dataType:"json",
            data:{
              
            },
            success: function(response)
            {
              
              $("#id_detail").html(response.customer_code);
              $("#name_detail").html(response.customer_name);
              $("#address_detail").html(response.customer_address);
              $("#birthday_detail").html(response.customer_birthday);
              $("#email_detail").html(response.customer_email);

            },
            error: function (xhr, ajaxOptions, thrownError) {
              
            }
        });
		});
		
	} );


</script>

