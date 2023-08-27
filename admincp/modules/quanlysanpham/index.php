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
	$page = !empty($_GET['page'])?$_GET['page']:1;
	$batdau = ($page-1)*10;
	$sql = "SELECT * FROM `sanpham_tbl`,`danhmuc_tbl` WHERE `sanpham_tbl`.`id_danhmuc`= `danhmuc_tbl`.`id_danhmuc`";
	$query = mysqli_query($connect,$sql);
	$sosanpham = mysqli_num_rows($query);
	$sql_spmoitrang = "SELECT * FROM `sanpham_tbl`,`danhmuc_tbl` WHERE `sanpham_tbl`.`id_danhmuc`= `danhmuc_tbl`.`id_danhmuc` LIMIT {$batdau},10";
	$sql_getsanpham = mysqli_query($connect,$sql_spmoitrang);
	$sospmoitrang = 10;
	$sotrang = ceil($sosanpham/$sospmoitrang);
	echo $sosanpham ;
	echo $sotrang;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quản lý sản phẩm</title>
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
	<center><h1>Danh sách sản phẩm</h1></center>
	<button style="margin-left:950px;"><a style="text-decoration : none;" href="/projectphp/admincp/modules/quanlysanpham/themsanpham.php" > + Thêm mới</a></button><br><br>
	<center><table border="1" style="border-collapse: collapse;">
			<tr style="background: #ECECEC; ">
				
				<td>Hình ảnh</td>
				<td>Tên sản phẩm</td>
				<td>Mã sản phẩm</td>
				<td>Giá sản phẩm</td>
				<td>Số lượng</td>
				<td>Tình trạng</td>
				<td>Danh mục</td>
				<td>Thay đổi</td>
			</tr>
		</th>
		<tbody>
			<?php 
			$i=0;
			while($row = mysqli_fetch_array($sql_getsanpham)){
			?>
			<tr>
				
				<td><img src="../../../<?= $row['hinhanh'] ?>" width="50px" hight="50px"></td>
				<td><?= $row['tensanpham'] ?></td>
				<td><?= $row['masanpham'] ?></td>
				<td><?= $row['giasanpham'] ?></td>
				<td><?= $row['soluong'] ?></td>
				<td><?= $row['tinhtrang'] ?></td>
				<td><?= $row['tendanhmuc'] ?></td>
				<td><a href="/projectphp/admincp/modules/quanlysanpham/suasanpham.php?id=<?= $row['id_sanpham'] ?>">Sửa</a> | <a href="/projectphp/admincp/modules/quanlysanpham/xoasanpham.php?id=<?= $row['id_sanpham'] ?>">Xóa</a></td>
			</tr>
			<?php } ?>
		</tbody>

	</table></center>
	<div class="pagging" style="width: 100%;float: right;">
		<ul style="display:flex;float: right;padding-right: 191px;">
			<li style="margin:0 3px;">Trang</li>
			<?php for($i=1;$i<=$sotrang;$i++){ ?>
			<li style="list-style: none; margin:0 3px;"><a style="text-decoration: none;" href="?page=<?= $i ?>"><?= $i ?></a></li>
			<?php } ?>
		</ul>
	</div>
	
</body>
</html>