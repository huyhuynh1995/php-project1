<?php
session_start();
if($_SESSION['admin'] = false && $_SESSION['ketoan'] = false){
	header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../public/css/style.css">
	<link rel="stylesheet" href="asset/css/admincp.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
	<title>ADMINCP</title>
</head>
<body>
	<div class="wrapper">
		<div class="header">
			<img src="../images/banner.jpg" width="100%" height="100%" alt="banner">
		</div>
		<div class="menu">
			<img src="../images/logo.png" alt="" width="228px" height="51px">
			<ul class="list-menu">
				<li><a href="index.php">TRANG CHỦ</a></li>
				<li><a href="index.php">SẢN PHẨM</a></li>
				<li><a href="pages/tintuc.php">TIN TỨC</a></li>
				<li><a href="pages/lienhe.php">LIÊN HỆ</a></li>
				<li><a href="index.php?module=giohang">GIỎ HÀNG</a></li>
				<li>
				<form action="?module=timkiem" method="POST">
					<input type="text" name="keyword" >
					<input type="submit" value="Tìm kiếm" name="timkiem">
				</form>
				</li>
				<li style="color: black;">ADMIN<span style="color: white;"><a href="logout.php"><i>(Đăng xuất)</i></a></span></li>
								
			</ul>
		</div>
		<div id="main-admin">
			<div class="title">
				<h1 style="color: darkblue;">Phần quản trị Admin</h1>	
			</div>
			<div class="content">
				<div class="phanquanly">
					<a href="modules/quanlydonhang" style="text-decoration: none;color: black">
						<div class="noidungquanly">
							Đơn hàng
						</div>
					</a>
					<div class="click">
						  >><a href="modules/quanlydanhmucsanpham"> Chỉnh sửa</a>
					</div>
				</div>
				<div class="phanquanly">
					<a href="modules/quanlydanhmucsanpham" style="text-decoration: none;color: black">
						<div class="noidungquanly">
							Danh mục sản phẩm
						</div>
					</a>
					<div class="click">
						  >><a href="modules/quanlydanhmucsanpham"> Chỉnh sửa</a>
					</div>
				</div>
				<div class="phanquanly">
					<a href="modules/quanlysanpham" style="text-decoration: none;color: black">
						<div class="noidungquanly">
							Danh sách sản phẩm
						</div>
					</a>
					<div class="click">
						  >><a href="modules/quanlysanpham"> Chỉnh sửa</a>
					</div>
				</div>
				<div class="phanquanly">
					<a href="modules/quanlynhansu" style="text-decoration: none;color: black">
						<div class="noidungquanly">
							Quản lý nhân sự
						</div>
					</a>
					<div class="click">
						  >><a href="modules/quanlynhansu"> Chỉnh sửa</a>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</body>
</html>

