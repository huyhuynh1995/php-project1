<center><h1>Thêm nhân sự</h1></center>
<div style = "width:200px;margin: 20px auto;">
	<form action="" method="POST">
	<div class="ten" style="margin:5px 0;">
		<label for="tennhansu">Tên nhân sự: </label><br>
		<input style="width:100%; height:25px;" type="text" name="tennhansu" id="tennhansu">
	</div>
	<div class="username" style="margin:5px 0;">
		<label for="tendangnhap">Tên đăng nhập: </label><br>
		<input style="width:100%; height:25px;" type="text" name="tendangnhap" id="tendangnhap">
	</div>
	<div class="pass" style="margin:5px 0;">
		<label for="pass">Mật khẩu: </label><br>
		<input style="width:100%; height:25px;" type="password" name="matkhau" id="pass">
	</div>
	<div class="vitri" style="margin:5px 0;">
		<label for="vitri" >Vị trí: </label><br>
		<select name="vitri" id="vitri" style="height: 24px;">
			<option value="">---Chọn---</option>
			<option value="admin">Admin</option>
			<option value="ketoan">Kế toán</option>
		</select>
	</div>
	<br>
	<input style="margin-left:70px;padding: 3px 10px" type="submit" name="themnhansu" value="THÊM">
</form>
</div>
<?php
if(isset($_POST['themnhansu'])){
	$tennhansu = $_POST['tennhansu'];
	$tendangnhap = $_POST['tendangnhap'];
	$matkhau = md5($_POST['matkhau']);
	$vitri = $_POST['vitri'];
	$sql = "INSERT INTO `admin_tbl`(`tennhansu`,`tendangnhap`,`matkhau`,`vitri`) VALUES('{$tennhansu}','{$tendangnhap}','{$matkhau}','{$vitri}')";
	$query = mysqli_query($connect,$sql);
	if($query){
		header('Location: index.php');
	} 
	else{ echo "Thêm thành viên thất bại";}
}
?>
