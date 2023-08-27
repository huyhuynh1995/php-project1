<?php 
session_start();
$sql = "SELECT * FROM `danhmuc_tbl`";
$query = mysqli_query($connect,$sql);
?>

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
	<div class="wrapper">
		<div class="header">
			<img src="images/banner.jpg" width="100%" height="100%" alt="banner">
		</div>
		<div class="menu">
			<img src="images/logo.png" alt="" width="228px" height="51px">
			<ul class="list-menu">
				<li><a href="home.html">TRANG CHỦ</a></li>
				<li><a href="danh-sach-san-pham&page=1">SẢN PHẨM</a></li>
				<li></li>
				<li><a href="lienhe.html">LIÊN HỆ</a></li>
				<li><a href="giohang.html">GIỎ HÀNG</a></li>
				<li>
				<form action="timkiem.html" method="POST">
					<input type="text" name="keyword" >
					<input type="submit" value="Tìm kiếm" name="timkiem">
				</form>
				</li>
				<?php
				if(empty($_SESSION['user']) ) {
				?>
				<li><a href="dangnhap.html">Đăng nhập</a></li>
				<li><a href="dangky.html">Đăng ký</a></li>
				<?php }else{ ?>
				<li></li>
				<li><a href="profile-<?= $_SESSION['user'] ?>"><?= $_SESSION['user'] ?><i>(edit)</i></a></li>
				<li><a href="dangxuat.php">Đăng xuất</a></li>
				<?php } ?>
				
			</ul>
		</div>
		<div id="main">
			<div class="sidebar">
				<h3>Sản phẩm</h3>
				<ul class="list-sidebar">
					<?php while($row = mysqli_fetch_array($query)){ 

					?>
					<li><a href="danh-muc-<?= $row['id_danhmuc'] ?>=<?= $row['urldanhmuc'] ?>"> <?= $row['tendanhmuc'] ?></a></li>
					<?php } ?>
				</ul>
			</div>
