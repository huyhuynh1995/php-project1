<?php
$id_danhmuc = $_GET['id_danhmuc'];
$sql = "SELECT * FROM `danhmuc_tbl`,`sanpham_tbl` WHERE `danhmuc_tbl`.`id_danhmuc`=`sanpham_tbl`.`id_danhmuc` AND `danhmuc_tbl`.`id_danhmuc`=$id_danhmuc";
$query = mysqli_query($connect,$sql);
?>


			<div class="main-content">
				<?php if(isset($_SESSION['danhmuc'])){ ?>
					<h1><?= $_SESSION['danhmuc'] ?></h1>
				<?php } ?>
				<ul class="product-list">
					<?php while ($row = mysqli_fetch_array($query)) {
						$_SESSION['danhmuc'] = $row['tendanhmuc'];
						
					 ?>
					<li>
						<a href="san-pham-<?= $row['id_sanpham'] ?>=<?= $row['urlsanpham'] ?>">
							<img src="<?= $row['hinhanh'] ?>" alt="">
							<p class="product-name"><?= $row['tensanpham'] ?></p>
							<p class="product-price">Giá: <?= number_format($row['giasanpham'],0,',','.').' VND' ?></p>
						</a>
					</li>
					<?php } ?>
					
				</ul>
				
			</div>
			
		
		
