<?php
session_start();
if(!empty($_SESSION['admin'])){
	header('Location: ../../login.php');
}
?>
<?php
	include('../../config/connectDB.php');
	include('../../../inc/toiuu_url.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Thêm danh mục mới</title>
</head>
<body>
	<style type="text/css">
		.menu ul li{
			list-style: none;
			margin: 0 5px;
		}
		.menu ul li a{
			font-weight: bold;
			text-decoration: none;
			color: white;
		}
		.menu ul li a:hover{
			text-decoration: none;
			color: blueviolet;
			font-weight: bold;
		}
	</style>
	<div class="wrapper" style="width:1200px; margin:0 auto;background: #FFFAFA;">
	<img src="../../../images/banner.jpg" alt="" width="100%" height="180px">
	<div class="menu" style="display: flex;width:100%;height:50px;">
		<div class="logo" style="width:auto;height:100%">
			<img src="../../../images/logo.png" alt="" height="100%">
		</div>
		<div class="menu" style="background: #00e6ac;display:flex; width:100%">
			<div class="intro" style="width:70%; text-align: center;font-size: x-large;font-weight: bold;color:white;margin:auto">
				KHU VỰC QUẢN TRỊ ADMIN
			</div>
			<div style="float:right;">
				<ul style="display:flex;width:100%">
				<li><a href="../../dashboard.php">DASHBOARD</a></li>
				<li><a href="../../logout.php">Logout</a></li>
			</ul>
			</div>
		</div>
	</div>
	<h1 style="padding-left: 440px;">Thêm danh mục mới</h1>
	<form action="" method="POST">
		<div class="main-form" style="width:330px;margin:0 auto;">
			<div class="ten" style="margin: 15px 0;display:flex;" >
				<div><label for="tendanhmuc">Tên danh mục mới: </label></div>
				<div style="margin-left:8px;"><input type="text" name="tendanhmuc"  style="padding:3px;" id="tendanhmuc"><br></div>
			</div>
			<div class="thutu" style="margin: 15px 0;display:flex;" >
				<div style="width:125.33px;"><label for="thutu" >Thứ tự :</label></div>
				<div style="margin-left:8px;"><input type="text" style="padding:3px;" name="thutu" id="thutu"><br><br></div>
			</div>
			<input type="submit" style="margin-left: 195px;" name="themdanhmuc" value="THÊM">
			
		</div>
		
	</form>
</body>
</html>
<?php 
	if(isset($_POST['themdanhmuc']))
	{
		$tendanhmuc=$_POST['tendanhmuc'];
		$urldanhmuc = UrlNormal($tendanhmuc);
		$thutu = $_POST['thutu'];
		$sql_them = "INSERT INTO `danhmuc_tbl` (`tendanhmuc`,`urldanhmuc`,`thutu`)"."VALUES ('{$tendanhmuc}','{$urldanhmuc}','{$thutu}')";
		if(mysqli_query($connect,$sql_them)){
			header('Location: index.php');
		}else{
			echo "Insert thất bại";
		}
		
	}
?>