<?php 


require_once('models/Product.php');
require_once('models/Customer.php');
require_once('models/Employee.php');
require_once('models/Bill.php');
require_once('models/DetailBill.php');
 require_once('auth/auth.php');

class SaleOnlineController{
	// var $model;
	var $product;
	var $employee;
	var $customer;
	var $bill_detail;
	var $bill;
   

	function __construct(){
		// $this->model= new Customer();
		$this->product = new Product();
		$this->employee= new Employee();
		$this->customer = new Customer();
		$this->bill_detail = new DetailBill();
		$this->bill = new Bill();
		

	}
	function customer_cart(){

			require_once('views/user/customer_cart.php');
		
	}

	function add2cart_online(){
		
			
			$product_code= $_GET['product_code'];
			$product = $this->product->find($product_code);
			
			if (isset($_SESSION['cart'][$product_code])) {

				if ($_SESSION['cart'][$product_code]['product_quantity']>=$product['quantity']) {
					setcookie('soluonglonhon','Số lượng bạn muốn mua đang lớn hơn số lượng cửa hàng hiện có',time()+10);
					header('location: index.php?mod=user&act=user');
				}
				else{
					$_SESSION['cart'][$product_code]['product_quantity']++;
					setcookie('themsoluong','Thêm số lượng sản phẩm mua thành công',time()+10);
					header('location: index.php?mod=sale_online&act=customer_cart');
				}
			}

			else{

				$product['product_quantity']=1;
				$_SESSION['cart'][$product_code]=$product;
				setcookie('themsanpham','Tạo giỏ hàng thành công!',time()+10);
				header('location: index.php?mod=user&act=user');

			}
		
			

			
		
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
		header('location: index.php?mod=sale_online&act=customer_cart');
	}
	function unset_product_online(){
		$product=$_GET['product_code'];
		unset($_SESSION['cart'][$product]);
		setcookie('huysanpham','Hủy sản phẩm thành công',time()+10);
		header('location: index.php?mod=sale_online&act=customer_cart');

	}
	function delete_cart(){

		unset($_SESSION['cart']);
		unset($_SESSION['customer']);
		setcookie('huydonhang','Hủy đơn hàng thành công',time() +10);
		header('location: index.php?mod=user&act=user');
	}
	function pay_online(){
		$auth_ol = new auth();$auth_ol->check_login_online();
		if(isset($_SESSION['customer_online'])){
			$customer= $_SESSION['customer_online'];
			$employee_code='5';
			$customer =$_SESSION['customer_online'];
			$cart =$_SESSION['cart'];
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
			// echo "<pre>";
		 // 		print_r($cart);
		 // 	echo "</pre>";
		 // 	die;
			$i=0;
			foreach ($cart as $product) {
				$prod['bill_code']=$bill['bill_code'];
				$prod['product_id']=$product['id'];
				$prod['quantity_buy']= $product['product_quantity'];
				$prod['into_money']=$product['product_quantity']*($product['price']-$product['price']*$product['discount']/100);

				$tong_tien+=$prod['into_money'];
				$bill_detail= new DetailBill();
			// echo "<pre>";
			//  		print_r($prod);
			//  echo "</pre>";
				$status2=$bill_detail->create($prod);
				$i++;
			// $status3 = $this->product->reduceQuantity($prod['product_code'],$prod['quantity_buy']);

			}
			echo $i;

			$ubill['bill_code']= $bill['bill_code'];
			$ubill['total_money']=$tong_tien;
			$ubill['statuss']=false;
			$bill_detail= new DetailBill();
			$detail_bill= $bill_detail->find($bill['bill_code']);
			$customer_name =$this->customer->find($bill['customer_code']);

			echo "<pre>";
			print_r($detail_bill);
			echo "</pre>";
			$info="";
			$status4= $dt_bill->update($ubill);
		// $this->send_mail_hoadon();
			echo $status2;
			echo $status4;
		// die;
			$test=$this->send_mail_hoadon($bill['bill_code']);
		// die($test);
			unset($_SESSION['cart']);
		// unset($_SESSION['customer']);

			header('location: ?mod=user&act=user');
		}
		else{
			$this->customer_cart();
		}
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
	function send_mail_hoadon($code){
		// $code=$_GET['bill_code'];
		$bill_detail= new DetailBill();
		$detail_bill= $bill_detail->find($code);
		$dt_bill= new Bill();
		$bill =$dt_bill->find($code);
		$customer_mail=$this->customer->find($bill['customer_id']);
		// $employee_name=$this->employee->find($bill['employee_code']);
		echo "<pre>";
		print_r($bill);
		echo "</pre>";
		include_once('FormEmail/email.php');
		ob_start();
		require_once('views/mailhoadon.php');
		// die;
		$contents= ob_get_contents();
		ob_clean();
		send_email($customer_mail['email'],$customer_mail['name'],$contents,'Thông tin mua hàng');
		setcookie('guithanhcong','Gui email thanh công',time()+3);
	}
	function profile_customer(){
		$auth_ol = new auth();$auth_ol->check_login_online();
		if (isset($_SESSION['customer_online'])) {
			$customer_online =$this->customer->find($_SESSION['customer_online']['id']);
			require_once('views/user/profile_customer.php');
		}
		else{
			header('location: ?mod=user&act=formlogin_online');
		}
		
	}
	function update_profile(){
		$auth_ol = new auth();$auth_ol->check_login_online();
		if (isset($_SESSION['customer_online'])) {
			if (isset($_GET['customer_code'])) {
				$code=$_GET['customer_code'];
				$customer = $this->customer->find($code);

				require_once('views/user/edit.php');
			}
			else{
				header('location: ?mod=sale_online&act=profile_customer');
			}

		}
		else{
			header('location: ?mod=user&act=formlogin_online');
		}
	}
	function update_online(){
		$auth_ol = new auth();$auth_ol->check_login_online();
		$data =$_POST;
		if(isset($_POST['submit'])){ // kiểm tra xem button Submit đã được click hay chưa ? 

        $target_dir = "public/images/customer/";  // thư mục chứa file upload

        $target_file = $target_dir . basename($_FILES["customer_image"]["name"]); // link sẽ upload file lên
        
        if (move_uploaded_file($_FILES["customer_image"]["tmp_name"], $target_file)) { // nếu upload file không có lỗi 
        	// echo "The file ". basename( $_FILES["customer_image"]["name"]). " has been uploaded.";
            // die($_FILES["customer_image"]["name"]);
        	$data['avatar']=basename($_FILES["customer_image"]["name"]);
        } else { // Upload file có lỗi 
        	// echo "Sorry, there was an error uploading your file.";
        	$data['avatar']="imgdefault.jpg";
        }

        if (file_exists($target_file)) {
        	echo "Sorry, file already exists.";
        }
    }
    $data['password']=md5($_POST['password']);
   
    unset($data['submit']);
			// echo "<pre>";
		 // 		print_r($data);
		 // 	echo "</pre>";
		 // 	die;
    $status=$this->customer->update($data);
    if($status==true){
    	setcookie('editkhtc','không thành công', time()+10);
    	header('location: index.php?mod=sale_online&act=profile_customer');
    }
    else{
    	echo "Chưa submit";
    	setcookie('khongtontai','không thành công', time()+10);
    	header('location: index.php?mod=sale_online&act=update_profile');
    }
}
function bill_status(){
	if(isset($_POST['submit_search'])){
	$code=$_POST;
	$bill_stt=$this->bill->find($code['bill_code']);
	$dt_bill=$this->bill_detail->find($bill_stt['bill_code']);
	foreach ($dt_bill as $key => $value) {
		$product_bill= $this->product->find($value['product_id']);

		$dt_bill[$key]['name']=$product_bill['name'];
		$dt_bill[$key]['image']=$product_bill['image'];
		$dt_bill[$key]['price']=$product_bill['price'];
		$dt_bill[$key]['discount']=$product_bill['discount'];

	}
		// echo "<pre>";
	 // 		print_r($bill_stt);
	 // 	echo "</pre>";
	 		// echo "<pre>";
	 	 // 		print_r($dt_bill);
	 	 // 	echo "</pre>";
	 	 // 	die;

	 require_once('views/user/bill_status_online.php');
	 }
	 else{
	 	header('location: ?mod=user&act=user');
	 }
}

} ?>