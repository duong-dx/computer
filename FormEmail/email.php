<?php 
	function send_email($email_recive,$name,$contents,$subject){
		//https://www.google.com/settings/security/lesssecureapps
		// Khai báo thư viên phpmailer
        require "phpmailer/PHPMailerAutoload.php";
        require "phpmailer/class.phpmailer.php";
        // Khai báo tạo PHPMailer
        $mail = new PHPMailer();
        //Khai báo gửi mail bằng SMTP
        $mail->IsSMTP();
        //Tắt mở kiểm tra lỗi trả về, chấp nhận các giá trị 0 1 2
        // 0 = off không thông báo bất kì gì, tốt nhất nên dùng khi đã hoàn thành.
        // 1 = Thông báo lỗi ở client
        // 2 = Thông báo lỗi cả client và lỗi ở server
        // To load the French version
        $mail->setLanguage('vi', '/optional/path/to/language/directory/');
        $mail->SMTPDebug  = 1;
				$mail->SMTPOptions = array (
		        'ssl' => array(
	        	'verify_peer'  => false,
	        	'verify_peer_name'  => false,
	        	'allow_self_signed' => true)
				);
        $mail->CharSet="UTF-8";
        $mail->Debugoutput = "html"; // Lỗi trả về hiển thị với cấu trúc HTML
        $mail->Host       = "smtp.gmail.com"; //host smtp để gửi mail
        $mail->Port       = 587; // cổng để gửi mail
        $mail->SMTPSecure = "tls"; //Phương thức mã hóa thư - ssl hoặc tls
        $mail->SMTPAuth   = true; //Xác thực SMTP
        $mail->Username   = "duong1200798@gmail.com"; // Tên đăng nhập tài khoản Gmail
        $mail->Password   = "A0977180943a"; //Mật khẩu của gmail
        $mail->SetFrom("duong1200798@gmail.com", "Đinh Xuân Dương"); // Thông tin người gửi
        $mail->AddReplyTo("duong1200798@gmail.com","Đinh Xuân Dương");// Ấn định email sẽ nhận khi người dùng reply lại.
        $mail->AddAddress($email_recive, $name);//Email của người nhận
        //$mail->AddCC($email_recive, $name);//Email của người nhận
        $mail->Subject = $subject; //Tiêu đề của thư
        $mail->MsgHTML($contents); //Nội dung của bức thư.
        // $mail->MsgHTML(file_get_contents("email-template.html"), dirname(__FILE__));
        // Gửi thư với tập tin html
        $mail->AltBody = "Nội dung thư";//Nội dung rút gọn hiển thị bên ngoài thư mục thư.
        //$mail->AddAttachment("images/attact-tui.gif");//Tập tin cần attach

        //Tiến hành gửi email và kiểm tra lỗi
        if(!$mail->Send()) {
          echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
					return false;
        } else {
            echo "Đã gửi thư thành công!";
                    return true;
            

        }
	}
 ?>