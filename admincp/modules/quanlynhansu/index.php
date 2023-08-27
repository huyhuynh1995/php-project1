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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quản lý nhân sự</title>
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
		.nhansu{
			width: 600px;
			margin: 30px auto;
			min-height: 300px;
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
	</div>
	<div class="nhansu">
			<?php
				$stt = !empty($_GET['stt'])?$_GET['stt']:'danhsach';
				$link = "{$stt}.php";
				require $link;
			?>
		</div>
</body>
</html>