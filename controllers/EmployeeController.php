<?php 
require_once('models/Employee.php'); 
require_once('models/Customer.php'); 
require_once('models/Product.php'); 
require_once('models/Category.php'); 
require_once('models/Bill.php'); 
require_once('models/DetailBill.php'); 
class EmployeeController{
	var $model;
	var $customer;
	var $product;
	var $category;
	var $bill;
	var $detailbill;
	function __construct(){
		$this->model = new Employee();
		$this->customer = new Customer();
		$this->product = new Product();
		$this->category = new Category();
		$this->bill = new Bill();
		$this->detailbill = new DetailBill();


	}
	function list(){
		$data= $this->model->All();
		require_once('views/employee/list.php');
	}
	function detail(){
		$code= $_GET['employee_code'];
		$employee= $this->model->find($code);
		require_once('views/employee/detail.php');
	}
	function add(){
		require_once('views/employee/add.php');
	}
	function store(){
		$data = $_POST;
		if(isset($_POST['submit'])){ // kiểm tra xem button Submit đã được click hay chưa ? 

        $target_dir = "public/images/employee/";  // thư mục chứa file upload

        $target_file = $target_dir . basename($_FILES["employee_image"]["name"]); // link sẽ upload file lên
        
        if (move_uploaded_file($_FILES["employee_image"]["tmp_name"], $target_file)) { // nếu upload file không có lỗi 
        	// echo "The file ". basename( $_FILES["employee_image"]["name"]). " has been uploaded.";
            // die($_FILES["employee_image"]["name"]);
            $data['avatar']=basename($_FILES["employee_image"]["name"]);
        } else { // Upload file có lỗi 
        	// echo "Sorry, there was an error uploading your file.";
            $data['avatar']="7a32562774204115412fabdd91fd34a6.jpg";
        }

        if (file_exists($target_file)) {
        	echo "Sorry, file already exists.";
        }
    }
    unset($data['submit']);
    $data['password']= md5($_POST['password']);
		$status= $this->model->insert($data);
		if($status==true){
			setcookie('themnvtc',' thành công', time()+10);
			header("location: index.php?mod=employee&act=list");
		}
		else{
			setcookie('themnvktc','không thành công', time()+10);
			header("location: index.php?mod=employee&act=add");
		}
	}
	function edit(){
		$code= $_GET['employee_code'];
		$employee= $this->model->find($code);
		require_once('views/employee/edit.php');
	}
	function modal(){
		$code= $_GET['code'];
		$employee= $this->model->find2($code);
		
		require_once('views/employee/list.php');
	}

