<?php 
include_once('models/Customer.php');
class CustomerController{
	var $model;
	function __construct(){
		$this->model = new Customer();
	}
	function list(){
		$data= $this->model->All();
		require_once('views/customer/list.php');
	}
	function detail(){
		$code= $_GET['customer_code'];
		$customer = $this->model->find($code);
		require_once('views/customer/detail.php');
	}
	function add(){
		require_once('views/customer/add.php');
	}
	function store(){
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
            $data['avatar']="7a32562774204115412fabdd91fd34a6.jpg";
        }

        if (file_exists($target_file)) {
        	echo "Sorry, file already exists.";
        }
    }
    unset($data['submit']);
		$data['password']=md5($_POST['password']);
		unset($data['submit']);
		$status=$this->model->insert($data);
		if($status==true){
			setcookie('themkhtc','Không thành công', time()+10);
			header("location: index.php?mod=customer&act=list");
		}
		else{
			setcookie('themkhktc','không thành công', time()+10);
			header("location: index.php?mod=customer&act=add");

		}
	}
	function edit(){
		$code= $_GET['customer_code'];
		$customer = $this->model->find($code);
		require_once('views/customer/edit.php');
	}
	function update(){
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
            $data['avatar']="7a32562774204115412fabdd91fd34a6.jpg";
        }

        if (file_exists($target_file)) {
        	echo "Sorry, file already exists.";
        }
    }
		$data['password']=md5($_POST['password']);
		unset($data['submit']);
		$status=$this->model->update($data);
		if($status==true){
			setcookie('editkhtc','không thành công', time()+10);
			header('location: index.php?mod=customer&act=list');
		}
		else{
			echo "Chưa submit";
			setcookie('khongtontai','không thành công', time()+10);
			header('location: index.php?mod=customer&act=list');
		}
	}
	function delete(){
		$code=$_GET['customer_code'];
		$status=$this->model->delete_process($code);
		if($status==true){
			header('location: index.php?mod=customer&act=list');
			setcookie('xoakh','Không thành công', time()+10);
		}
		else{

			setcookie('khongtontai','Không thành công', time()+10);
			header('location: index.php?mod=customer&act=list');
		}
	}

	function deactive(){
		$code= $_GET['customer_code'];
		$status= $this->model->deactive($code);
		if ($status==true) {
			setcookie('deactive','Không thành công', time()+10);
			echo "ok";
			header('location: index.php?mod=customer&act=list');
		}
		else{
			setcookie('khongtontai','không thành công', time()+10);
			echo "Đéo ok";
			header('location: index.php?mod=customer&act=list');
		}
	}
	function active(){
		$code= $_GET['customer_code'];
		$status= $this->model->active($code);
		if ($status==true) {
			setcookie('active','Không thành công', time()+10);
			echo "ok";
			header('location: index.php?mod=customer&act=list');
		}
		else{
			setcookie('khongtontai','không thành công', time()+10);
			echo "Đéo ok";
			header('location: index.php?mod=customer&act=list');
		}
	}
}
?>