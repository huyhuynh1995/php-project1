<?php
session_start();
(int)$id_sanpham = $_GET['id_sanpham'];
$_SESSION['cart_new'] = array();
if(!empty($_SESSION['cart']))
{
	foreach($_SESSION['cart'] as $cart_item)
	{
		if($cart_item['id_sanpham'] != $id_sanpham)
		{
			$product = array(array('tensanpham'=>$cart_item['tensanpham'],'id_sanpham'=>$cart_item['id_sanpham'],'soluong'=>$cart_item['soluong'],'giasanpham'=>$cart_item['giasanpham'],'hinhanh'=>$cart_item['hinhanh'],'masanpham'=>$cart_item['masanpham']));
			$_SESSION['cart_new'] = array_merge($_SESSION['cart_new'], $product);
		}
		
	}
	$_SESSION['cart'] = $_SESSION['cart_new'];
	header('Location: giohang.html');
}
?>