<?php
if(isset($_POST['dathang'])){
	if(empty($_SESSION['user'])){
		// header('Location: ../dangnhap.php');
		echo "Bạn cần đăng nhập";
	}else{
		
		$sql = "INSERT INTO `donhang_tbl` (`noidung`) VALUES ('Đơn hàng mới')";
		$query = mysqli_query($connect,$sql);
		echo "Đã nhận thông tin. ID đơn hàng: ";
		$id_donhang = mysqli_insert_id($connect);
		
		$madonhang = "HNHShop_ord".$id_donhang;
		$_SESSION['madonhang'] = $madonhang;
		$tinhtrang = "chờ xử lý";
		
		foreach($_SESSION['cart'] as $key => $cart_item){
			$thanhtien = $cart_item['giasanpham'] * $cart_item['soluong'];
			$sql_sanphamdonhang = "INSERT INTO `chitietdonhang` (`madonhang`,`tk_khachhang`,`ten_khachhang`,`sanpham`,`giasanpham`,`soluong`,`thanhtien`,`tinhtrang`,`thoigian`) VALUES ('{$madonhang}','{$_SESSION['user']}','{$_SESSION['name-user']}','{$cart_item['tensanpham']}','{$cart_item['giasanpham']}','{$cart_item['soluong']}','{$thanhtien}','{$tinhtrang}',CURRENT_TIMESTAMP)";
			$query_sanphamdonhang = mysqli_query($connect,$sql_sanphamdonhang);
			
		}
		header('Location: thanhtoan.html');
	}
		
}
?>