<?php
$title = 'sản phẩm yêu thích';
$pathFileStyle = "../filleCss/styleLoveProduct.css";
require '../comom/header.php';
$tmp  = $_SESSION['idUser'];
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
						<h3>Sản Phẩm Yêu Thích</h3>
						<p>Hãy <i class="far fa-heart"></i> sản phẩm bạn yêu thích để xem thuận tiện hơn</p>
						<hr class="my-4">
					</div>
					<div class="row">
						<!-- <div class="col-lg-4 col-md-6  col-12">
							<form method="POST" action="../user/process.php">
								<div class="card">
									<div class="image">
										<img class="card-img-top" src="https://storage.googleapis.com/cdn.nhanh.vn/store2/69300/bn/sb_1586790675_105.jpg" alt="Card image">
										<div class="hover">
											<a href="detailProduct.php?id=<?php echo $row['ID'] ?>" class="btn btn-primary">xem thêm</a>
											<input type="hidden" name="hidden-img" value="<?php echo $row['Image1'] ?>">
											<input type="hidden" name="hidden-name" value="<?php echo $row['Name'] ?>">
											<input type="hidden" name="hidden-price" value="<?php echo $row['Price'] ?>">
											<button type="submit" name="add-to-card" class="btn btn-primary">thêm vào giỏ</button>
										</div>
									</div>
									<div class="card-body">
										<p class="card-text text-left border-bottom">quần kaki</p>
										<p class="card-text text-right">100000</p>
										<div class="d-flex justify-content-between mt-2">
											<a href="thanhtoan.php" class="btn btn-primary">
												Mua ngay
											</a>
											<button type="submit" name="add-to-heart" class="btn btn-primary">
												<i class="fas fa-heart"></i>
											</button>
										</div>
									</div>
								</div>
							</form>
						</div> -->
						<?php 
								$sql2 = "SELECT * FROM lovepro where idCustomer='$tmp'";
								$run_c = mysqli_query($conn,$sql2);
								while($row_c = mysqli_fetch_array($run_c)){
									$ok = $row_c['idpro'];
									$sql = "SELECT * FROM products where productID='$ok'";
									require '../comom/cartProduct.php';
								}
						
						?>
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