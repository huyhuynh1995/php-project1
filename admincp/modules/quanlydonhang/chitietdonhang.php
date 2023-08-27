<?php
include('../../../connectDB.php');
if ($_SESSION['admin'] = false) {
	header('Location: ../../login.php');
}
$madonhang = $_GET['madonhang'];
$sql_sanpham = "SELECT * FROM `chitietdonhang` WHERE `madonhang`='{$madonhang}'";
$query_sanpham = mysqli_query($connect,$sql_sanpham);
$tongtien = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chi tiết đơn hàng</title>
</head>
<body>
	
	<div class="wrapper" style="width:960px; margin: 30px auto;">
		<center><h1>Chi tiết đơn hàng</h1></center>
		<p>(*)Đơn hàng: <?= $madonhang ?></p>
		<table border="1" style="width: 100%;">
			<tr>
				<td>Sản phẩm</td>
				<td>Giá</td>
				<td>Số lượng</td>
				<td>Thành tiền</td>
			</tr>
			<tbody>
				<?php while($row_sanpham = mysqli_fetch_array($query_sanpham)){ 
					$khachhang = $row_sanpham['ten_khachhang'];
					$diachinhanhang = $row_sanpham['diachinhanhang'];
					$tinhtrang = $row_sanpham['tinhtrang'];
					$ngaydat = $row_sanpham['thoigian'];
					?>
					<tr>
						<td><?= $row_sanpham['sanpham'] ?></td>
						<td><?= number_format($row_sanpham['giasanpham'],0,',','.').' VND' ?></td>
						<td><?= $row_sanpham['soluong'] ?></td>
						<td><?= number_format($row_sanpham['thanhtien'],0,',','.').' VND'?></td>
					</tr>
				<?php ;$tongtien += $row_sanpham['thanhtien']; } ?>
					<tr>
						<td colspan="3">TỔNG TIỀN:</td>
						<td><?= number_format($tongtien,0,',','.').' VND'?> </td>
					</tr>
			</tbody>
		</table>
		<ul>
			<li>Khách hàng       : <?= $khachhang ?></li>
			<li>Ngày đặt         : <?= $ngaydat ?></li>
			<li>Địa chỉ nhận hàng: <?= $diachinhanhang ?></li>
			<br>
		</ul>
		<form action="" method="POST" style="float: right;">
			<li >
				<label for="" >Tình trạng: </label>
				<input type="text" name="tinhtrangcu" disabled value="<?= $tinhtrang ?>">
			</li>
			<li >
				<label for="" style="margin-top:3px;">Update: </label>
				<select name="tinhtrang_update" id="" style="margin-left: 22px;margin-top:3px;">
					<option value="">---Chọn---</option>
					<option value="choxuly" >Chờ xử lý</option>
					<option value="chuanbihang" >Đang chuẩn bị hàng</option>
					<option value="giaohang" >Giao hàng</option>
				</select>
				
			</li>
			<input type="submit" name="capnhat" value="Cập nhật" style="margin-left: 125px;margin-top:15px" >

		</form>
			
	</div>
</body>
</html>
<?php
if(isset($_POST['capnhat'])){
	$tinhtrang_update = $_POST['tinhtrang_update'];
	$status = array(
		'choxuly' => "Chờ xử lý",
		'chuanbihang' => "Chuẩn bị hàng",
		'giaohang' => "Giao hàng"
	);
	$sql = "UPDATE `chitietdonhang` SET `tinhtrang`='$status[$tinhtrang_update]' WHERE `madonhang`='{$madonhang}'";
	
	$query = mysqli_query($connect,$sql);
	header('Location: index.php');

}
?>