<?php 
include_once('views/layout/header.php'); 
if(isset($_COOKIE['guithanhcong'])){ 
	?>
	<script type="text/javascript">
		toastr["success"]("Gửi lời chúc thành công !", "Thông báo :");
	</script>
	<?php

}
?>
<hr style="border: 1px grey solid; margin:5% auto 5%;width: 80%;">
<section id="what-we-do">
	<div class="container-fluid">
		<h2 class="section-title mb-2 h1">Thống Kê Sơ Bộ</h2>
		<p class="text-center text-muted h5">Nhân viên cần kiểm tra tất cả các thống tin sau khi bắt đầu ngày làm việc </p>
		<div class="row mt-5">
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
				<div style="min-height: 0px !important;" class="card">
					<div class="card-block block-1">
						<h3 class="card-title">Employee :</h3>
						<h6 class="card-text">Number employee :<?php echo count($dem_employee); ?></h6>
						<p class="card-text">
						Click employee management to see details </p>
						<a href="javascript:void();" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4 ">
				<div style="min-height: 0px !important;" class="card">
					<div class="card-block block-2">
						<h3 class="card-title">Customer :</h3>
						<h6 class="card-text">Number customer :<?php echo count($dem_customer); ?></h6>
						<p class="card-text">
						Click customer management to see details </p>
						<a href="javascript:void();" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
				<div style="min-height: 0px !important;" class="card">
					
					<div class="card-block block-6">
						<h3 class="card-title">Product :</h3>
						<h6 class="card-text">Number product :<?php echo count($dem_product); ?></h6>
						<p class="card-text">
						Click product management to see details </p>
						<a href="javascript:void();" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
				<div style="min-height: 0px !important;" class="card">
					<div class="card-block block-4">
						<h3 class="card-title">Categories :</h3>
						<h6 class="card-text">Number categories :<?php echo count($dem_category); ?></h6>
						<p class="card-text">
						Click categories management to see details </p>
						<a href="javascript:void();" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
				<div style="min-height: 0px !important;" class="card">
					<div class="card-block block-5">
						<h3 class="card-title">Bills :</h3>
						<h6 class="card-text">Number bills :<?php echo count($dem_bill); ?></h6>
						<p class="card-text">
						Click bills management to see details </p>
						<a href="javascript:void();" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4">
				<div style="min-height: 0px !important;" class="card">
					<div class="card-block block-3">
						<h3 class="card-title">Ship Bills :</h3>
						<h6 class="card-text">Number Ship Bills :<?php echo $dem; ?></h6>
						<p class="card-text">
						Click detail bills management to see details </p>
						<a href="javascript:void();" title="Read more" class="read-more" >Read more<i class="fa fa-angle-double-right ml-2"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>	
</section>
<hr style="border: 1px grey solid; margin:10% auto 5%;width: 80%;">
<div style="margin-top:  5%; margin-bottom: 5%;" class="container">
	<div class="row">
		<br/>
		<div class="col text-center">
			<h2>Chi tiết số lượng sản phẩm</h2>
			<h4 style="margin-top:  5%; margin-bottom: 5%; color: red;">Nhắc nhở</h4>
			<p>Chọn quản lý sản phẩm để chỉnh sửa</p>
		</div>
		

		
	</div>
	<div class="row text-center">
		<div class="col">
			<div class="counter">
				<h1 style="color: #FF6600;"><i class="fas fa-archive"></i></h1>
				<h2 class="timer count-title count-number" data-to="<?php echo $tonkho; ?>" data-speed="5000"></h2>
				<p style="color: red;"class="count-text ">Hàng tồn kho</p>
			</div>
		</div>
		<div class="col">
			<div class="counter">
				<h1 style="color: #FF6600;"><i class="fas fa-box-open"></i></h1>
				<h2 class="timer count-title count-number" data-to="<?php echo $saphet; ?>" data-speed="5000"></h2>
				<p style="color: red;" class="count-text ">Sắp hết hàng</p>
			</div>
		</div>
		<div class="col">
			
			
			<div class="counter">
				<h1 style="color: #FF6600;"><i class="far fa-bell"></i></h1>
				<h2 class="timer count-title count-number" data-to="<?php echo $hethang; ?>" data-speed="5000"></h2>
				<p style="color: red;" class="count-text ">Hết hàng</p>
			</div>

		</div>
	</div>
</div>

<hr style="border: 1px grey solid; margin:10% auto 5%;width: 80%;">
<div id="home_quicklinks">
	<h3 style="text-align: center; margin-bottom: 10%;">Doanh thu :</h3>
	<a class="quicklink link1" href="javascript:;">
		<span class="ql_caption">
			<span class="outer">
				<span style="color: white;" class="inner">
					<h4>Tổng doanh thu :</h4>
					<h6 class="timer count-title count-number" data-to="<?php echo $doanhthu ?>" data-speed="10000" ></h6>
				</span>
			</span>
		</span>
		<span class="ql_top"></span>
		<span class="ql_bottom"></span>
	</a>

	<a class="quicklink link2" href="javascript:;">
		<span class="ql_caption">
			<span class="outer">
				<span class="inner">
					<h4>Tổng vốn đầu tư :</h4>
					<h6 class="timer count-title count-number" data-to="<?php echo $vondautu ?>" data-speed="10000"></h6>
				</span>
			</span>
		</span>
		<span class="ql_top"></span>
		<span class="ql_bottom"></span>
	</a>

	<a class="quicklink link3" href="javascript:;">
		<span class="ql_caption">
			<span class="outer">
				<span style="color: white;" class="inner">
					<h4>Tổng lợi nhuận :</h4>
					<h6 class="timer count-title count-number" data-to="<?php echo $loinhuan ?>" data-speed="10000"></h6>
				</span>
			</span>
		</span>
		<span class="ql_top"></span>
		<span class="ql_bottom"></span>
	</a>

	<div class="clear"></div>
</div>


<?php 
include_once('views/layout/footer.php'); ?>

<script type="text/javascript">
	(function ($) {
		$.fn.countTo = function (options) {
			options = options || {};

			return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
			increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
			$self = $(this),
			loopCount = 0,
			value = settings.from,
			data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
		};

		$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

	jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
  	formatter: function (value, options) {
  		return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
  	}
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
  	var $this = $(this);
  	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
  	$this.countTo(options);
  }
});
</script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"></script>
<script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready( function () {
		$('#myTable').DataTable();
		$('#myTable2').DataTable();
		
	} );

</script>