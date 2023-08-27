<?php
	include('../../config/connectDB.php');
	include('../../../inc/toiuu_url.php');
?>
<?php 
	if(isset($_POST['themsanpham']))
	{
		$tensp=$_POST['tensp'];
		$urlsanpham = UrlNormal($tensp);
		$masp = $_POST['masp'];
		$giasp=$_POST['giasp'];
		$soluong=$_POST['soluong'];
		$tomtat=$_POST['tomtat'];
		$noidung=$_POST['noidung'];
		$tinhtrang=$_POST['tinhtrang'];
		$id_danhmuc=$_POST['id_danhmuc'];
		//hinh anh
		$hinhanh_name = $_FILES['hinhanh']['name'];
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$hinhanh = "images/sanpham/".$hinhanh_name;
		$move_hinhanh = "../../../images/sanpham/".$hinhanh_name;
		move_uploaded_file($hinhanh_tmp, $move_hinhanh);


		$sql_them = "INSERT INTO `sanpham_tbl` (`tensanpham`,`urlsanpham`,`masanpham`,`giasanpham`,`soluong`,`tomtat`,`noidung`,`tinhtrang`,`id_danhmuc`,`hinhanh`)"."VALUES ('{$tensp}','{$urlsanpham}','{$masp}','{$giasp}','{$soluong}','{$tomtat}','{$noidung}','{$tinhtrang}','{$id_danhmuc}','{$hinhanh}')";
		if(mysqli_query($connect,$sql_them)){
			header('Location: index.php');
		}else{
			echo "Insert thất bại";
		}
		
	}
?>