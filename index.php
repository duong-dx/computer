<?php 
 require_once('auth/auth.php');




$mod = isset($_GET['mod'])?$_GET['mod']:''; //module
$act = isset($_GET['act'])?$_GET['act']:''; // action
session_start();
$auth = new auth();
switch ($mod) {
	case 'user':
		require_once('controllers/UserController.php');
		$user_controller= new UserController();

		
		switch ($act) {
			case 'user':
				$user_controller->user();
				break;
			case 'detail_product':
				$user_controller->detail_product();
				break;
			case 'category':
				$user_controller->category();
				break;
			// case 'cart_customer'
			case 'formlogin_online':
				$user_controller->formlogin_online();
				break;
			case 'login_customer':
				$user_controller->login_customer();
				break;
			case 'logout':
				$user_controller->logout();
				break;
			case 'search_product':
				$user_controller->search_product();
				break;
			case 'sign_in':
				$user_controller->sign_in();
				break;
			case 'sign_in_proces':
				$user_controller->sign_in_proces();
				break;

			default:
				# code...
				break;	
		}

	break;
	case 'sale_online':
		
		require_once('controllers/SaleOnlineController.php');
		$sale_online_controller= new SaleOnlineController();

		
		switch ($act) {
			case 'profile_customer':
				$sale_online_controller->profile_customer();
				break;
			case 'update_profile':
				$sale_online_controller->update_profile();
				break;
			case 'update_online':
				$sale_online_controller->update_online();
				break;
			case 'customer_cart':
				$sale_online_controller->customer_cart();
				break;
			case 'add2cart_online':
				$sale_online_controller->add2cart_online();
				break;		
			
			case 'remove_product':
				$sale_online_controller->remove_product();
				break;
			case 'unset_product_online':
				$sale_online_controller->unset_product_online();
				break;
			case 'delete_cart':
				$sale_online_controller->delete_cart();
				break;
			
			case 'pay_online':
				$sale_online_controller->pay_online();
				break;
			// case 'bill_list':
			// 	$sale_online_controller->bill_list();
			// 	break;
			// case 'chitietbill':
			// 	$sale_online_controller->chitietbill();
			// 	break;
			case 'bill_status':
				$sale_online_controller->bill_status();
				break;
			
			default:
				# code...
				break;	
		}

	break;
	case 'login':
		require_once('controllers/LoginController.php');
		$login_controller= new LoginController();

		
		switch ($act) {
			case 'formlogin':
				$login_controller->formlogin();
				break;
			case 'login':
				$login_controller->login();
				break;
			case 'logout':
				$login_controller->logout();
				break;
			default:
				# code...
				break;	
		}

	break;
	case 'product':
	$auth->check_login();
		require_once('controllers/ProductController.php');
		$product_controller= new ProductController();

		
		switch ($act) {
			case 'hot':
				$product_controller->hot();
				break;
			case 'unhot':
				$product_controller->unhot();
				break;
			case 'list':
				$product_controller->list();
				break;
			case 'add':
				$product_controller->add();
				break;
			case 'store':
				$product_controller->store();
				break;		
			case 'detail':
				$product_controller->detail();
				break;
			case 'edit':
				$product_controller->edit();
				break;	
			case 'update':
				$product_controller->update();
				break;	
			case 'delete':
				$product_controller->delete();
				break;	
			default:
				# code...
				break;	
		}

	break;
	case 'category':
	$auth->check_login();
		require_once('controllers/CategoryController.php');
		$category_controller= new CategoryController();

		
		switch ($act) {
			case 'list':
				$category_controller->list();
				break;
			case 'add':
				$category_controller->add();
				break;
			case 'store':
				$category_controller->store();
				break;		
			case 'detail':
				$category_controller->detail();
				break;
			case 'edit':
				$category_controller->edit();
				break;	
			case 'update':
				$category_controller->update();
				break;	
			case 'delete':
				$category_controller->delete();
				break;	
			default:
				# code...
				break;	
		}

	break;
	case 'slide':
	$auth->check_login();
		require_once('controllers/SlideController.php');
		$slide_controller= new SlideController();

		
		switch ($act) {
			case 'active':
				$slide_controller->active();
				break;
			case 'deactive':
				$slide_controller->deactive();
				break;
			case 'list':
				$slide_controller->list();
				break;
			case 'add':
				$slide_controller->add();
				break;
			case 'store':
				$slide_controller->store();
				break;		
			case 'detail':
				$slide_controller->detail();
				break;
			case 'edit':
				$slide_controller->edit();
				break;	
			case 'update':
				$slide_controller->update();
				break;	
			case 'delete':
				$slide_controller->delete();
				break;	
			default:
				# code...
				break;	
		}

	break;
	case 'employee':
	$auth->check_login();
		require_once('controllers/EmployeeController.php');
		$employee_controller= new EmployeeController();

		
		switch ($act) {
			case 'deactive':
				$employee_controller->deactive();
				break;
			case 'active':
				$employee_controller->active();
				break;
			case 'list':
				$employee_controller->list();
				break;
			case 'add':
				$employee_controller->add();
				break;
			case 'store':
				$employee_controller->store();
				break;		
			case 'detail':
				$employee_controller->detail();
				break;
			case 'detail2':
				$employee_controller->detail2();
				break;
			case 'edit':
				$employee_controller->edit();
				break;
			case 'update':
				$employee_controller->update();
				break;
			case 'delete':
				$employee_controller->delete();
				break;
			case 'modal':
				$employee_controller->modal();
				break;
			case 'profile':
				$employee_controller->profile();
				break;
			case 'statistical':
				$employee_controller->statistical();
				break;
			case 'sendmail_nv':
				$employee_controller->sendmail_nv();
				break;
			case 'sendmail_kh':
				$employee_controller->sendmail_kh();
				break;
			case 'update_process':
				$employee_controller->update_process();
				break;
			case 'unset_bill':
				$employee_controller->unset_bill();
				break;
			case 'thongke':
				$employee_controller->thongke();
				break;
			case 'thongke_process':
				$employee_controller->thongke_process();
				break;
			default:
				# code...
				break;	
		}

	break;
	
	case 'customer':
	$auth->check_login();
		require_once('controllers/CustomerController.php');
		$customer_controller= new CustomerController();

		
		switch ($act) {
			case 'deactive':
				$customer_controller->deactive();
				break;
			case 'active':
				$customer_controller->active();
				break;
			case 'list':
				$customer_controller->list();
				break;
			case 'add':
				$customer_controller->add();
				break;
			case 'store':
				$customer_controller->store();
				break;		
			case 'detail':
				$customer_controller->detail();
				break;
			case 'edit':
				$customer_controller->edit();
				break;
			case 'update':
				$customer_controller->update();
				break;
			case 'delete':
				$customer_controller->delete();
				break;
			default:
				# code...
				break;	
		}

	break;
	case 'sale':
	$auth->check_login();
		require_once('controllers/SaleController.php');
		$sale_controller= new SaleController();

		
		switch ($act) {
			case 'create_bill':
				$sale_controller->create_bill();
				break;
			case 'purchase':
				$sale_controller->purchase();
				break;
			case 'sale':
				$sale_controller->sale();
				break;		
			case 'add2cart':
				$sale_controller->add2cart();
				break;
			case 'remove_product':
				$sale_controller->remove_product();
				break;
			
			case 'delete_cart':
				$sale_controller->delete_cart();
				break;
			case 'unset_product':
				$sale_controller->unset_product();
				break;
			case 'pay':
				$sale_controller->pay();
				break;
			case 'bill_list':
				$sale_controller->bill_list();
				break;
			case 'chitietbill':
				$sale_controller->chitietbill();
				break;
			default:
				# code...
				break;	
		}

	break;
default:
		
		 ?>
		 <a class="btn btn-success" href="?mod=user&act=user">người dùng</a>
		 <a class="btn btn-success" href="?mod=sale&act=create_bill">Bán hàng</a>
		 <a class="btn btn-success" href="?mod=product&act=list">Danh sách sản phẩm</a>
		 <a class="btn btn-success" href="?mod=employee&act=list">Danh sách nhân viên</a>
		 <a class="btn btn-success" href="?mod=customer&act=list">Danh sách khách hàng</a>
		
		 <h1>dsadsadsadsdsadsa</h1>
		 <?php

		break;
}


 ?>

 