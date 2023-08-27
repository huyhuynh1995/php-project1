<?php 
session_start();
include 'connectDB.php';
$sql = "SELECT * FROM `danhmuc_tbl`";
$query = mysqli_query($connect,$sql);
?>

<?php 
$sql = "SELECT * FROM `danhmuc_tbl`";
$query = mysqli_query($connect,$sql);
?>
<?php echo 'Current PHP version: ' . phpversion();?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="public/css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<title>Linh kiện điện tử - HNH Shop</title>
</head>
<body>
	<style>
		.wrapper{
			height: 880px;
		}

		.contact-in{
			width: 80%;
			display: flex;
			flex-wrap: wrap;
			padding: 10px;
			height: 58%;
			margin: 52px auto;
			border-radius: 10px;
			background: #E6F1D8;
			box-shadow: 0px 0px 10px 0px #666;
		}
		.contact-map{
			margin-top: 20px;
			width: 100%;
			height: auto;
			flex: 50%;
		}
		.contact-form{
			width: 100%;
			height: auto;
			flex: 50%;
			margin-bottom: 30px;
		}
		.contact-form h1{
			text-align: center;
			margin-bottom: 15px auto;
		}
		.contact-form-txt{
			width: 90%;
			height: 25px;
			color: #000;
			border: 1px solid #bcbcbc;
			border-radius: 50px;
			outline: none;
			margin-bottom: 20px;
			padding: 15px;
		}
		.contact-form-textarea{
			width: 90%;
			height: 130px;
			color: #000;
			border: 1px solid #bcbcbc;
			border-radius: 50px;
			outline: none;
			margin-bottom: 20px;
			padding: 15px;
		}
		.contact-form-submit{
			padding: 7px 30px;
			border-radius: 10px;
			background: #AFD788;
			cursor: pointer;
			font-size: x-large;
			font-weight: bold;
			color: whitesmoke;
		}
	</style>	
	<div class="wrapper">
		<div class="header">
			<img src="images/banner.jpg" width="100%" height="100%" alt="banner">
		</div>
		<div class="menu">
			<img src="images/logo.png" alt="" width="228px" height="51px">
			<ul class="list-menu">
				<li><a href="index.php">TRANG CHỦ</a></li>
				<li><a href="index.php?module=tatcasanpham&page=1">SẢN PHẨM</a></li>
				<li><a href="pages/tintuc.php">TIN TỨC</a></li>
				<li><a href="/lienhe.php">LIÊN HỆ</a></li>
				<li><a href="index.php?module=giohang">GIỎ HÀNG</a></li>
				<li>
				<form action="?module=timkiem" method="POST">
					<input type="text" name="keyword" >
					<input type="submit" value="Tìm kiếm" name="timkiem">
				</form>
				</li>
				<?php
				if(empty($_SESSION['user' ]) ) {
				?> 
				<li><a href="dangnhap.php">Đăng nhập</a></li>
				<li><a href="dangky.php">Đăng ký</a></li>
				<?php }else{ ?>
				<li></li>
				<li>Xin chào,<?= $_SESSION['user'] ?></li>
				<li><a href="dangxuat.php">Đăng xuất</a></li>
				<?php } ?>
				
			</ul>
		</div>
		
		<div class="contact-in">
			<div class="contact-map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.55321952911!2d106.79161107465968!3d10.845462757917284!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317527157c90def5%3A0x8cfc6a3a0cf54e6d!2zTMOqIFbEg24gVmnhu4d0LCBRdeG6rW4gOSwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1687583229410!5m2!1sen!2s" width="98%" height="77%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
			<div class="contact-form">
				<h1>Liên Hệ Chúng Tôi</h1>
				<form action="" action="POST">
					<input type="text" placeholder="Tên bạn..." class="contact-form-txt">
					<input type="text" placeholder="Email..." class="contact-form-txt">>
					<textarea name="" id="" cols="50" rows="10" placeholder="Nội dung yêu cầu..." class="contact-form-textarea"></textarea>
					<center><input type="submit" value="GỬI" name="gui" class="contact-form-submit"></center>
				</form>
			</div>
		</div>
		
		<div class="clear"></div>
		<div class="footer" style="display: flex;width:100%; margin:0 auto;padding-bottom: 35px;color:black">
			<style>
				.chinhsach{
					text-decoration: none;
					color: white;
				}
				.social{
					display: flex;
					padding-left: 147px;
				}
				.social img{
					margin: 0 4px;
					height: 38px;
					width: 38px;
				}
				.center-footer p a{
					color:black;
					cursor: pointer;
				}
			</style>
			<div class="left-footer" style="width:33%;">
				<h3><b>GIỚI THIỆU:</b></h3>
				<p>H.N.H Shop là cửa hàng cung cấp thiết bị, linh kiện điện tử</p>
				<p>Địa chỉ: 10 Lê Văn Việt, TP.Thủ Đức, TP.HCM</p>
				<div class="social">
					<img src="images/icon-fb.png" alt="">
					<img src="images/icon-skye.png" alt="">
					<img src="images/zalo-icon.png" alt="">
				</div>
			</div>
			<div class="center-footer" style="width:33%;">
				<h3><b>CHÍNH SÁCH:</b></h3>
				<p><a class="chinhsach" href="">Giao hàng</a></p>
				<p><a class="chinhsach" href="">Đổi hàng</a></p>
				<p><a class="chinhsach" href="">Thanh toán</a></p>
			</div>
			<div class="right-footer" style="width:33%;">
				<h3><b>LIÊN HỆ:</b></h3>
				<p>Tư vấn: Nguyễn Văn A</p>
				<p>SĐT: 0911111111</p>
				<p>Email: support@hnhshop.com</p>
			</div>
			<br>
		</div>
	</div>
	
</body>
</html>
