<?php 
	/**
	 * 
	 */
	class auth
	{
		
		function check_login(){
			if(!isset($_SESSION['isLogin'])){
				header('location: ?mod=login&act=formlogin');
			}

		}
		function check_login_online(){
			if(!isset($_SESSION['isLogin_customer'])){
				setcookie('yeucaudn','Trang này yêu cầu đăng nhập', time()+5);
				header('location: ?mod=user&act=login_customer');
			}
		}
		
	}


 ?>