<?php

if(isset($_POST['xacnhan'])){
	$tongtien = $_POST['tongtien'];
	$phuongthucthanhtoan = $_POST['phuongthuc'];
	$diachinhanhang = $_POST['diachinhanhang'];
	$sql_update = "UPDATE `chitietdonhang` SET `diachinhanhang`='{$diachinhanhang}',`phuongthucthanhtoan`='{$phuongthucthanhtoan}' WHERE `madonhang` = '{$_SESSION['madonhang']}'";
	$query_update= mysqli_query($connect,$sql_update);
	if($phuongthucthanhtoan == "cod")
	{
		header('Location: camondathang.html');
	}elseif($phuongthucthanhtoan == "momo"){
		header('Location: xulythanhtoanmomo.html');
	}else{
		header('Location: xulythanhtoanmomoatm.html');
	}
}
?>