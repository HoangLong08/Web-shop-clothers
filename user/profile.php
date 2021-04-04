<?php
$title = 'trang cá nhân';
$pathFileStyle = "../filleCss/styleProfile.css";
require '../comom/header.php';
if(isset($_POST['submitProfile'])){
	$name = $_POST['nameEditProfile'];
	$email = $_POST['emailEditProfile'];
	$phone = $_POST['phoneEditProfile'];
	$add = $_POST['addressProfile'];
	$ok = $_SESSION['idUser'];
	$res = executeQuery($conn, "UPDATE `customer` SET `email` = '$email', `phone` = '$phone', `diaChiChiTiet` = '$add' WHERE `customer`.`customerID` = '$ok';");
	if($res){
		echo "<script>
					window.onload = function(){
						alert('Thành công');
					}
				</script>";
	}
}
?>

<main>
	<div class="content-main">
		<div class="row">
			<div class="col-md-4 col-12">
				<?php require '../comom/ulProfile.php' ?>
			</div>
			<div class="col-md-8 col-12">
				<div class="info-user">
					<div class="text-top">
						<h3>Hồ sơ của tôi</h3>
						<p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
						<hr class="my-4">
					</div>
					<form  method="POST">
						<?php 
							$res = executeQuery($conn, "SELECT * FROM customer WHERE customerID = '".$_SESSION['idUser']."'");
							$row = mysqli_fetch_array($res);
						?>
						<div class="form-group">
							<label for="nameEditProfile">Họ và tên</label>
							<input type="text" class="form-control" id="nameEditProfile" name="nameEditProfile" value="<?php echo $row['username'] ?>">
							<small id="nameHelpProfile" class="form-text text-muted"></small>
						</div>
						<div class="form-group">
							<label for="emailEditProfile">Email </label>
							<input type="email" class="form-control" id="emailEditProfile" name="emailEditProfile"  value="<?php echo $row['email'] ?>">
							<small id="emailHelpProfile" class="form-text text-muted"></small>
						</div>
						<div class="form-group">
							<label for="phoneEditProfile">Điện thoại</label>
							<input type="text" class="form-control" id="phoneEditProfile" name="phoneEditProfile" value="<?php echo $row['phone'] ?>">
							<small id="phoneHelpProfile" class="form-text text-muted"></small>
						</div>
						
						<div class="form-group">
							<label for="addressProfile">Địa chỉ chi tiết</label>
							<input type="text" class="form-control" id="addressProfile" name="addressProfile" value="<?php echo $row['diaChiChiTiet'] ?>">
							<small id="emailHelp" class="form-text text-muted"></small>
						</div>
						<div class="text-center">
							<button class="btn btn-primary" type="submit" name="submitProfile">Cập nhật</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</main>

<?php require '../comom/footer.php' ?>

<script src="../filejs/jsFile.js"></script>
</body>

</html>