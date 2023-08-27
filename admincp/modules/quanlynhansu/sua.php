<?php
$id = $_GET['id'];
$sql="SELECT * FROM `admin_tbl` WHERE `id_admin`={$id}";
$query = mysqli_query($connect,$sql);
?>
<center><h1>Sửa vai trò nhân sự</h1></center>
<div style = "width:200px;margin: 20px auto;">
	<form action="" method="POST">
		<?php while($row=mysqli_fetch_array($query)){ ?>
		<div class="ten" style="margin:5px 0;">
			<label for="tennhansu">Tên nhân sự: </label><br>
			<input style="width:100%; height:25px;" type="text" name="tennhansu" id="tennhansu" value="<?= $row['tennhansu'] ?>">
		</div>
		<div class="vitri" style="margin:5px 0;">
			<label for="vitri" >Vị trí: </label><br>
			<select name="vitri" id="vitri" style="height: 24px;">
				<option value="">---Chọn---</option>
				<option value="admin" <?php if($row['vitri'] == "admin") echo "selected" ?>>Admin</option>
				<option value="ketoan" <?php if($row['vitri'] == "ketoan") echo "selected" ?>>Kế toán</option>
			</select>
		</div>
		<?php } ?>
		<br>
		<input style="margin-left:70px;padding: 3px 10px;cursor: pointer;" type="submit" name="update" value="CẬP NHẬT">
</form>
</div>
<?php
if(isset($_POST['update'])){
	$tennhansu = $_POST['tennhansu'];
	$vitri = $_POST['vitri'];
	$sql_update = "UPDATE `admin_tbl` SET `tennhansu` = '{$tennhansu}',`vitri`='{$vitri}'";
	$query_update = mysqli_query($connect,$sql_update);
	if($query_update){
		header('Location: index.php');
	}else{
		echo "Cập nhật không thành công";
	}
}
?>
