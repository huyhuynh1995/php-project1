<?php
session_start();
if($_SESSION['admin'] == false){
	header('Location: ../../login.php');
}
?>
<?php
	include('../../config/connectDB.php');
?>
<?php
(int)$id=$_GET['id'];
// echo "iddanhmuc = ".$id;
$sql_xoa = "DELETE FROM `danhmuc_tbl` WHERE `id_danhmuc`={$id}";
if(mysqli_query($connect,$sql_xoa))
{
	header('Location: index.php');
}else{
	echo "Xóa dữ liệu không thành công";
}

?>