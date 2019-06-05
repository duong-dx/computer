<?php 
require_once('models/Product.php');
require_once('models/Category.php');
class CategoryController{
	var $model;
	
	function __construct(){
		$this->model= new Category();
		
	}
	function list(){
		$data= $this->model->All();
		require_once('views/category/list.php');
	}
	function detail(){
		$code= $_GET['category_code'];
		$category= $this->model->find($code);
		require_once('views/category/detail.php');
	}
	function add(){
		require_once('views/category/add.php');
	}
	function store(){
		  $data = $_POST;
		
  
    $status = $this->model->insert($data);
    
    if($status==true){
    	setcookie('themnvtc',' thành công', time()+10);
    	header("Location: index.php?mod=category&act=list");
    }
    else{
    	setcookie('themnvktc','không thành công', time()+10);
    	header("Location: index.php?mod=category&act=add");
    }

}
function edit(){
	$code= $_GET['category_code'];

	$category= $this->model->find($code);


	require_once('views/category/edit.php');
}
function update(){
	$data= $_POST;
	
    var_dump($data);

	$status = $this->model->update($data);

	if($status==true){
		setcookie('editnvtc','không thành công', time()+10);
		header('location: index.php?mod=category&act=list');
	}
	else{
		setcookie('khongtontai','không thành công', time()+10);
		header('location: index.php?mod=category&act=list');

	}
}
function delete(){
	$code=$_GET['category_code'];
	$status= $this->model->delete_process($code);
	if ($status==true) {
		setcookie('xoanv','Không thành công', time()+10);
		echo "ok";
		header('location: index.php?mod=category&act=list');
	}
	else{
		setcookie('khongtontai','không thành công', time()+10);
		echo "Đéo ok";
		header('location: index.php?mod=category&act=list');
	}


}

} ?>