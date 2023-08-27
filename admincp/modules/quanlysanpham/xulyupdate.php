<?php 
	include('../../config/connectDB.php');
	include('../../../inc/toiuu_url.php');
	if(isset($_POST['update']))
	{
		$id = $_POST['id'];
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
		// $hinhanh = $_POST['hinhmoi'];
		if(!empty($_FILES['hinhmoi']['name']))
		{
			$hinhanh_name = $_FILES['hinhmoi']['name'];
			$hinhanh_tmp = $_FILES['hinhmoi']['tmp_name'];
			$hinhanh = "images/sanpham/".$hinhanh_name;
			$move_hinhanh = "../../../images/sanpham/".$hinhanh_name;
			move_uploaded_file($hinhanh_tmp, $move_hinhanh);
		}else{
			$sql_sanpham_byid = "SELECT * FROM `sanpham_tbl` WHERE `id_sanpham` = {$id}";
			$sql_getsanpham_byid = mysqli_query($connect, $sql_sanpham_byid);
			while($row = mysqli_fetch_array($sql_getsanpham_byid)) {
			$hinhanh =  $row['hinhanh'] ;
			}
		}


		$sql_updatesanpham = "UPDATE `sanpham_tbl` SET `tensanpham` = '{$tensp}' ,`urlsanpham`='{$urlsanpham}', `masanpham` = '{$masp}',`giasanpham` = '{$giasp}',`soluong` = '{$soluong}',`tomtat` = '{$tomtat}',`noidung` = '{$noidung}',`tinhtrang` = '{$tinhtrang}',`id_danhmuc` = '{$id_danhmuc}',`hinhanh` = '{$hinhanh}' WHERE `id_sanpham` = {$id}";
		if(!mysqli_query($connect,$sql_updatesanpham))
		{
			echo "Cập nhật dữ liệu thất bại";		
		}
		header('Location: index.php');
	}

?>