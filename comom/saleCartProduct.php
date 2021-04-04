<?php
$result = executeQuery($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
?>
	<div class="col-lg-3 col-md-6 col-sm-12 col-12">
		<form method="POST" action="../user/process.php">
			<div class="card  <?= ($row['quantity'] == 0) ? 'opacityCard' : null; ?>">
				<div class="image">
					<img class="card-img-top" src="../image/imageProduct/<?php echo $row['imageOne'] ?>" alt="Card image">
					<div class="hover">
						<a href="detailProduct.php?productID=<?php echo $row['productID'] ?>" class="btn btn-primary">xem thêm</a>
						<input type="hidden" name="hidden-img" value="<?php echo $row['imageOne'] ?>">
						<input type="hidden" name="hidden-name" value="<?php echo $row['nameProduct'] ?>">
						<input type="hidden" name="hidden-price" value="<?php echo $row['priceProduct'] ?>">
						<input type="hidden" name="hidden-quantity" value="<?php echo $row['quantity'] ?>">
						<input type="hidden" name="hidden-productID" value="<?php echo $row['productID'] ?>">
						<!-- <button type="submit" name="add-to-card-index" class="btn btn-primary">thêm vào giỏ</button> -->
					</div>
				</div>
				<div class="card-body">
					<p class="card-text text-left border-bottom"><?php echo $row['nameProduct'] ?></p>
					<div class="price">
						<p class="card-text text-right">Giá gốc: <?php echo number_format($row['priceProduct'], 0, '', ',') ." VNĐ" ?></p>
						<p class="card-text text-right"><?php echo number_format(($row['priceProduct'] *(100 - $row['sale'])) / 100, 0, '', ',') ." VNĐ" ?></p>
					</div>
					<div class="d-flex justify-content-between mt-2">
						<a href="thanhtoan.php" class="btn btn-primary">
							Mua ngay
						</a>
						<button type="submit" name="add-to-heart" class="btn btn-primary clickLoginCartProduct">
							<i class="fas fa-heart"></i>
						</button>
					</div>
				</div>
				<div class="sale" >
					Giảm <?php echo $row['sale'] ?>%
				</div>
				<div class="hethang" style="display: <?= ($row['quantity'] == 0) ? 'block' : 'none'; ?>;">
					<h4>HẾT HÀNG</h4>
				</div>
			</div>
		</form>
	</div>
<?php
}
?>