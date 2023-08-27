<?php
session_start();
if($_SESSION['admin']=false)
{
	header('Location: ../../login.php');
}
?>
<?php
include('../../config/connectDB.php')
?>
<?php
	$sql_sapxepdanhmuc = "SELECT * FROM `danhmuc_tbl` ORDER BY `thutu` DESC";
	$sql_getdanhmuc = mysqli_query($connect,$sql_sapxepdanhmuc);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quản lý danh mục sản phẩm</title>
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
	</div>
	<center><h1>Các danh mục sản phẩm</h1>
	<table border="1" style="border-collapse: collapse;">
			<tr>
				<td>ID</td>
				<td>Tên danh mục</td>
				<td>Thay đổi</td>
			</tr>
		</th>
		<tbody>
			<?php 
			$i=0;
			while($row = mysqli_fetch_array($sql_getdanhmuc)){
			?>
			<tr>
				<td><?= $row['id_danhmuc'] ?></td>
				<td><?= $row['tendanhmuc'] ?></td>
				<td><a href="/projectphp/admincp/modules/quanlydanhmucsanpham/suadanhmuc.php?id=<?= $row['id_danhmuc'] ?>">Sửa</a> | <a href="/projectphp/admincp/modules/quanlydanhmucsanpham/xoadanhmuc.php?id=<?= $row['id_danhmuc'] ?>">Xóa</a></td>
			</tr>
			<?php } ?>
		</tbody>

	</table>
	<br>
	<button><a style="text-decoration : none;" href="/projectphp/admincp/modules/quanlydanhmucsanpham/themdanhmuc.php" >Thêm mới</a></button></center>
</body>
</html>