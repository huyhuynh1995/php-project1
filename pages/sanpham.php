<?php
$idsanpham = (int)$_GET['id'];
$sql= "SELECT * FROM `sanpham_tbl` WHERE `sanpham_tbl`.`id_sanpham`={$idsanpham}";
$query = mysqli_query($connect,$sql);
?>
<div class="main-content">
	<div class="wrapper_hinhanh" style="width: 100% ; display:flex;">
		
			<div class="hinhanh_sanpham" style="width: 35%; margin: 5px 5px;">
				<?php while($row=mysqli_fetch_array($query)){ ?>
				<img src="<?= $row['hinhanh'] ?>" width="90%" height="auto" alt="">
			</div>
			<div class="chitiet_sanpham" style="width: 45%; margin: 5px 0;">
				<form action="themgiohang.html" method="POST">
					<h1><i><?= $row['tensanpham'] ?></i></h1>
					<ul>
					<li><b>Giá Sản Phẩm:<span style="color:red;"> <?= number_format($row['giasanpham'],0,',','.').' VND' ?></span> </b></li><br>
					<input type="hidden" name="id_sanpham" value="<?= $row['id_sanpham'] ?>">
					<li>
					<label for="soluong">Số lượng: </label>
					<input type="number" min="0" id="soluong" name="soluong" value="0" style="width:45px; border-radius: 5px;text-align: center;"><i>  (Còn: </i><u><?= $row['soluong'] ?></u><i> sản phẩm tại cửa hàng)</i>
					
					</li>
					</ul>
					
					<input style="background:#5BBD2B;color:white;padding:7px;border:none; border-radius: 5px;margin-left:24px;cursor: pointer;" type="submit" name="themgiohang" value="+ THÊM GIỎ HÀNG">
				</form>
			</div>
		
	</div>
	<br><br><br><br><br><br>
	<div class="noidungsanpham">
		<?= $row['noidung'];?>
	</div>
	</div>
	<?php } ?>
</div>
