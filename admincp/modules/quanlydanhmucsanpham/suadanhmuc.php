<?php
session_start();

?>
<?php
include('../../config/connectDB.php');
include('../../../inc/toiuu_url.php');
(int)$id=$_GET['id'];
// echo "iddanhmuc = ".$id;
$sql_danhmuc_byid = "SELECT * FROM `danhmuc_tbl` WHERE `id_danhmuc` = {$id}";
$sql_getdanhmuc_byid = mysqli_query($connect, $sql_danhmuc_byid);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sửa danh mục sản phẩm</title>
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
	<div class="mainmenu" style="display: flex;width:100%;height:50px;">
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
	<center><h1>Sửa danh mục </h1>
	<?php while($row = mysqli_fetch_array($sql_getdanhmuc_byid)) { ?>
	<form method="POST" action="">
		<div class="main-form" style="width:700px;margin:0 auto;">
			<h3>Danh mục</h3>
			<input type="hidden" name="id" value="<?= $row['id_danhmuc']?>">
			<label for=""> Tên cũ: </label>
			<input type="text" disabled value="<?= $row['tendanhmuc']?>"> <br><br>
			<label for="tendanhmuc"> Tên mới: </label>
			<input type="text" name="tendanhmuc" id="tendanhmuc"><br><br>
			<input type="submit" name="update" value="Cập nhật">
		</div>
	</form></center>
	<?php } ?>
</body>
</html>
<?php 
if(isset($_POST['update']))
{
	$id = $_POST['id'];
	$tendanhmuc = $_POST['tendanhmuc'];
	$urldanhmuc = UrlNormal($tendanhmuc);
	$sql_updatedanhmuc = "UPDATE `danhmuc_tbl` SET `tendanhmuc`='{$tendanhmuc}',`urldanhmuc`='{$urldanhmuc}' WHERE `id_danhmuc` = {$id}";
	if(mysqli_query($connect,$sql_updatedanhmuc))
	{
		header('Location: index.php');
	}else{
		echo "Cập nhật dữ liệu thất bại";
	}
}
?>