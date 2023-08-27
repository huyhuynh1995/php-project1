<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

class Mailer{
	public function maildathang($tieude,$noidung,$mail_dathang){ 
		$mail = new PHPMailer(true);
		$mail->CharSet = 'UTF-8';
		try {
			//Server settings
			$mail->SMTPDebug = 0;
			$mail->isSMTP(); // Sử dụng SMTP để gửi mail
			$mail->Host = 'smtp.gmail.com'; // Server SMTP của gmail
			$mail->SMTPAuth = true; // Bật xác thực SMTP
			$mail->Username = 'nguyenhuyhuynh.ckd@gmail.com'; // Tài khoản email
			$mail->Password = 'ztdssbmewqkgiwwc'; // Mật khẩu ứng dụng ở bước 1 hoặc mật khẩu email
			$mail->SMTPSecure = 'ssl'; // Mã hóa SSL
			$mail->Port = 465; // Cổng kết nối SMTP là 465

			//Recipients
			$mail->setFrom('nguyenhuyhuynh.ckd@gmail.com', 'H.N.H Shop'); // Địa chỉ email và tên người gửi
			$mail->addAddress($mail_dathang, 'you'); // Địa chỉ mail và tên người nhận

			//Content
			$mail->isHTML(true); // Set email format to HTML
			$mail->Subject = $tieude; // Tiêu đề
			$mail->Body = $noidung; // Nội dung

			$mail->send();
			echo ' OK!';
		} catch (Exception $e) {
			echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;}
		}
}
?>