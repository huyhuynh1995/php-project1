<?php
	$user = $_GET['user'];
	$sql = "SELECT * FROM `user_tbl` WHERE `tendangnhap`='{$user}'";
	$query = mysqli_query($connect,$sql);
?>
<div class="form-doimatkhau" style="width:900px;">
	<center><h1>Đổi mật khẩu</h1></center>
	<form action="" method="POST" style="width:300px; margin: 20px auto;padding-left:120px">
		<div class="matkhaucu">
			<div class="label">
				<label for="matkhaucu">Mật khẩu cũ: </label>
			</div>
			<div class="nhap">
				<input type="password" name="matkhaucu" id="matkhaucu" style="padding: 3px 0;height: 15px;border-radius: 5px;">
			</div>
		</div>
		<br>
		<div class="matkhaumoi">
			<div class="label">
				<label for="matkhaumoi">Mật khẩu mới: </label>
			</div>
			<div class="nhap">
				<input type="password" name="matkhaumoi" id="matkhaumoi" style="padding: 3px 0;height: 15px;border-radius: 5px;">
			</div>
		</div>
		<br>
		<input type="submit" name="doimatkhau" value="ĐỔI" style="margin-left: 33px;padding: 10px 33px;border-radius: 10px;border: none;background: #33CC99;color:white;font-weight: bold;cursor: pointer;">
	</form>
</div>
<?php
	if(isset($_POST['doimatkhau']))
	{
		$matkhaucu = md5($_POST['matkhaucu']);
		$matkhaumoi = md5($_POST['matkhaumoi']);
		while($row=mysqli_fetch_assoc($query)){
			if($matkhaucu = $row['matkhau']){
				$sql_update = "UPDATE `user_tbl` SET `matkhau`='{$matkhaumoi}'";
				header('Location: dangnhap.html');
			}else{
				echo "Mật khẩu cũ bạn nhập không chính xác";
			}
		}
	}
?>