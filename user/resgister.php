<?php
$title = 'đăng ký';
$pathFileStyle = "../filleCss/styleResgister.css";
require '../comom/header.php';


$nameValue        = "";
$emailValue       = "";
$passValue        = "";
$comfirmPassValue = "";
$phoneValue       = "";

$nameErr        	= "";
$emailErr       	= "";
$passErr        	= "";
$comfirmPassErr 	= "";
$phoneErr       	= "";
if(isset($_POST['submitResgister'])){
	$nameValue        = trim($_POST['exampleInputName']);
	$emailValue       = trim($_POST['exampleInputEmail']);
	$passValue        = trim(($_POST['exampleInputPassword']));
	$comfirmPassValue = trim(($_POST['exampleInputComfirmPassword']));
	$phoneValue       = trim($_POST['exampleInputPhone']);
	
	if(empty($nameValue)){
		$nameErr = "Vui lòng nhập tên của bạn";
	}else{
		if(strlen($nameValue) > 12){
			$nameErr = "Tên của bạn không dài quá 12 ký tự";
		}
	}

	if(empty($emailValue)){
		$emailErr = "Vui lòng nhập tên của bạn";
	}else{	
		if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$emailValue)){
			$emailErr = "Email không hợp lệ";
		}else{

		}
	}
	if(empty($passValue)){
		$passErr = "Vui lòng nhập mật khẩu của bạn";
	}else{
		
	}
	if(empty($comfirmPassValue)){
		$comfirmPassErr = "Vui lòng nhập mật khẩu lại của bạn";
	}
	if($passValue !== $comfirmPassValue){
		$comfirmPassErr = "Mật khẩu không khớp";
	}
	if(empty($phoneValue)){
		$phoneErr = "Vui lòng nhập số điện thoại của bạn";
	}else{
		if(!preg_match("/(84|0[3|5|7|8|9])+([0-9]{8})\b/", $phoneValue)){
			$phoneErr = "You Entered An Invalid Phone Format";
		}else{
			$phoneErr = "";
		}
	}
	$sql = "INSERT INTO `customer` (`customerID`, `username`, `email`, `password`,`phone`, `thanhPho`, `quanHuyen`, `diaChiChiTiet`)
										VALUES (NULL, '".$nameValue."', '".$emailValue."', '".md5($passValue)."','".$phoneValue."' ,'', '', '');";
										//echo $sql;
	$result = executeQuery($conn, $sql);
	
}

?>
<main class="mainLogin">
	<div class="fromLogin">
		<div class="icon-user">
			<img src="../image/iconUser.png" alt="IconUser">
		</div>
		<form method="POST">
			<div class="form-group">
				<label for="exampleInputName">Name</label>
				<input type="text" class="form-control" name="exampleInputName" id="exampleInputName" placeholder="Enter name">
				<small id="nameHelp" class="form-text text-muted"><?php echo $nameErr; ?></small>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Email</label>
				<input type="email" class="form-control" name="exampleInputEmail" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter email">
				<small id="emailHelp" class="form-text text-muted"><?php echo $emailErr; ?></small>
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Password</label>
				<input type="password" class="form-control" name="exampleInputPassword" id="exampleInputPassword" placeholder="Enter password">
				<small id="passlHelp" class="form-text text-muted"><?php echo $passErr ?></small>
			</div>
			<div class="form-group">
				<label for="exampleInputComfirmPassword">Comfirm Password</label>
				<input type="password" class="form-control" name="exampleInputComfirmPassword" id="exampleInputComfirmPassword" placeholder="Enter comfirm password">
				<small id="comfirmPassHelp" class="form-text text-muted"><?php echo $comfirmPassErr; ?></small>
			</div>
			<div class="form-group">
				<label for="exampleInputPhone">Phone</label>
				<input type="text" class="form-control" name="exampleInputPhone" id="exampleInputPhone" placeholder="Enter phone">
				<small id="phoneHelp" class="form-text text-muted"><?php echo $phoneErr; ?></small>
			</div>
			<div class="btn-login text-center mb-4">
				<button type="submit" class="btn btn-primary" name="submitResgister" id="submitResgister">Đăng ký</button>
			</div>
		</form>
	</div>
</main>
<?php require '../comom/footer.php' ?>

<script src="../filejs/jsFile.js"></script>
</body>

</html>