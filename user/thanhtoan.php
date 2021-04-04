<?php
$title = 'thanh toán';
$pathFileStyle = "../filleCss/styleThanhToan.css";
require '../comom/header.php';

$countCart = $totalMoney = 0;
$u = '';
$idUser = "";
if(isset($_SESSION['loginUser'])){
	$u = $_SESSION['loginUser'];
	$idUser = 	$_SESSION['idUser'];
}

if(isset($_POST['payment'])){
	$name = $_POST['nameInput'];
	$phone = $_POST['phoneInput'];
	$email = $_POST['emailInput'];
	$address = $_POST['addressInput'];
	$note = $_POST['noteInput'];

	$quantity =  $_POST['quantity'];
	$price =  $_POST['price'];
	$productID =  $_POST['productID'];

	$arr_pro = explode("#", $productID);
	$arr_price = explode("#", $price);
	$arr_quan = explode("#", $quantity);
	$insert_toOrder = "INSERT INTO `toorder` (`id`, `idCustomer`, `date`) VALUES (NULL, '$idUser', current_timestamp());";
	$run_to = mysqli_query($conn,$insert_toOrder);

	$count_toOrder = "SELECT COUNT(*) FROM toorder;";
	$counts = mysqli_query($conn,$count_toOrder);
	$co = mysqli_fetch_array($counts);
	$ok = (int)$co[0];
	for($i = 0;$i<count($arr_pro); $i++){
			$insert_order = "INSERT INTO `orderproduct` (`id`,`orderID`, `quantity`, `price`, `productID`, `customerID`, `status`, `name`, `phone`, `email`, `address`, `note`) VALUES ('$ok',NULL, '$arr_quan[$i]', '$arr_price[$i]', '$arr_pro[$i]', '$idUser', 'Đang chờ xử lý', '$name', '$phone', '$email', '$address', '$note')";
			$run_order = mysqli_query($conn,$insert_order);
	}

	if($run_to){
		echo "<script>window.location.href = 'http://localhost:8666/NguyenTrungMy/user/orderSuccess.php'</script>"; 
		 
	}
}
								
