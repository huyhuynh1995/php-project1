<?php
session_start();
include('connectDB.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Đăng nhập thành viên HNHShop</title>
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
			<img src="images/banner.jpg" width="100%" height="100%" alt="banner">
		</div>
		<div class="menu">
			<img src="images/logo.png" alt="" width="228px" height="51px">
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
			<h1>ĐĂNG NHẬP THÀNH VIÊN</h1>
			<div class="form-dangky" >
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
					<div class="truong" style="text-align: left; padding-left:110px">
						<a href="dangky.php">Đăng ký</a>
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
	$matkhau = md5($_POST['matkhau']);
	$sql = "SELECT * FROM `user_tbl` WHERE `tendangnhap`='{$tendangnhap}'";
	$query = mysqli_query($connect,$sql) ;
	$count = mysqli_num_rows($query);
	if($count ==0){
		echo "Tên đăng nhập không tồn tại";
	}else
	{
		while($row=mysqli_fetch_assoc($query)){
			if($row['matkhau'] = $matkhau && $row['trangthai'] = 1){
				$_SESSION['user'] = $tendangnhap;
				$_SESSION['email-user'] = $row['email'];
				$_SESSION['name-user'] = $row['hoten'];
				header('Location: index.php');
				// echo $_SESSION['user'];
				// echo $_SESSION['email-user'] ;
			}else
			{
				echo "Mật khẩu không chính xác hoặc tài khoản chưa kích hoạt";
			}
		}
	}
	
	// $count = mysqli_num_rows($query);
	// // echo $count;
	// if($count>0)
	// {
	// 	$_SESSION['user'] = $tendangnhap; 
	// }
	// echo $_SESSION['user'];
	
}
?>		