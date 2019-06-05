<?php 


require_once('models/Product.php');
require_once('models/Customer.php');
require_once('models/Employee.php');
require_once('models/Bill.php');
require_once('models/DetailBill.php');
class SaleController{
	var $model;
	var $product;
	var $employee;
	var $customer;


	function __construct(){
		$this->model= new Customer();
		$this->product = new Product();
		$this->employee= new Employee();
		$this->customer = new Customer();

	}
	function create_bill(){
		if(isset($_SESSION['customer'])){
			header('location: ?mod=sale&act=sale');
		}
		else{
			$data= $this->model->All();
			require_once('views/sale/customer.php');
		}
		
	}
	function purchase(){
		if(isset($_GET['customer_code'])){
			$code = $_GET['customer_code'];
			$customer = $this->model->find($code);
			$_SESSION['customer'] = $customer;
			header('location: index.php?mod=sale&act=sale');
			
		}
		else{
			header('location: index.php?mod=sale&act=create_bill');
		}
	}
	function sale(){
		if(isset($_SESSION['customer'])){
			$customer= $_SESSION['customer'];
			$data= $this->product->All();
			setcookie('taohoadon','Tạo hóa đơn thành công',time()+10);
			if(isset($_SESSION['cart'])){
				$cart = $_SESSION['cart'];
			}
			require_once('views/sale/bill.php');
		}
		else{
			header('location: index.php?mod=sale&act=create_bill');
		}
	}
	function add2cart(){
		$product_code= $_GET['product_code'];
		$product = $this->product->find($product_code);
		if (isset($_SESSION['cart'][$product_code])) {
			if ($_SESSION['cart'][$product_code]['product_quantity']>=$product['quantity']) {
				setcookie('soluonglonhon','Số lượng bạn muốn mua đang lớn hơn số lượng cửa hàng hiện có',time()+10);
			}
			else{
				$_SESSION['cart'][$product_code]['product_quantity']++;
				setcookie('themsoluong','Thêm số lượng sản phẩm mua thành công',time()+10);
			}
		}

		else{
			
			$product['product_quantity']=1;
			$_SESSION['cart'][$product_code]=$product;

		}
		header('location: index.php?mod=sale&act=sale');
	}
	
	

