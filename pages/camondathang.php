<?php
include('mail/sendmail.php');
$mail_dathang = $_SESSION['email-user'];
$link = "http://localhost/projectphp/don-hang-".$_SESSION['madonhang'];
$tieude = "Đơn hàng mới.";
$noidung = "<p>Cảm ơn quý khách đã đặt hàng. Mã đơn hàng của quý khách:</p>".$_SESSION['madonhang'];
$noidung .="<p>Chi tiết đơn hàng: </p>".$link;
$noidung .="<p>Giá trị đơn hàng: </p>".$_SESSION['tongtien']."VNĐ";

$mail = new Mailer();
$mail->maildathang($tieude,$noidung,$mail_dathang); // 1 tham số nữa là $mail_dathang để gửi mail cho KH
?>
<div class="camon" style="margin:5px ">
	<p>Đơn hàng của bạn đã đặt thành công. Chúng tôi sẽ nhanh chóng liên hệ với bạn</p>
</div>
<?php
foreach($_SESSION['cart'] as $cart_item){
	$soluonggiamdi = $cart_item['soluong'];
	$sql = "UPDATE `sanpham_tbl` SET `soluong`=(`soluong`-{$soluonggiamdi}) WHERE `id_sanpham`={$cart_item['id_sanpham']}";
	$query = mysqli_query($connect,$sql);
	if($query){
		unset($_SESSION['cart']);
	}
}
?>

	