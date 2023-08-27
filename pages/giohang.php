
<div class="main-content">
<h1>GIỎ HÀNG</h1>
<?php
if(isset($_SESSION['cart'])){

}
?>
<table border="1" style="width: 90%; text-align: center;border-collapse: collapse;">
	<tr style="background: #ECECEC; ">
		<th>Thứ tự</th>
		<th>Mã SP</th>
		<th>Tên SP</th>
		<th>Hình ảnh</th>
		<th>Số lượng</th>
		<th>Giá SP</th>
		<th>Thành tiền</th>
		<th><a href="xoatatcagiohang.html">Xóa tất cả</a></th>
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
	?>
			<tr>
				<td><?= $i ?></td>
				<td><?= $cart_item['masanpham'] ?></td>
				<td><?= $cart_item['tensanpham'] ?></td>
				<td><img src="<?= $cart_item['hinhanh'] ?>" width="150px" alt=""> </td>
				<td><a href="cong-them-so-luong&id=<?= $cart_item['id_sanpham'] ?>"> <i class="fa-solid fa-plus"></i> </a><?= $cart_item['soluong'] ?><a href="tru-bot-so-luong&id=<?= $cart_item['id_sanpham'] ?>"> <i class="fa-solid fa-minus"></i> </a></td>
				<td><?= number_format($cart_item['giasanpham'],0,',','.').' VND' ?></td>
				<td><?= number_format($thanhtien,0,',','.').' VND' ?></td>
				<td><a href="xoa-san-pham&id=<?= $cart_item['id_sanpham'] ?>">Xóa</a></td>
			</tr>
	<?php	} ?>
			<tr>
				<td colspan="7">TỔNG CỘNG</td>
				<td><?= number_format($tongtien,0,',','.').' VND'?></td>
			</tr>
	
	<?php }else{
	?>
	<tr><td colspan="8"><p>Chưa có sản phẩm nào trong giỏ hàng </p></td></tr>
	<?php } ?>
	
</table>
<br>
<br>
<?php
if(!empty($_SESSION['cart'])){
?>
	<form action="xulydonhang.html" method="POST" style="float: right;margin-right:120px;">
		<input type="submit" value="ĐẶT HÀNG" name="dathang" style="cursor: pointer;">
	</form>
<?php } ?>
<?php
// echo "<pre>";
// print_r ($_SESSION['cart']);
// echo "</pre>";

?>

</div>