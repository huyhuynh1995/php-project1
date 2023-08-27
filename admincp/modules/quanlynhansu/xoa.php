<?php
$id = $_GET['id'];
$sql = "DELETE FROM `admin_tbl` WHERE `id_admin`={$id}";
$query= mysqli_query($connect,$sql);
if($query){
	header('Location: index.php');
}else{
	echo "Xóa thành viên không thành công";
}
?>