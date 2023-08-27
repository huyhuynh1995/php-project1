<?php
$sql = "SELECT * FROM `sanpham_tbl`";
$query = mysqli_query($connect,$sql);
?>


			<div class="main-content">
				<ul class="product-list">
					<?php  while($row = mysqli_fetch_array($query)) { 

					?>
					<li>
						<a href="san-pham-<?= $row['id_sanpham'] ?>=<?= $row['urlsanpham'] ?>">
							<img src="<?= $row['hinhanh'] ?>" height="250px" alt="">
							<p class="product-name"><?= $row['tensanpham'] ?></p>
							<p class="product-price">Giá: <?= number_format($row['giasanpham'],0,',','.')." VND"  ?></p>
						</a>
					</li>
					<?php } ?>
				</ul>
			</div>
		
		
