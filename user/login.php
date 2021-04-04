<?php
ob_start();
$title = 'đăng nhập';
$pathFileStyle = "../filleCss/styleLogin.css";
require '../comom/header.php';
if(!isset($_SESSION)) { 
	session_start(); 
} 
$email 		= '';
$password   = '';

$errorEmail = "";
$errorPass  = "";

$_SESSION['loginUser'] = "";
$_SESSION['idUser']    = "";

$checkValue = true;
$regexEmail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

if (isset($_POST['submitLogin'])) {
	$email = trim($_POST['exampleInputEmail']);
	$password = ($_POST['exampleInputPassword']);
	if(empty($password)){	
		$checkValue = false;
		$errorPass = "Vui lòng nhập mật khẩu của bạn";
		//echo $errorPass;
	}
	if(empty($email)){
		$checkValue = false;
		$errorEmail = "Vui lòng nhập email của bạn";
	}elseif(!preg_match($regexEmail, $email)){
		$checkValue = false;
		$errorEmail = "Email không hơp lệ";
	}
	
	if(empty($email) && empty($password)){
		$checkValue = false;
		$errorEmail = "Vui lòng nhập email của bạn";
		$errorPass = "Vui lòng nhập mật khẩu của bạn";
	}
	$result = executeQuery($conn, "SELECT * FROM customer WHERE email = '$email' AND password = '".md5($password)."'");
	$row = mysqli_fetch_assoc($result);
	
	if($checkValue == true){	
		if (mysqli_num_rows($result) === 1) {
			$_SESSION['loginUser'] = $row['username'];
			$_SESSION['idUser'] = $row['customerID'];
			$errorEmail = "";
			$errorPass  = "";
			header("location:index.php");
		}
		else{
			$errorPass = "Tài Khoản sai ";
		}
	}
	
}
ob_end_flush();
?>
<main class="mainLogin">
	<div class="fromLogin">
		<div class="icon-user">
			<img src="../image/iconUser.png" alt="IconUser">
		</div>
		<form  method="POST">
			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="text" class="form-control" name="exampleInputEmail" id="exampleInputEmail" placeholder="Enter email">
				<small id="emailHelp" class="form-text" style="color: red"><?php if(isset($errorEmail)){echo $errorEmail;} ?></small>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" class="form-control" name="exampleInputPassword" id="exampleInputPassword" placeholder="Password">
				<small id="passwordHelp" class="form-text" style="color: red"><?php if(isset($errorPass)){echo $errorPass; } ?></small>
			</div>
			<div class="btn-login text-center mb-4">
				<button type="submit" class="btn btn-primary" name="submitLogin" id="submitLogin">Đăng nhập</button>
			</div>
			<div class="btn-login text-center d-flex justify-content-between">
				<div>
					<a href="resgister.php">Đăng ký tài khoản</a>
				</div>
				<div>
					<a href="forget.php">Quên mật khẩu</a>
				</div>
			</div>
		</form>
	</div>
</main>
<?php require '../comom/footer.php' ?>

<script src="../filejs/jsFile.js"></script>
</body>

</html>