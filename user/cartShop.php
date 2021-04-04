<?php
$title = 'giỏ hàng';
$pathFileStyle = "../filleCss/styleCartShop.css";
require '../comom/header.php';
$u = '';
$checkLogin = false;
if (isset($_SESSION['loginUser'])) {
	$checkLogin = true;
	$u = $_SESSION['loginUser'];
}
?>
<main>
	<div class="content-main">
		<div class="row">
			<div class="col-md-8">
				<div class="cart-title">
					<h3>GIỎ HÀNG</h3>
				</div>
				
				<div class="container-table">
					<table class="table">
						<tbody>
							<?php
							$countCart = $totalMoeny = 0;
							if (isset($_SESSION['cart']) && $checkLogin === false) {
								
								foreach ($_SESSION['cart'] as $key => $value) {
									$countCart++;
									$totalMoeny += $value['item_price'];
							?>
									<tr>
										<td>
											<div class="cart-img">
												<img src="../image/imageProduct/<?php echo $value['item_img'];  ?>" alt="">
											</div>
										</td>
										<td>
											<div class="cart-name">
												<div>
													<p><?php echo $value['item_name'] ?></p>
												</div>
												<div class="buttons_added">
													
													<div> Số lượng: 
													<?php echo $value['item_count'] ?>
													</div>
													
												</div>
											</div>
										</td>
										<td>
											<div class="cart-price">
												<p><?php echo  number_format($value['item_price'], 0, '', ',') ?></p>
											</div>
										</td>
										<td>
											<div class="cart-delete">
												<form action="process.php" method="POST">
													<input type="hidden" name="hidden-img" value="<?php echo $value['item_img'] ?>">
													<input type="hidden" name="hidden-name" value="<?php echo $value['item_name'] ?>">
													<input type="hidden" name="hidden-price" value="<?php echo $value['item_price'] ?>">
													<button name="remove-item" class="btn btn-primary">X</button>
												</form>
											</div>
										</td>
									</tr>
								<?php
								}
							} elseif (isset($_SESSION['cart']) && $checkLogin === true) {
								$countCart = 0;
								foreach ($_SESSION['cart'] as $key => $value) {
									$countCart++;
									$GLOBALS['totalMoeny'] += $value['item_price'] * $value['item_count'];
								?>
									<tr>
										<td>
											<div class="cart-img">
												<img src="../image/imageProduct/<?php echo $value['item_img'];  ?>" alt="">
											</div>
										</td>
										<td>
											<div class="cart-name">
												<div>
													<p><?php echo $value['item_name'] ?></p>
												</div>
												<div class="buttons_added">
													<div> Số lượng: 
														<?php echo $value['item_count'] ?>
													</div>
												</div>
											</div>				
										</td>
										<td>
											<div class="cart-price">
												<p><?php echo number_format($value['item_price'], 0, '', ',') ?></p>
											</div>
										</td>
										<td>
											<div class="cart-delete">
												<form action="process.php" method="POST">
													<input type="hidden" name="hidden-img" value="<?php echo $value['item_img'] ?>">
													<input type="hidden" name="hidden-name" value="<?php echo $value['item_name'] ?>">
													<input type="hidden" name="hidden-price" value="<?php echo $value['item_price'] ?>">
													<button name="remove-item" class="btn btn-primary">X</button>
												</form>
											</div>
										</td>
									</tr>
							<?php
								}
							}
							if ($countCart === 0) {
								echo "Giỏ hàng của bạn hiện tại không có sản phẩm nào !";
							}

							?>
						</tbody>
					</table>
				</div>

			</div>
			<div class="col-md-4">
				<h3>TÍNH TIỀN</h3>
				<div class="temporarily-charged">
					<div class="left">
						<p>Tạm tính</p>
					</div>
					<div class="right">
						<p id="totalPriceProvisional"><?php echo number_format($totalMoeny, 0, '', ','); ?></p>
					</div>
				</div>
				<div class="temporarily-charged">
					<div class="left">
						<p>Thành tiền</p>
					</div>
					<div class="right">
						<p id="totalPrice"><?php echo number_format($totalMoeny, 0, '', ','); ?></p>
					</div>
				</div>
				<div class="text-center">
					<a href="index.php" class="btn btn-primary">Tiếp tục mua hàng</a>
					<?php
					if ($u) {
						echo "<a href='thanhtoan.php' class='btn btn-primary'>Thanh toán</a>";
					} else {
						echo "<button id='clickLoginCartShop' class='btn btn-primary'>Thanh toán</button>";
					}
					?>
				</div>
			</div>
		</div>

	</div>
</main>

<?php require '../comom/footer.php' ?>

<script src="../filejs/jsFile.js"></script>
</body>

</html>