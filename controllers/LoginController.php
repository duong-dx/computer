<?php 

	require_once('models/Employee.php');
	class LoginController{
		function formlogin(){
			if(isset($_SESSION['employee'])){
				header('location: ?mod=employee&act=list');
			}
			else{
			require_once('views/user/login.php');
			} 
		}
		function login(){
			$data= $_POST;
			$employee= new Employee();
			$result = $employee->check($data);
			if($result!=null){
				if($result['status']==true){
					$_SESSION['employee']=$result;
				$_SESSION['isLogin']=1;
				setcookie('dntc','Đăng nhập thành công!',time()+10);
				header('location: ?mod=employee&act=profile');
				}
				else{
					setcookie('ban','Tài khoản của bạn đã bị khóa vui lòng liên hệ admin để được mở khóa!',time()+10);
					header('location: ?mod=login&act=formlogin');
				}
				
			}
			else{
				setcookie('dnktc','Thông tin tài khoản hoặc mật khẩu không chính xác!',time()+10);
				header('location: ?mod=login&act=formlogin');
			}
			
		}
		function logout(){
			session_destroy();
			setcookie('loguout','không thành công', time()+10);
			header('location: ?mod=login&act=formlogin');
		}
	}
 ?>