	function update(){
		$data= $_POST;
		if(isset($_POST['submit'])){ // kiểm tra xem button Submit đã được click hay chưa ? 

        $target_dir = "public/images/employee/";  // thư mục chứa file upload

        $target_file = $target_dir . basename($_FILES["employee_image"]["name"]); // link sẽ upload file lên
        
        if (move_uploaded_file($_FILES["employee_image"]["tmp_name"], $target_file)) { // nếu upload file không có lỗi 
        	// echo "The file ". basename( $_FILES["employee_image"]["name"]). " has been uploaded.";
            // die($_FILES["employee_image"]["name"]);
            $data['avatar']=basename($_FILES["employee_image"]["name"]);
        } else { // Upload file có lỗi 
        	// echo "Sorry, there was an error uploading your file.";
            $data['avatar']="7a32562774204115412fabdd91fd34a6.jpg";
        }

        if (file_exists($target_file)) {
        	echo "Sorry, file already exists.";
        }
    }
     unset($data['submit']);
     $data['password']= md5($_POST['password']);
		$status= $this->model->update($data);
		if($status==true){
			setcookie('editnvtc','không thành công', time()+10);
			header('location: index.php?mod=employee&act=list');
		}
		else{
			echo "Chưa submit";
			setcookie('khongtontai','không thành công', time()+10);
			header('location: index.php?mod=employee&act=list');
		}

	}
	function delete(){
		$code = $_GET['employee_code'];
		$status = $this->model->delete_process($code);
		if($status==true){
			header('location: index.php?mod=employee&act=list');
			setcookie('xoanv','Không thành công', time()+10);
		}
		else{

			setcookie('khongtontai','Không thành công', time()+10);
			header('location: index.php?mod=employee&act=list');
		}

	}
	function profile(){
		require_once('views/employee/profile.php');
	}
	function statistical(){
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$dem_employee=$this->model->All();
		$dem_customer=$this->customer->All();
		$dem_product=$this->product->All();
		$dem_category=$this->category->All();
		$dem_bill=$this->bill->All();
		$dem=0;
		foreach ($dem_bill as $row) {
			// echo $row['statuss'];
			if ($row['statuss']=='0') {
				$dem++;

			};
		}
		// echo $dem;
		// die;
		// $dem_detailbill=$this->detailbill->All();
		$tonkho=0;
		$hethang=0;

		$saphet=0;
		foreach ($dem_product as  $value) {
			if ($value['quantity']==0) {
			 	$hethang++;
			 } 	
			 else if($value['quantity']<10){
			 	$saphet++;

			 }
			 else if($value['quantity']>20){
			 	$tonkho++;
			 	
			 }
		}
		
		$bill_all = $this->bill->All();
		// 	echo "<pre>";
		//  		print_r($bill_all);
		//  	echo "</pre>";
		// die;
		$doanhthu=0;
		$vondautu=0;
		$loinhuan=0;

		foreach ($bill_all as  $value) {
			if($value['statuss']=='1'){
				$doanhthu+=$value['total_money'];
				
			}
			
		}
		$loinhuan=$doanhthu-$vondautu;
		require_once('views/employee/statistical.php');
	}
	function sendmail_nv(){
		$code=$_GET['employee_code'];
		$employee_email=$this->model->find($code);
		include_once('FormEmail/email.php');
		ob_start();
		require_once('views/mailsinhnhat.php');
		$contents= ob_get_contents();
		ob_clean();
		send_email($employee_email['employee_email'],$employee_email['employee_name'],$contents,'Happy Birthday to you');
		setcookie('guithanhcong','Gui email thanh công',time()+3);
            header('location: ?mod=employee&act=statistical');
	}
	function sendmail_kh(){
		$code=$_GET['customer_code'];
		$customer_code=$this->customer->find($code);
		include_once('FormEmail/email.php');
		ob_start();
		require_once('views/mailsinhnhat.php');
		$contents= ob_get_contents();
		ob_clean();
		send_email($customer_code['customer_email'],$customer_code['customer_name'],$contents,'Happy Birthday to you');
		setcookie('guithanhcong','Gui email thanh công',time()+3);
            header('location: ?mod=employee&act=statistical');
	}
	function update_process(){
		$code=$_GET['bill_code'];
		$data= $this->detailbill->find($code);
		$i=0;

		foreach ($data as $row) {
			echo $i;
			$status=$this->product->reduceQuantity($row['product_code'],$row['quantity_buy']);
		}
		$bill_statuss['statuss']='1';
		$bill_statuss['bill_code']=$code;
		$update=$this->bill->update_online($bill_statuss);
		setcookie('xulythanhcong','Gui email thanh công',time()+3);
		header('location: ?mod=sale&act=bill_list');
	}
	function unset_bill(){
		$code=$_GET['bill_code'];
		$data= $this->detailbill->find($code);
			// echo "<pre>";
		 // 		print_r($data);
		 // 	echo "</pre>";
		 // 	die;
		 // 	$i=1;
		foreach ($data as $row) {
			$status=$this->detailbill->delete_process($code);
			echo $i;
		}
		$status2=$this->bill->delete_process($code);
		setcookie('huydonship','Gui email thanh công',time()+3);
		header('location: ?mod=sale&act=bill_list');
	}
	function thongke(){
		require_once('views/employee/thongke.php');
	}
	function thongke_process(){
		if(isset($_POST['timthongke'])){
			$data =$_POST;
		$bill_thongke=$this->bill->Month($data);
		
		require_once('views/employee/thongke.php');
		}
		else{
			header('location: ?mod=employee&act=thongke');	
		}
		
	}

	function deactive(){
		$code= $_GET['employee_code'];
		$status= $this->model->deactive($code);
		if ($status==true) {
			setcookie('deactive','Không thành công', time()+10);
			echo "ok";
			header('location: index.php?mod=employee&act=list');
		}
		else{
			setcookie('khongtontai','không thành công', time()+10);
			echo "Đéo ok";
			header('location: index.php?mod=employee&act=list');
		}
	}
	function active(){
		$code= $_GET['employee_code'];
		$status= $this->model->active($code);
		if ($status==true) {
			setcookie('active','Không thành công', time()+10);
			echo "ok";
			header('location: index.php?mod=employee&act=list');
		}
		else{
			setcookie('khongtontai','không thành công', time()+10);
			echo "Đéo ok";
			header('location: index.php?mod=employee&act=list');
		}
	}

}
?>