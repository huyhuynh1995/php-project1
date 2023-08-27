<div class="main-content" style="display:flex">
	<div class="giohang" style="width: 65%;">
		<h2>Giỏ hàng của bạn</h2>
		<table border="1" style="width: 95%; text-align: center;border-collapse: collapse;">
		<tr style="background: #ECECEC; ">
			<th>Thứ tự</th>
			<th>Mã SP</th>
			<th>Tên SP</th>
			<th>Hình ảnh</th>
			<th>Số lượng</th>
			<th>Giá SP</th>
			<th>Thành tiền</th>
			
		</tr>
		<?php
		if(isset($_SESSION['cart'])){
			$i=0;
			$thanhtien =0;
			$tongtien = 0;
			foreach($_SESSION['cart'] as $cart_item){
				$i++;
				(int)$thanhtien = (int)$cart_item['giasanpham'] * (int)$cart_item['soluong'];
				$tongtien+=$thanhtien;
				$_SESSION['tongtien'] = $tongtien;
		?>
				<tr>
					<td><?= $i ?></td>
					<td><?= $cart_item['masanpham'] ?></td>
					<td><?= $cart_item['tensanpham'] ?></td>
					<td><img src="<?= $cart_item['hinhanh'] ?>" width="150px" alt=""> </td>
					<td><?= $cart_item['soluong'] ?></td>
					<td><?= number_format($cart_item['giasanpham'],0,',','.').' VND' ?></td>
					<td><?= number_format($thanhtien,0,',','.').' VND' ?></td>
					
				</tr>
		<?php	} ?>
				<tr>
					<td colspan="6">TỔNG CỘNG</td>
					<td><?= number_format($tongtien,0,',','.').' VND'?></td>
				</tr>
		
		<?php }else{
		?>
		<tr><td colspan="8"><p>Chưa có sản phẩm nào trong giỏ hàng</p></td></tr>
		<?php } ?>
		
	</table>
	</div>
	<div class="phuongthucthanhtoan" style="margin:60px 7px; width: auto">
		<form action="xulyphuongthucthanhtoan.html" method="POST" target="blank" enctype="application/x-www-form-urlencoded">
			<div class="diachinhanhang" style="display:flex;">
				<p><b>Địa chỉ nhận hàng:</b></p>
				<textarea name="diachinhanhang" id="diachinhanhang" cols="25" rows="4" style="margin: 20px 5px ;padding:11px 3px"></textarea>
			</div>
			<p><b>Chọn phương thức thanh toán</b></p>
			<input type="hidden" name="tongtien" value="<?= $tongtien ?>">
			<div class="cacphuongthuc">
				<input type="radio" name="phuongthuc" value="cod">
				<label>Tiền mặt</label><br>
				<input type="radio" name="phuongthuc" value="momo">
				<label>Ví Momo(QR Code)</label> <br>
				<input type="radio" name="phuongthuc" value="momo_atm">
				<label>Ví Momo(ATM)</label> <br>
				<br>
			</div>
			<center><input type="submit" name="xacnhan" value="ĐẶT HÀNG" style="cursor: pointer;"></center>
		</form>
	
	</div>
</div>
