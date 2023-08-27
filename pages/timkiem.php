<?php
if(isset($_POST['timkiem']))
{
	$keyword = $_POST['keyword'];
	$sql = "SELECT * FROM `sanpham_tbl` WHERE `tensanpham` LIKE '%{$keyword}%'";
	$query = mysqli_query($connect,$sql);
	$count = mysqli_num_rows($query);
}
?>
			<div class="main-content">
				<h2>Có <?= $count ?> kết quả tìm kiếm cho từ khóa : <?= $keyword ?></h2>
				<ul class="product-list">
					<?php  while($row = mysqli_fetch_array($query)) { ?>
					<li>
						<a href="?module=sanpham&id=<?= $row['id_sanpham'] ?>">
							<img src="<?= $row['hinhanh'] ?>" alt="">
							<p class="product-name"><?= $row['tensanpham'] ?></p>
							<p class="product-price">Giá: <?= $row['giasanpham'] ?></p>
						</a>
					</li>
					<?php } ?>
				</ul>
			</div>