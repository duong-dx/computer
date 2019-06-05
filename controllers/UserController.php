<?php 


require_once('models/Product.php');
require_once('models/User.php');
require_once('models/Category.php');
require_once('models/Customer.php');
require_once('models/Slide.php');
class UserController{
	var $model;
	var $categories;
	var $customer;
	var $product;
var $slide;
	function __construct(){
		$this->model= new User();
		$this->categories= new Category();
		$this->customer= new Customer();
		$this->product= new Product();
		$this->slide = new Slide();
		
	}
	function user(){

		
		$data= $this->model->hot_product();
		$slides= $this->slide->All();
		$sale_product = $this->model->sale_Product();

		require_once('views/user/user_list.php');
		
	}
	function category(){
		$code=$_GET['category_code'];
		$category=$this->model->find_category($code);
		$category_name =$this->categories->find($code); 
		require_once('views/user/category_list.php');
	}
	function formlogin_online(){
		if (isset($_SESSION['customer_online'])) {
			header('location: ?mod=user&act=user');

		}
		else{
			require_once('views/user/login_customer.php');
		}
		
	}
	function login_customer(){
			$data= $_POST;
			$result = $this->customer->check($data);	
			if($result!=null){
				if($result['active']===0){
					setcookie('deactive','Tài khoản của bạn đã bị khóa !',time()+10);
					header('location: ?mod=user&act=formlogin_online');
				}
				else{
					$_SESSION['customer_online']=$result;
					$_SESSION['isLogin_customer']=1;
					setcookie('dntc','Đăng nhập thành công!',time()+10);
					header('location: ?mod=user&act=user');
				}
				
			}
			else{
				setcookie('dnkthanhcong','Thông tin tài khoản hoặc mật khẩu không chính xác!',time()+10);
				header('location: ?mod=user&act=formlogin_online');
			}
			
	}
	function logout(){
			session_destroy();
			setcookie('loguout','không thành công', time()+10);
			header('location: ?mod=user&act=user');
		}
	function detail_product(){
		$code=$_GET['product_code'];
		$product_detail=$this->product->find($code);
		$category_name=$this->categories->find($product_detail['category_id']);
			// echo "<pre>";
		 // 		print_r($product_detail);
		 // 	echo "</pre>";
		 // // 	echo "<pre>";
		 // // 		print_r($category_name);
		 // // 	echo "</pre>";
		 // 	die;
		require_once('views/user/detail_product.php');
	}
	function search_product(){
		$name = $_POST;
		$data=$this->product->search_name($name);
		// 	echo "<pre>";
		//  		print_r($name);
		//  	echo "</pre>";
		// die;
		require_once('views/user/product_name_list.php');
	}
	function sign_in(){
		if(isset($_SESSION['customer_online'])){
			header('location: ?mod=user&act=user');
		}
		else{
			require_once('views/user/sign_in.php');
		}
	}
	function sign_in_proces(){
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
    unset($data['submit']);
		$data['password']=md5($_POST['password']);
		unset($data['submit']);

		$status=$this->customer->insert($data);
		
		if($status==true){
			setcookie('dkkhtc','Đăng kí thành công !', time()+10);
			header("location: index.php?mod=user&act=formlogin_online");
		}
		else{
			setcookie('themkhktc','Đăng kí không thành công ', time()+10);
			header("location: index.php?mod=user&act=sign_in");

		}
	}
	

} ?>