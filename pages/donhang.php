<?php
$madonhang = $_GET['madonhang'];
$sql = "SELECT * FROM `chitietdonhang` WHERE `madonhang`='{$madonhang}'";
$query = mysqli_query($connect,$sql);
$tongtien = 0;
?>
	<div class="donhang" style="width:960px; margin: 30px auto;">
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
				<?php while($row_sanpham = mysqli_fetch_array($query)){ 
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
			<li>Tình trạng       : <?= $tinhtrang ?></li>
			<br>
		</ul>
	</div>
