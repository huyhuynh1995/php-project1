<?php
	$connect = new mysqli("localhost","root","","hnhshop","3333");
	if($connect -> connect_error)
	{
		echo "Kết nối thất bại".$connect -> connect_error;
		exit();
	}
?>