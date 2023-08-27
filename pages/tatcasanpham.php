<?php
	$page = !empty($_GET['page'])?$_GET['page']:'1';
	$so_sp_trang = 8;
	$sql = "SELECT * FROM `sanpham_tbl`";
	$query = mysqli_query($connect,$sql);
	$tong_sp = mysqli_num_rows($query);
	$tongso_trang = ceil($tong_sp / $so_sp_trang);
	$start = ($page-1)*$so_sp_trang;
	$sql_sptheotrang = "SELECT * FROM `sanpham_tbl` LIMIT {$start},{$so_sp_trang}";
	$query_sptheotrang = mysqli_query($connect,$sql_sptheotrang);
?>
			<style>
				li.page{
					list-style: none;
					padding: 3px 5px;
					margin:2px;
					
				}
				li.page-selected{
					list-style: none;
					padding: 3px 5px;
					margin:2px;
					border: 1px solid red;
					color: red;
					background: #FFFBD1;
				}
				li.page a{
					text-decoration: none;
				}
			</style>	
			<div class="main-content">
				<ul class="product-list">
					<?php  while($row = mysqli_fetch_array($query_sptheotrang)) { 

						
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
				<div class="danhsachtrang" style="float:right; width: 100%;">
					<ul style="display:flex;float:right;margin-right:115px; ">
						<li class="page" style="border:none;font-weight: bold;">Trang</li>
						<?php if($page<2){?>
						<li class="page"><a href="danh-sach-san-pham&page=1">Trước</a></li>	
						<?php }else{ ?>
						<li class="page"><a href="danh-sach-san-pham&page=<?= $page-1 ?>">Trước</a></li>
						<?php } ?>
					<?php for($i=1;$i<=$tongso_trang;$i++){ ?>
						<?php if($page == $i) { ?>
						<li class="page-selected"><a href="danh-sach-san-pham&page=<?= $i ?>"><?= $i ?></a></li>
						<?php }else{ ?>
						<li class="page"><a href="danh-sach-san-pham&page=<?= $i ?>"><?= $i ?></a></li>
						<?php } ?>	
						
					<?php } ?>
						<?php if($page >= $tongso_trang) { ?>
						<li class="page"><a href="danh-sach-san-pham&page=<?= $tongso_trang ?>">Sau</a></li>
						<?php }else{ ?>
						<li class="page"><a href="danh-sach-san-pham&page=<?= $page+1 ?>">Sau</a></li>
						<?php } ?>	
					</ul>
				</div>
			</div>