<?php
include('../../../connectDB.php');
if ($_SESSION['admin'] = false) {
	header('Location: ../../login.php');
}
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Danh sách đơn hàng</title>
</head>
<body>
	<style>
		.body{
			width: 1100px;
			margin:30px auto;
			height: auto;
			display: flex;

		}
		.list_order{
			width: 78%;
			padding:10px;
			height: auto;
		}
		.filter_order{
			width: 17%;
			padding:10px 0;
			height: auto;
			border: 1px solid #00e6ac;
			float: right;
			background: #E6F1D8;
		}
		.tatcatrangthai{
			width: 100%;
		}
		.trangthai{
			padding: 8px 0;
		}
		.trangthai:hover{
			background: #C8E2B1;
		}
		.noidungtrangthai{
			padding: 0 15px;
		}
		.filter_order a{
			text-decoration: none;
		}
		
	
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
	<center><h1>Danh sách đơn hàng</h1></center>
	<div class="body">

		<div class="filter_order">
			<h3 style="padding-left: 10px;">Trạng thái đơn hàng</h3>
			<div class="tatcatrangthai">
				<div class="trangthai" id="tatca">
					<a href="?stt=tatcadonhang">
						<div class="noidungtrangthai">
							Tất cả đơn hàng
						</div>
					</a>
				</div>
				<div class="trangthai" id="choxuly">
					<a href="?stt=choxuly">
						<div class="noidungtrangthai">
							Chờ xử lý
						</div>
					</a>
				</div>
				<div class="trangthai" id="chuanbihang">
					<a href="?stt=chuanbihang">
						<div class="noidungtrangthai">
							Đang chuẩn bị hàng
						</div>
					</a>
				</div>
				<div class="trangthai" id="giaohang">
					<a href="?stt=giaohang">
						<div class="noidungtrangthai">
							Đang giao hàng
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="list_order">
			<?php
				$stt = !empty($_GET['stt'])?$_GET['stt']:'tatcadonhang';
				$link = "{$stt}.php";
				require $link;
			?>
		</div>
		
	</div>
</body>
</html>

