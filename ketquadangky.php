<?php
include('connectDB.php');
$token = $_GET['token'];
$sql = "SELECT * FROM `user_tbl`";
$query = mysqli_query($connect,$sql) ;
while($row=mysqli_fetch_assoc($query)){
	if($row['token'] == $token){
		$sql_update = "UPDATE `user_tbl` SET `trangthai`=1 WHERE `token`='{$token}'";
		if(mysqli_query($connect,$sql_update))
		{
		header('Location: dangnhap.php');
		}
	}
}
?>