	function remove_product(){
		$product=$_GET['product_code'];
		if($_SESSION['cart'][$product]['product_quantity']>1){
			$_SESSION['cart'][$product]['product_quantity']--;
			setcookie('giamsoluong','Giảm số lượng mua thành công',time()+10);

		}
		else{
			unset($_SESSION['cart'][$product]);
			setcookie('huysanpham','Hủy sản phẩm thành công',time()+10);
		}
		header('location: index.php?mod=sale&act=sale');
	}
	function unset_product(){
		$product=$_GET['product_code'];
		unset($_SESSION['cart'][$product]);
		setcookie('huysanpham','Hủy sản phẩm thành công',time()+10);
		header('location: index.php?mod=sale&act=sale');

	}
	function delete_cart(){

		unset($_SESSION['cart']);
		unset($_SESSION['customer']);
		setcookie('huydonhang','Hủy đơn hàng thành công',time() +10);
		header('location: index.php?mod=sale&act=create_bill');
	}
	function pay(){

		$employee_code=$_SESSION['employee']['id'];
		$customer =$_SESSION['customer'];
		$cart =$_SESSION['cart'];
		// echo "<pre>";
		// 	print_r($cart);
		// echo "</pre>";
		// die;
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$bill= array();

		$bill['bill_code']= $customer['id'].'_'.$employee_code.'_'.time();
		$bill['customer_id']=$customer['id'];
		$bill['employee_id']=$employee_code;
		$bill['time_bill']= date('Y-m-d H:i:s');

		// Đối tượng bill
		$dt_bill= new Bill();
		$status1=$dt_bill->create($bill);

		$tong_tien =0;
		$tien_goc=0;
		
		foreach ($cart as $product) {
			$prod['bill_code']=$bill['bill_code'];
			$prod['product_id']=$product['id'];
			$prod['quantity_buy']= $product['product_quantity'];
			$prod['into_money']=$product['product_quantity']*($product['price']-$product['price']*$product['discount']/100);
			$tong_tien+=$prod['into_money'];
			$bill_detail= new DetailBill();
			$status2=$bill_detail->create($prod);
			$status3 = $this->product->reduceQuantity($prod['product_id'],$prod['quantity_buy']);

		}

		$ubill['bill_code']= $bill['bill_code'];
		$ubill['total_money']=$tong_tien;
		$ubill['statuss']='1';
		
		echo "<pre>";
		print_r($detail_bill);
		echo "</pre>";
		$info="";
		$status4= $dt_bill->update($ubill);
		
		unset($_SESSION['cart']);
		unset($_SESSION['customer']);
		
		header('location: ?mod=sale&act=chitietbill&bill_code='.$bill['bill_code'].'');
		
	}
	function bill_list(){
		$dt_bill= new Bill();
		$data =$dt_bill->All();
		require_once('views/sale/bill_list.php');
	}
	function chitietbill(){
		$code=$_GET['bill_code'];
		$bill_detail= new DetailBill();
		$detail_bill= $bill_detail->find($code);
		$dt_bill= new Bill();
		$bill =$dt_bill->find($code);
		$customer_name=$this->customer->find($bill['customer_id']);
		$employee_name=$this->employee->find($bill['employee_id']);

		// 	echo "<pre>";
		//   		print_r($customer_name);
		//   	echo "</pre>"; 
		//   	echo "<pre>";
		//   		print_r($employee_name);
		//   	echo "</pre>"; 
		
		// die;

		// echo "<pre>";
		//  		print_r($detail_bill);
		//  	echo "</pre>";
		
		require_once('views/sale/chitietbill.php');

	}
	function VndText($amount)
	{
		if($amount <=0)
		{
			return $textnumber="Tiền phải là số nguyên dương lớn hơn số 0";
		}
		$Text=array("không", "một", "hai", "ba", "bốn", "năm", "sáu", "bảy", "tám", "chín");
		$TextLuythua =array("","nghìn", "triệu", "tỷ", "ngàn tỷ", "triệu tỷ", "tỷ tỷ");
		$textnumber = "";
		$length = strlen($amount);

		for ($i = 0; $i < $length; $i++)
			$unread[$i] = 0;

		for ($i = 0; $i < $length; $i++)
		{               
			$so = substr($amount, $length - $i -1 , 1);                

			if ( ($so == 0) && ($i % 3 == 0) && ($unread[$i] == 0)){
				for ($j = $i+1 ; $j < $length ; $j ++)
				{
					$so1 = substr($amount,$length - $j -1, 1);
					if ($so1 != 0)
						break;
				}                       

				if (intval(($j - $i )/3) > 0){
					for ($k = $i ; $k <intval(($j-$i)/3)*3 + $i; $k++)
						$unread[$k] =1;
				}
			}
		}

		for ($i = 0; $i < $length; $i++)
		{        
			$so = substr($amount,$length - $i -1, 1);       
			if ($unread[$i] ==1)
				continue;

			if ( ($i% 3 == 0) && ($i > 0))
				$textnumber = $TextLuythua[$i/3] ." ". $textnumber;     

			if ($i % 3 == 2 )
				$textnumber = 'trăm ' . $textnumber;

			if ($i % 3 == 1)
				$textnumber = 'mươi ' . $textnumber;


			$textnumber = $Text[$so] ." ". $textnumber;
		}

        //Phai de cac ham replace theo dung thu tu nhu the nay
		$textnumber = str_replace("không mươi", "lẻ", $textnumber);
		$textnumber = str_replace("lẻ không", "", $textnumber);
		$textnumber = str_replace("mươi không", "mươi", $textnumber);
		$textnumber = str_replace("một mươi", "mười", $textnumber);
		$textnumber = str_replace("mươi năm", "mươi lăm", $textnumber);
		$textnumber = str_replace("mươi một", "mươi mốt", $textnumber);
		$textnumber = str_replace("mười năm", "mười lăm", $textnumber);

		return ucfirst($textnumber." đồng chẵn");
	}

} ?>