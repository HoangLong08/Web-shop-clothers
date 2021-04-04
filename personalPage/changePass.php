<?php
$title = 'thay đổi tài khoản';
$pathFileStyle = "../filleCss/styleProfile.css";
require '../comom/header.php';
$checkPassOld = true;
$errPassOld = "";
$errPassNew = "";
$errPassConfirm = "";
if(isset($_POST['submitChangePass'])){

	$resPassOld = executeQuery($conn, "SELECT password FROM customer WHERE customerID = '".$_SESSION['idUser']."'");
	$rowCheckPassOld = mysqli_fetch_array($resPassOld);
	//echo $resCheckPassOld['password'];
	if(empty($_POST['editPass'])){
		$checkPassOld = false;
		$errPassOld = "Vui lòng nhập mật khẩu cũ của bạn";
	}
	if(empty($_POST['newPass'])){
		$checkPassOld = false;
		$errPassNew = "Vui lòng nhập mật khẩu mới của bạn";
	}
	if(empty($_POST['confirmPass'])){
		$checkPassOld = false;
		$errPassConfirm = "Vui lòng xác nhận lại mật khẩu của bạn";
	}
	if($_POST['confirmPass'] !== $_POST['newPass']){
		$checkPassOld = false;
		$errPassConfirm = "Mật khẩu không khớp";
	}

	if($rowCheckPassOld['password'] != md5($_POST['editPass'])){
		$checkPassOld = false;
		echo "<script type='text/javascript'>
					window.onload = function(){
						alert('Sai mật khẩu vui lòng nhập lại!');
					}
				</script>";
	}
	if($checkPassOld == true){
		$resUpdatePass = executeQuery($conn, "UPDATE customer SET password = '".md5($_POST['newPass'])."' WHERE customerID = '".$_SESSION['idUser']."'");
		//$rowUpdatePass = mysqli_fetch_array($resUpdatePass);
		echo "<script type='text/javascript'>
					window.onload = function(){
						alert('Update mật khẩu thành công!');
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
						<h3>THAY ĐỔI MẬT KHẨU</h3>
						<p>Bạn nên cập nhập mật khẩu thường xuyên vì lý do bảo mật</p>
						<hr class="my-4">
					</div>
					<form  method="POST">
						<div class="form-group">
							<label for="editPass">Mật khẩu cũ</label>
							<input type="text" class="form-control" id="editPass" name="editPass">
							<small id="passlHelp" class="form-text text-muted"><?php echo $errPassOld ?></small>
						</div>
						<div class="form-group">
							<label for="newPass">Mật khẩu mới </label>
							<input type="text" class="form-control" id="newPass" name="newPass">
							<small id="newPasslHelp" class="form-text text-muted"><?php echo $errPassNew ?></small>
						</div>
						<div class="form-group">
							<label for="confirmPass">Xác nhận mật khẩu</label>
							<input type="text" class="form-control" id="confirmPass" name="confirmPass">
							<small id="confirmPasslHelp" class="form-text text-muted"><?php echo $errPassConfirm ?></small>
						</div>
						<div class="text-center">
							<button class="btn btn-primary" name="submitChangePass">Cập nhật</button>
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