<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h4 style="text-align: center;">Thông tin hóa đơn</h4>
	<p>Mã hóa đơn: <?php echo $bill['bill_code'];?> <p>Bạn có thể truy cập trang web :http://xuanduong120798.net/Unit09/index.php?mod=user&act=user để kiểm tra trạng thái hóa đơn hiện tạp</p></p>
	<p>Mã khách hàng: <?php echo $customer_mail['id'];?></p>
	<p>Tên khách hàng: <?php echo $customer_mail['name'];?></p>
	<p>Địa chỉ khách hàng: <?php echo $customer_mail['address'];?></p>
	<p>Địa chỉ khách hàng: <?php echo $customer_mail['mobile'];?></p>
	<table  style="text-align: right; margin-top: 5%;" id="myTable" >
		<thead>
			<tr>
				
				<th>Mã sản phẩm</th>
				<th>Tên sản phẩm</th>
				<th>Số lượng mua</th>
				<th>Thời gian bán</th>
				<th>Tổng số tiền</th>
				
			</tr>
		</thead>
		<tbody>
			<?php 

			foreach ($detail_bill as $row) {

				?>

				<tr>
					
					<td><?php  echo $row['product_id']; ?></td>
					<td><?php  echo $row['product_name']; ?></td>
					
					<td><?php  echo $row['quantity_buy']; ?></td>
					
					<td><?php  echo $bill['time_bill'] ; ?></td>
					<td><?php  echo number_format($row['into_money']) ; ?></td>
					
				</tr>
			<?php  } ?>
			<tr align="right" style="line-height: 100px;" height="100px">
				<td colspan="2">Tổng thanh toán: </td>
				<td colspan="3"><?php echo number_format($bill['total_money']); ?></td>
				
			</tr>
			<tr>
				<td colspan="2">Tổng thanh toán bằng chữ: </td>
				<td colspan="3"><?php echo $this->VndText($bill['total_money']); ?></td>
				
			</tr>
			<tr style="text-align: right; line-height: 100px;">
				<td colspan="5">Hà Nội , <?php echo $bill['time_bill'] ?> </td>
				
				
			</tr>
			
			
			
		</tbody>
		

	</table>
</body>
</html>