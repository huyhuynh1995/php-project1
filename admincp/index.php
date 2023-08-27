<?php
session_start();
if($_SESSION['admin'] == true || $_SESSION['ketoan'] == true){
	header('Location: dashboard.php');
}else{
	header('Location: login.php');
}
?>

