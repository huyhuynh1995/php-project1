<?php
session_start();

?>
<?php
	include('../../config/connectDB.php');
?>
<?php
(int)$id=$_GET['id'];
// echo "iddanhmuc = ".$id;

$sql_sanpham_byid = "SELECT * FROM `sanpham_tbl` WHERE `id_sanpham` = {$id}";
$sql_getsanpham_byid = mysqli_query($connect, $sql_sanpham_byid);
while($row = mysqli_fetch_array($sql_getsanpham_byid))
{
	// echo $row['hinhanh'];
	unlink($row['hinhanh']);
}
$sql_xoa = "DELETE FROM `sanpham_tbl` WHERE `id_sanpham`={$id}";
if(mysqli_query($connect,$sql_xoa))
{
	header('Location: index.php');
}else{
	echo "Xóa dữ liệu không thành công";
}

?>