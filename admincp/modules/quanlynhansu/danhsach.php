<?php
$sql="SELECT * FROM `admin_tbl`";
$query = mysqli_query($connect,$sql);
?>
<center><h1>Danh sách nhân sự</h1></center>
<a style="margin-left:513px;cursor: pointer;" href="?stt=them"><button>+ Thêm mới</button></a>
<br><br>
<center><table border="1" style="border-collapse: collapse;width: 100%;">
	<th>
		<tr>
			<td>Tên Nhân Sự</td>
			<td>Vị trí</td>
			<td>Thay đổi</td>
		</tr>
	</th>
	<tbody>
		<?php while($row=mysqli_fetch_array($query)) { ?>
		<tr>
			<td><?= $row['tennhansu'] ?></td>
			<td><?= $row['vitri'] ?></td>
			<td><a href="?stt=sua&id=<?= $row['id_admin'] ?>">Sửa</a> | <a href="?stt=xoa&id=<?= $row['id_admin'] ?>">Xóa</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table></center>