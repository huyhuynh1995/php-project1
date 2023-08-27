<?php
session_start();
include "config/connectDB.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng nhập ADMIN HNHShop</title>
</head>
<body>
	<style type="text/css">
		body{
	margin: 0;
	padding: 0;
}
.wrapper{
	border: 1px solid #000;
	min-height: 700px;
	width: 90%;
	margin: 0 auto;
}
.header{
	border: 1px solid #ff80ff;
	height: 130px;
	width: 100%;
/*	background-image: url("../../images/banner-electric.jpg") ;*/
}
.menu{
	border: 1px solid #1aff8c;
	height: 50px;
	background: #00e6ac;
	display: flex;
	margin-left: 6px;
}
#main{
	min-height: 400px;
	width: 100%;
	text-align: center;
}
.footer{
	border: 1px solid #ff1a8c;
	height: 150px;
	width: 100%;
	background: #00cc99;
}
ul.list-menu{
	list-style: none;
	font-weight: bold;
	padding-inline-start: 40px;
}
ul.list-menu li{
	float:left;
	padding: 0 4px;
	margin: 0 4px;
}
ul.list-menu li a{
	text-decoration: none;
	color: #fff;
	line-height: 20px;
	font-size: large;
	}
ul.list-menu li:hover a{
	color: #000;
}
.form-dangky{
	width: 400px;
	height: 700px;
	margin: 15px auto;
	text-align: left;
	padding-left: 90px;
}
.label{
	min-width: 200px;
}
.input{
	width: 300px;
}
.input input{
	width: 100%;
	margin: 5px 0;
	padding: 7px 0;
	border-radius: 4px;
}
	</style>
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
				<li><a href="dangnhap.php">Đăng nhập</a></li>
				<li><a href="dangky.php">Đăng ký</a></li>
				
			</ul>
		</div>
		<div id="main">
			<h1>ĐĂNG NHẬP ADMIN</h1>
			<div class="form-dangky">
				<form action="" method="POST">
					<div class="truong">
						<div class="label">
							<label class = "label" for="tendangnhap">Tên đăng nhập : </label>
						</div>
						<div class="input">
							<input type="text" name="tendangnhap" id="tendangnhap">
						</div>
					</div>
										<div class="truong">
						<div class="label">
							<label class = "label" for="matkhau">Mật khẩu : </label>
						</div>
						<div class="input">
							<input type="password" name="matkhau" id="matkhau">
						</div>
					</div>
					<div class="truong" style="margin-top: 30px">
						<div class="label">
							<label class = "label" for=""></label>
						</div>
						<div class="input">
							<input type="submit" value="ĐĂNG NHẬP" name="dangnhap" style="background: #00e6ac; color: white; padding: 10px;cursor: pointer;border-radius: 8px;font-size: large;font-weight: bold;">
						</div>
						
					</div>
					
								
				</form>
			</div>
			
		</div>
	</div>
</body>
</html>	
<?php
if(isset($_POST['dangnhap'])){
	$tendangnhap = $_POST['tendangnhap'];
	$matkhauadmin = $_POST['matkhau'];
	$matkhau = md5($_POST['matkhau']);
	if($tendangnhap == "huyadmin" && $matkhauadmin == "huy123456"){
		$_SESSION['admin'] = true;
		// echo $_SESSION['admin'];
		header('Location: index.php');
	}else{
		$_SESSION['admin'] = false;
	}
	$sql = "SELECT * FROM `admin_tbl` WHERE `tendangnhap`='{$tendangnhap}'";
	$query = mysqli_query($connect,$sql);
	while($row=mysqli_fetch_array($query))
	{
		if($matkhau == $row['matkhau'])
		{
			$_SESSION['ketoan'] = true;
			header('Location: index.php');
		}else{
			$_SESSION['ketoan'] = false;
		}
	}
}
?>	