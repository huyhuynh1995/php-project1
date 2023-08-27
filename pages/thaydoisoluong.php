<?php
session_start();
(int)$id = $_GET['id'];
$act = $_GET['act'];
$_SESSION['cart_new'] = array();
foreach($_SESSION['cart'] as $cart_item)
{
	if($cart_item['id_sanpham'] != $id)
	{
		
		$product = array(array('tensanpham'=>$cart_item['tensanpham'],'id_sanpham'=>$cart_item['id_sanpham'],'soluong'=>$cart_item['soluong'],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']));
		$_SESSION['cart_new'] = array_merge($_SESSION['cart_new'],$product);
	}
	else{
		if($act == "cong")
		{
			$product_change = array(array('tensanpham'=>$cart_item['tensanpham'],'id_sanpham'=>$cart_item['id_sanpham'],'soluong'=>$cart_item['soluong']+1,'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']));
			
		}
		elseif($act == "tru")
		{
			if((int)$cart_item['soluong']>1)
			{
				$product_change = array(array('tensanpham'=>$cart_item['tensanpham'],'id_sanpham'=>$cart_item['id_sanpham'],'soluong'=>$cart_item['soluong']-1,'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']));
				
			}else{
				$product_change = array(array('tensanpham'=>$cart_item['tensanpham'],'id_sanpham'=>$cart_item['id_sanpham'],'soluong'=>1,'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']));
			}
		}else{header('Location: giohang.html');}
	}
}
$_SESSION['cart'] = array_merge($_SESSION['cart_new'],$product_change);
header('Location: giohang.html');

?>