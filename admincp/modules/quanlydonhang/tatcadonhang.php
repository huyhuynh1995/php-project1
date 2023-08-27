			<style >
				#tatca{
					background: #F9CC76;
				}
			</style>
		
			<table border="1" style="width: 100%;">
				<tr>
					<td>Mã đơn hàng</td>
					<td>Tên KH</td>
					<td>Địa chỉ</td>
					<td>Ngày đặt hàng</td>
					<td>Tình trạng</td>
					<td>Xem chi tiết</td>

				</tr>
				<tbody>
					<?php
							$sql_tatca = "SELECT * FROM `chitietdonhang`";
							$query_tatca = mysqli_query($connect,$sql_tatca);
							while($row=mysqli_fetch_array($query_tatca)){ ?>
							<tr>
								<td><?= $row['madonhang'] ?></td>
								<td><?= $row['ten_khachhang'] ?></td>
								<td><?= $row['diachinhanhang'] ?></td>
								<td><?= $row['thoigian'] ?></td>
								<td><?= $row['tinhtrang'] ?></td>
								<td><a href="/projectphp/admincp/modules/quanlydonhang/chitietdonhang.php?madonhang=<?= $row['madonhang'] ?>">Xem</a></td>
							</tr>
							<?php } ?>
						
					
				</tbody>
			</table>
		