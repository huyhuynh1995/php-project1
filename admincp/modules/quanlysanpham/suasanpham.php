<?php
session_start();

?>
<?php
include('../../config/connectDB.php');
include('../../../inc/toiuu_url.php');
(int)$id=$_GET['id'];
// echo "iddanhmuc = ".$id;
$sql_sanpham_byid = "SELECT * FROM `sanpham_tbl` WHERE `id_sanpham` = {$id}";
$sql_getsanpham_byid = mysqli_query($connect, $sql_sanpham_byid);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sửa  sản phẩm</title>
	<script src="../../../ckeditor/ckeditor/ckeditor.js"></script>
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
		.thongtin{
			display:flex;
			margin: 5px 0;
			height:30px;
		}
		.chuthich{
			min-width:131px ;
		}
		.main{
			width:100%;
		}
		.main input{
			width:100%;
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
	<center><h1>Sửa sản phẩm</h1></center>
	<?php while($row = mysqli_fetch_array($sql_getsanpham_byid)) { ?>
	<form method="POST" action="xulyupdate.php" enctype="multipart/form-data">
		<div class="main-form" style="display:flex;width:1200px;margin:0 auto;">
			<div class="left-form" style="width:68%; padding:5px">
				<div style="margin-bottom:9px;font-weight: bold;"><label for="tomtat" style="padding-left:5px;">  Tóm tắt mô tả :</label></div>
				<textarea name="tomtat" rows="10" id="tomtat" style="width:100%" value=<?= $row['tomtat'] ?>></textarea><br>
				<div style="margin-bottom:9px;font-weight: bold;"><label for="noidung" style="padding-left:5px;">  Mô tả sản phẩm :</label></div>
				<textarea name="noidung" rows="20" id="noidung" style="width:100%" value=<?= $row['noidung'] ?>></textarea><br>
			</div>
			<div class="right-form" style="width:32%; padding: 5px">
				<br><br>
				<input type="hidden" name="id" value="<?= $row['id_sanpham'] ?>">
				<div class="thongtin">
					<div class="chuthich">
						<label for="tensp">Tên sản phẩm : </label>
					</div>
					<div class="main">
						<input type="text" name="tensp" id="tensp" value="<?= $row['tensanpham'] ?>"><br>
					</div>
				</div>
				<div class="thongtin">
					<div class="chuthich">
						<label for="masp">Mã Sản Phẩm :</label>
					</div>
					<div class="main">
						<input type="text" name="masp" id="masp" value="<?= $row['masanpham'] ?>"><br>
					</div>
				</div>
				<div class="thongtin">
					<div class="chuthich">
						<label for="giasp">Giá Sản Phẩm (VNĐ) :</label>
					</div>
					<div class="main">
						<input type="text" name="giasp" id="giasp" value="<?= $row['giasanpham'] ?>"><br>
					</div>
				</div>
				<div class="thongtin">
					<div class="chuthich">
						<label for="soluong">Số Lượng :</label>
					</div>
					<div class="main">
						<input type="text" name="soluong" id="soluong" value="<?= $row['soluong'] ?>"><br>
					</div>
				</div>
				<div class="thongtin">
					<div class="chuthich">
						<label for="hinhanh">Hình ảnh :</label>
					</div>
					<div class="main">
						<img src="../../../<?= $row['hinhanh'] ?>" width="50px" hright="50px"><br>
					</div>
				</div>
				<br>
				<div class="thongtin">
					<div class="chuthich">
						<label for="hinhmoi">Hình mới :</label>
					</div>
					<div class="main">
						<input type="file" name="hinhmoi" id="hinhmoi"><br>
					</div>
				</div>
				<div class="thongtin">
					<div class="chuthich">
						<label for="danhmuc">Danh mục :</label>
					</div>
					<div class="main">
						<select name="id_danhmuc" id="">
							<?php 
							$sql_sapxepdanhmuc = "SELECT * FROM `danhmuc_tbl` ORDER BY `thutu` DESC";
							$sql_getdanhmuc = mysqli_query($connect,$sql_sapxepdanhmuc);
							$i=0;
							while($row_danhmuc = mysqli_fetch_array($sql_getdanhmuc)){
							?>
							<option value="<?= $row_danhmuc['id_danhmuc'] ?>" <?php if($row['id_danhmuc'] == $row_danhmuc['id_danhmuc']) echo 'selected' ?>><?= $row_danhmuc['tendanhmuc'] ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="thongtin">
					<div class="chuthich">
						<label for="tinhtrang">Tình trạng :</label>	
					</div>
					<div class="main">
						<select name="tinhtrang" id="tinhtrang">
							<option value="1" <?php if($row['tinhtrang'] == "1") echo 'selected' ?>>Kích hoạt</option>
							<option value="0" <?php if($row['tinhtrang'] == "0") echo 'selected' ?>>Ẩn</option>
						</select><br><br>
					</div>
				</div>
				<br><br>
				<div><input style="margin-left:200px;padding:6px 6px;background: #DCDCDC;border-radius: 7px; width: 80px;cursor: pointer;" type="submit" name="update" value="CẬP NHẬT"></div>
			</div>
		</div>
	</form>
	<?php } ?>
	<script>    CKEDITOR.replace( 'tomtat' );</script>
	<script>    CKEDITOR.replace( 'noidung' );</script>
</body>
</html>
