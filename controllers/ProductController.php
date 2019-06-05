<?php  
require_once('models/Product.php');
require_once('models/Category.php');
class ProductController{
	var $model;
	var $model_type;
	function __construct(){
		$this->model= new Product();
		$this->model_type= new Category();
		
	}
	function list(){
		$data= $this->model->All2();
		require_once('views/product/list.php');
	}
	
    function detail(){
        $code= $_GET['product_code'];
        $product= $this->model->find($code);
        echo json_encode($product);
    }
    function add(){
      $data= $this->model_type->All();
      require_once('views/product/add.php');
  }
  function store(){
    $data = $_POST;
		if(isset($_POST['submit'])){ // kiểm tra xem button Submit đã được click hay chưa ? 

        $target_dir = "public/images/product/";  // thư mục chứa file upload

        $target_file = $target_dir . basename($_FILES["product_image"]["name"]); // link sẽ upload file lên
        
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) { // nếu upload file không có lỗi 
        	// echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
            // die($_FILES["image"]["name"]);
            $data['image']=basename($_FILES["product_image"]["name"]);
        } else { // Upload file có lỗi 
        	// echo "Sorry, there was an error uploading your file.";
            $data['image']="imgdefault.jpg";
        }

        if (file_exists($target_file)) {
        	echo "Sorry, file already exists.";
        }
    }
    unset($data['submit']);
    
    
    $status = $this->model->insert($data);
    
    if($status==true){
       setcookie('themnvtc',' thành công', time()+10);
       header("Location: index.php?mod=product&act=list");
   }
   else{
       setcookie('themnvktc','không thành công', time()+10);
       header("Location: index.php?mod=product&act=add");
   }

}
function edit(){
   $data= $this->model_type->All();

   $code= $_GET['product_code'];

   $product= $this->model->find($code);


   require_once('views/product/edit.php');
}
function update(){
    $data= $_POST;
		if(isset($_POST['submit'])){ // kiểm tra xem button Submit đã được click hay chưa ? 

        $target_dir = "public/images/product/";  // thư mục chứa file upload

        $target_file = $target_dir . basename($_FILES["product_image"]["name"]); // link sẽ upload file lên
        
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) { // nếu upload file không có lỗi 
            // echo "The file ". basename( $_FILES["product_image"]["name"]). " has been uploaded.";
        	$data['image']=basename($_FILES["product_image"]["name"]);
        } else { // Upload file có lỗi 
        	$data['image']="imgdefault.jpg";
        }
    }
    unset($data['submit']);
    $status = $this->model->update($data);

    if($status==true){
    	setcookie('editnvtc','không thành công', time()+10);
    	header('location: index.php?mod=product&act=list');
    }
    else{
    	setcookie('khongtontai','không thành công', time()+10);
    	header('location: index.php?mod=product&act=list');

    }
}
function delete(){
	$code=$_GET['product_code'];
	$status= $this->model->delete_process($code);
	if ($status==true) {
		setcookie('xoanv','Không thành công', time()+10);
		echo "ok";
		header('location: index.php?mod=product&act=list');
	}
	else{
		setcookie('khongtontai','không thành công', time()+10);
		echo "Đéo ok";
		header('location: index.php?mod=product&act=list');
	}


}
function hot(){
    $code= $_GET['product_code'];
    $status= $this->model->hot($code);
    if ($status==true) {
        setcookie('hottc','Không thành công', time()+10);
        echo "ok";
        header('location: index.php?mod=product&act=list');
    }
    else{
        setcookie('khongtontai','không thành công', time()+10);
        echo "Đéo ok";
        header('location: index.php?mod=product&act=list');
    }
}
function unhot(){
    $code= $_GET['product_code'];
    $status= $this->model->unhot($code);
    if ($status==true) {
        setcookie('unhottc','Không thành công', time()+10);
        echo "ok";
        header('location: index.php?mod=product&act=list');
    }
    else{
        setcookie('khongtontai','không thành công', time()+10);
        echo "Đéo ok";
        header('location: index.php?mod=product&act=list');
    }
}

}
?>