?>
<main>
	<div class="content-main">
		<form method="POST">
			<div class="row">
				<div class="col-md-4 col-12">
					<div class="content-info">
						<h4>
							<span>1</span>
							Thông tin đơn hàng
						</h4>
						<div class="form-group">
							<label for="nameInputCheck">Họ và tên</label>
							<input type="text" class="form-control" id="nameInputCheck" name="nameInput" required>
							<small id="nameHelp" class="form-text text-muted"></small>
						</div>
						<div class="form-group email-phone">
							<div class="email-left">
								<label for="emailInputEmail">Email </label>
								<input type="email" class="form-control" id="emailInputEmail" name="emailInput" required>
								<small id="emailHelp" class="form-text text-muted"></small>
							</div>
							<div class="phone-right">
								<label for="phoneInputEmail">Điện thoại</label>
								<input type="text" class="form-control" id="phoneInputEmail"c name="phoneInput" required>
								<small id="emailHelp" class="form-text text-muted"></small>
							</div>
						</div>
						
						<!-- <div class="form-group city-district">
							<div class="city-left">
								<label for="exampleInputEmail1">Tỉnh/Thành phố</label>
								<select name="" id="city" class="form-control">
									<option value="">Chọn Tỉnh/ Thành phố</option>
								</select>
								<small id="emailHelp" class="form-text text-muted"></small>
							</div>
							<div class="district-right">
								<label for="exampleInputEmail1">Quận/ Huyện</label>
								<select name="" id="district" class="form-control">
									<option value="" default>Chọn Quận/ Huyện</option>		
								</select>
								<small id="emailHelp" class="form-text text-muted"></small>
							</div>
						</div>
						
						<div class="form-group">
							<label for="exampleInputEmail1">Phường/ Xã</label>
								<select name="" id="ward" class="form-control">
									<option value="">Chọn Tỉnh/ Thành phố</option>
								</select>
								
							<small id="emailHelp" class="form-text text-muted"></small>
						</div> -->
						<div class="form-group">
							<label for="addressInput">Địa chỉ</label>
							<input type="text" class="form-control" id="addressInput" name="addressInput" required>
							<small id="emailHelp" class="form-text text-muted"></small>
						</div>
						<div class="form-group">
							<label for="noteInput">Ghi chú</label>
							<textarea  id="noteInput" cols="50" rows="4" name="noteInput"></textarea>
							
						</div>
						
					</div>

				</div>
				<div class="col-md-4 col-12">
					<h4>
						<span>2</span>
						Phương thức tính toán
					</h4>
					<div>
						
						<input type="radio" name="methodPayment" checked id="checkShowTextFalse"> 
						<label for="checkShowTextFalse">Thanh toán tiền mặt khi nhận hàng (COD)</label>
					</div>
					<div class="paymentBank">
						<input type="radio" name="methodPayment" id="checkShowTextTrue"> 
						<label for="checkShowTextTrue">Chuyển khoản qua ngân hàng</label>
						<div class="show-text">
							<p>Cám ơn bạn đã mua hàng thành công cùng Trung Mỹ</p>
							<p>Đơn hàng của bạn được tự động xác nhận và chuyển cho cho bên giao hàng.</p>
							<p>Vui lòng chuyển khoản về tài khoản sau:</p>
							<p>Vietcombank: 123456789 chủ TK Trung Mỹ</p>
							<p><b>Nội dung: Mã/ID đơn hàng</b></p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-12">
					<h4>
						<span>3</span>
						Thông tin giỏ hàng
					</h4>
					<div class="info-shop-cart">
						<table class="table">
							<thead>
								<th>Tên sản phẩm</th>
								<th>Số lượng</th>
								<th>Giá</th>
							</thead>
							<tbody>
								<?php 
								$tmp1 = "";
								$tmp2 = "";
								$tmp3 = "";
								$countCart = $totalMoney = 0;
								if(isset($_SESSION['cart'])){
									foreach($_SESSION['cart'] as $key => $value){
										$countCart++;
										$totalMoney += $value['item_price'] * $value['item_count'];
										$tmp1 .= $value['item_count']."#";
										$tmp2 .=  $value['item_price']."#";
										$tmp3 .= $value['item_productID']."#";
								?>

							
								
								<tr>
									<td><?php echo $value['item_name'] ?></td>
									<td><?php echo $value['item_count'] ?></td>
									<td><?php echo number_format($value['item_price'] * $value['item_count'], 0, '', ',') ?></td>
								</tr>
								<?php
									}
								}
								?>

								<input type="hidden" name="quantity" value="<?php echo $tmp1 ?>">
								<input type="hidden" name="price" value="<?php echo $tmp2 ?>">
								<input type="hidden" name="productID" value="<?php echo $tmp3 ?>">

								<tr>
									<td colspan="2" style="font-weight: bold;">Tạm tính</td>
									<td style="font-weight: bold;"><?php echo number_format($totalMoney, 0, '', ',') ?></td>
								</tr>
								<tr>
									<td colspan="2" style="font-weight: bold;">Phí vận chuyển</td>
									<td style="font-weight: bold;">0</td>
								</tr>
								<tr>
									<td colspan="2" style="font-weight: bold;">Tổng cộng</td>
									<td style="font-weight: bold;"><?php echo number_format($totalMoney, 0, '', ',') ?></td>
								</tr>
							</tbody>
						</table>
						<?php 
							if(!$u){
								echo "Vui lòng <a href='login.php'>Đăng nhập</a> để tiêu điểm tích lũy";
							}
						?>
					</div>
					<div class="btn-shop">
						<a href="../user/index.php" class="btn btn-primary">Tiếp tục mua hàng</a>
						<button type="submit" name="payment" class="btn btn-primary">Tiếp tục thanh toán</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</main>

<?php require '../comom/footer.php' ?>

<script src="../filejs/jsFile.js"></script>
<script>


</script>
</body>

</html>