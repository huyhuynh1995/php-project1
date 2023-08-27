<?php
include('connectDB.php');
include('inc/header.php');

?>
<?php
	
	$mod = !empty($_GET['module'])?$_GET['module']:'home';
	$path = "pages/{$mod}.php";
	if(file_exists($path)){
		require $path;
	}else{
		require "pages/404.php";
	}
?>
<?php
include('inc/footer.php');
?>
		