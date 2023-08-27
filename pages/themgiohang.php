<?php
session_start();
if(isset($_POST['themgiohang'])){
	(int)$id_sanpham = $_POST['id_sanpham'];
	$soluong =$_POST['soluong'];
	$sql = "SELECT * FROM `sanpham_tbl` WHERE `id_sanpham`={$id_sanpham} LIMIT 1";
	$query = mysqli_query($connect,$sql);
	$row = mysqli_fetch_array($query);
	$found = array();
	if($row){
		$new_product = array(array('tensanpham'=>$row['tensanpham'],'id_sanpham'=>$row['id_sanpham'],'soluong'=>$soluong,'giasanpham'=>$row['giasanpham'],'hinhanh'=>$row['hinhanh'],'masanpham'=>$row['masanpham']));
		//kiemtra session gio hang ton tai
		if(!empty($_SESSION['cart'])){
			foreach($_SESSION['cart'] as $key=>$cart_item){
				if($cart_item['id_sanpham'] == $new_product[0]['id_sanpham'])
				{
					$_SESSION['cart'][$key]['soluong'] += $soluong;
					$found = array('trung');
					
				}else{
					
				}
			}
			if(in_array('trung', $found)){
				header('Location: tatcasanpham.html');
			}else{
				$_SESSION['cart'] = array_merge($_SESSION['cart'],$new_product) ;
				header('Location: tatcasanpham.html');
			}
			// if(!empty($found))
			// 	{
			// 		$_SESSION['cart'] = array_merge($_SESSION['cart'],$new_product) ;
			// 		header('Location: ?module=home');
			// 	}
			// else{header('Location: ?module=home');}
		}else
		{
			$_SESSION['cart'] = $new_product;
			header('Location: tatcasanpham.html');
		}
		
		
	}
	
}
	
?>