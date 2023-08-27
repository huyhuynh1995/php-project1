<?php
include('connectDB.php');
include('mail/sendmail.php');
if(isset($_POST['dangky'])){
	$hoten = $_POST['hoten'];
	$tendangnhap = $_POST['tendangnhap'];
	$diachi = $_POST['diachi'];
	$email = $_POST['email'];
	$sodienthoai = $_POST['sodienthoai'];
	$matkhau = md5($_POST['matkhau']);
	$token = md5($_POST['tendangnhap']);
	$trangthai = 0;
	$link_kichhoat = "http://localhost/projectphp/ketquadangky.php?token={$token}";
	$sql_kiemtra = "SELECT * FROM `user_tbl` WHERE `tendangnhap`='{$tendangnhap}'";
	$query_kiemtra = mysqli_query($connect,$sql_kiemtra);
	$count_kiemtra = mysqli_num_rows($query_kiemtra);
	if($count_kiemtra >0){
		echo "<center>Tên đăng nhập đã tồn tại. Vui lòng chọn tên đăng nhập khác.";
		echo "<br>";
		echo "Quay lại trang đăng ký <a href='dangky.php'>tại đây</a></center>";
	}else
	{
		$sql = "INSERT INTO `user_tbl` (`hoten`,`tendangnhap`,`diachi`,`email`,`sodienthoai`,`matkhau`,`token`,`trangthai`) VALUES ('{$hoten}','{$tendangnhap}','{$diachi}','{$email}','{$sodienthoai}','{$matkhau}','{$token}','{$trangthai}')";
		$query = mysqli_query($connect,$sql);
		if($query){
			echo "Chúng tôi vừa gửi một email kích hoạt tài khoản vào địa chỉ {$email}. Vui lòng mở hộp thư của bạn và thực hiện theo hướng dẫn để kích hoạt tài khoản hoạt động";
			$tieude = "Kích hoạt tài khoản";
			$noidung = "Chúng tôi vừa nhận một yêu cầu đăng ký tài khoản của bạn. Vui lòng CLICK vào đường dẫn sau để KÍCH HOẠT tài khoản: ".$link_kichhoat;
			$mail = new Mailer();
			$mail->maildathang($tieude,$noidung,$email); 
		}else{
			echo "Đăng ký không thành công";
		}
	}
	
}
?>	