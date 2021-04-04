<?php
require '../functionPhp/connect.php';
$title = 'lịch sử mua hàng';
$pathFileStyle = "../filleCss/styleProfile.css";
require '../comom/header.php';
$u = '';
$idUser = "";
if (isset($_SESSION['loginUser'])) {
	$u = $_SESSION['loginUser'];
	$idUser = 	$_SESSION['idUser'];
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
						<h3>Lịch sử đơn hàng</h3>
						<p>Hãy mua nhiều hơn nào</p>
						<hr class="my-4">
					</div>
					<div class="container-table">
						<table class="table">
							<thead>
								<th>Mã đơn hàng</th>
								<th>Ngày</th>
								<th>Tổng đơn</th>
								<th>Trạng thái</th>
								<th>Action</th>
							</thead>
							<tbody>

								<?php
								$get_order = "select * from toorder where idCustomer=$idUser";
								$run_order = mysqli_query($conn, $get_order);
								while ($row_order = mysqli_fetch_array($run_order)) {
									$id_or = $row_order['id'];
									$tongDon = 0;
									$code = "";
									$status = "";
									$name = "";
									$phone = "";
									$address = "";
									$email = "";
									$list_id_pro = [];
									$list_qua_pro = [];
									$date = $row_order['date'];
									$get_detail = "select * from orderproduct where id=$id_or";
									$run_detail = mysqli_query($conn, $get_detail);
									while ($row_detail = mysqli_fetch_array($run_detail)) {
										$tongDon += $row_detail['price'];
										$status =  $row_detail['status'];
										$code .= $row_detail['orderID'];
										$name = $row_detail['name'];
										$phone =  $row_detail['phone'];
										$address =  $row_detail['address'];
										$email =  $row_detail['email'];
										array_push($list_id_pro, $row_detail['productID']);
										array_push($list_qua_pro, $row_detail['quantity']);
									}
								?>
									
									<tr style="background-color:#ffcccc;">
										<td><?php echo $code ?></td>
										<td><?php echo $date ?></td>
										<td> <?php echo $tongDon ?> </td>
										<td> <?php echo $status ?> </td>
										<td>
											<button  onclick="clickRender(<?= $id_or; ?>)" class="btn btn-primary">Xem chi tiết</button>
										</td>
										
									</tr>
									<tr class="<?='renderOrderDetail'.$id_or?>  activeRender" rowspan="5">
										<td colspan="5">
											<!-- <div class="row">
												<div class="col-md-6"></div>
												<div class="col-md-6"></div>
											</div> -->	
											<table class="table">
												<thead style="display: none;">
													<th>

													</th>
													<th></th>
												</thead>
												<tbody border="none">
													<tr >
														<td colspan="2">THÔNG TIN ĐƠN HÀNG:</td>
													</tr>
													<tr>
														<td colspan="2">Họ tên: <?php echo $name ?></td>
													</tr>
													<tr>
														<td colspan="2">Điện thoại: <?php echo $phone ?></td>
													</tr>
													<tr>
														<td colspan="2">Email: <?php echo $email ?></td>
													</tr>
													<tr>
														<td>Địa chỉ: <?php echo $address ?></td>
													</tr>
													<tr>
														<td colspan="2">Hình thức thanh toán: Thanh toán online</td>
													</tr>
													<tr>
														<td colspan="2">
															<table style="width: 100%;">
																<thead>
																	<th>Ảnh</th>
																	<th>Tên Sản phẩm</th>
																	<th>Số lượng</th>
																	<th>Đơn giá</th>
																	<th>Thành tiền</th>
																</thead>
																<tbody>
																<?php 
																	
																	for($i =0 ; $i < count($list_id_pro); $i++){
																		$tmp = $list_id_pro[$i];
																	
																		$get_ok = "select * from products where productID='$tmp'";
																		$gia = 0;
																		$run_ok = mysqli_query($conn, $get_ok);
																		$img = "../image/imageProduct/";
																		$na = "";
																		$qua = "";
																		$qua = $list_qua_pro[$i];
																		while ($row_ok = mysqli_fetch_array($run_ok)) {
																			$img .= $row_ok['imageOne'];
																			$na = $row_ok['nameProduct'];
																			$gia = $row_ok['priceProduct'];
																		}
																		
																		$gia= $gia*$qua;
																		?>
																			<tr>
																			<td class="cart-img">
																				<img src="<?php echo $img ?>" alt="">
																			</td>
																			<td>
																				<?php echo $na ?>
																			</td>
																			<td> <?php echo $qua ?> </td>
																			<td> <?php echo $gia ?>	</td>
																			<td><?php echo $gia ?>	 </td>
																			</tr>
																		<?php
																	}
																	
																?>
																</tbody>
															</table>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								<?php
								}
								?>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>

<?php require '../comom/footer.php' ?>

<script src="../filejs/jsFile.js"></script>
</body>

</html>