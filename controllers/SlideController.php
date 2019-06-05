<?php 
require_once('models/Slide.php');


class SlideController
{
var $model;
	var $model_type;
	function __construct(){
		$this->model= new Slide();
		
	}
	function list(){
		$data= $this->model->All();
		require_once('views/slide/list.php');
	}
	
    function detail(){
        $code= $_GET['product_code'];
        $product= $this->model->find($code);
        echo json_encode($product);
    }
    function add(){
     
      require_once('views/slide/add.php');
  }
  function store(){
    $data = $_POST;
		if(isset($_POST['submit'])){ // kiểm tra xem button Submit đã được click hay chưa ? 

        $target_dir = "public/images/slide/";  // thư mục chứa file upload

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
       header("Location: index.php?mod=slide&act=list");
   }
   else{
       setcookie('themnvktc','không thành công', time()+10);
       header("Location: index.php?mod=slide&act=add");
   }

}
function edit(){
 

   $code= $_GET['slide_code'];

   $slide= $this->model->find($code);


   require_once('views/slide/edit.php');
}
function update(){
    $data= $_POST;
		if(isset($_POST['submit'])){ // kiểm tra xem button Submit đã được click hay chưa ? 

        $target_dir = "public/images/slide/";  // thư mục chứa file upload

        $target_file = $target_dir . basename($_FILES["slide_image"]["name"]); // link sẽ upload file lên
        
        if (move_uploaded_file($_FILES["slide_image"]["tmp_name"], $target_file)) { // nếu upload file không có lỗi 
            // echo "The file ". basename( $_FILES["product_image"]["name"]). " has been uploaded.";
        	$data['image']=basename($_FILES["slide_image"]["name"]);
        } else { // Upload file có lỗi 
        	$data['image']="imgdefault.jpg";
        }
    }
    unset($data['submit']);
    $status = $this->model->update($data);

    if($status==true){
    	setcookie('editnvtc','không thành công', time()+10);
    	header('location: index.php?mod=slide&act=list');
    }
    else{
    	setcookie('khongtontai','không thành công', time()+10);
    	header('location: index.php?mod=slide&act=list');

    }
}
function delete(){
	$code=$_GET['slide_code'];
	$status= $this->model->delete_process($code);
	if ($status==true) {
		setcookie('xoanv','Không thành công', time()+10);
		echo "ok";
		header('location: index.php?mod=slide&act=list');
	}
	else{
		setcookie('khongtontai','không thành công', time()+10);
		echo "Đéo ok";
		header('location: index.php?mod=slide&act=list');
	}


}
function deactive(){
    $code= $_GET['slide_code'];
    $status= $this->model->deactive($code);
    if ($status==true) {
        setcookie('active','Không thành công', time()+10);
        echo "ok";
        header('location: index.php?mod=slide&act=list');
    }
    else{
        setcookie('khongtontai','không thành công', time()+10);
        echo "Đéo ok";
        header('location: index.php?mod=slide&act=list');
    }
}
function active(){
    $code= $_GET['slide_code'];
    $status= $this->model->active($code);
    if ($status==true) {
        setcookie('deactive','Không thành công', time()+10);
        echo "ok";
        header('location: index.php?mod=slide&act=list');
    }
    else{
        setcookie('khongtontai','không thành công', time()+10);
        echo "Đéo ok";
        header('location: index.php?mod=slide&act=list');
    }
}

}

 ?>
