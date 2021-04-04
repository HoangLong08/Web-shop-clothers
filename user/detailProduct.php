<?php
$title = 'chi tiết sản phẩm';
$pathFileStyle = "../filleCss/styleDetailProduct.css";
require '../comom/header.php';
$productID  =  $_GET['productID'];
$sqlProduct = "SELECT * FROM products WHERE productID = '$productID'";
$resultSQL  = executeQuery($conn, $sqlProduct);
$rowSQL 		= mysqli_fetch_assoc($resultSQL);
$dem = 1;
?>
	<main class="main">
		<section>
			<div class="row">
				<div class="col-md-6 col-12">
					<div class="row">
						<div class="content-small-image col-md-2">
							<div class="small-img">
								<img class="thumbnail" src="../image/imageProduct/<?php echo $rowSQL['imageOne'] ?>" alt="áo cao cấp">
							</div>
							<div class="small-img">
								<img class="thumbnail" src="../image/imageProduct/<?php echo $rowSQL['imageTwo'] ?>" alt="áo cao cấp">
							</div>
							<div class="small-img">
								<img class="thumbnail" src="../image/imageProduct/<?php echo $rowSQL['imageThree'] ?>" alt="áo cao cấp">
							</div>
						</div>
						<div class="col-md-10">
							<div class="content-image-left">
								<div class="big-img">
									<img id="image" src="../image/imageProduct/<?php echo $rowSQL['imageOne'] ?>" alt="áo cao cấp">
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-12">
					<form method="POST" action="process.php">
						<div class="product-info">
							<div class="title-product">
								<h3><?php echo $rowSQL['nameProduct'] ?></h3>
							</div>
							<div class="price-product">
								<p class="text-font"><b>Giá: </b> <?php echo $rowSQL['priceProduct'] ?></p>
							</div>
							<div class="cate-product">
								<p><b>Thể loại: </b>Jumpsuits và set đồ</p>
							</div>
							<div class="trademark-product">
								<p><b>Thương hiệu: </b>Eva De Eva</p>
							</div>
							<div class="trademark-product">
								<p><b>Phong cách: </b>Dịu dàng nữ tính</p>
							</div>
							<div class="des-product">
								<p><b>Mô tả: </b><?php echo $rowSQL['desProduct'] ?></p>
							</div>
							<div class="number-product">
								<div style="margin-right: 10px;">
								<p><b>Số lượng: </b></p>
								</div>
								<div class="buttons_added">
									<input type="hidden" name="hidden-img" value="<?php echo $rowSQL['imageOne'] ?>">
									<input type="hidden" name="hidden-name" value="<?php echo $rowSQL['nameProduct'] ?>">
									<input type="hidden" name="hidden-price" value="<?php echo $rowSQL['priceProduct'] ?>">
									<input type="hidden" name="hidden-quantity" value="<?php echo $rowSQL['quantity'] ?>">
									<input type="hidden" name="hidden-productID" value="<?php echo $rowSQL['productID'] ?>">
									<input class="minus is-form" type="button" value="-">
									<input aria-label="quantity" class="input-qty" max="<?php echo $rowSQL['quantity'] ?>" min="1" name="hidden-count" type="number" value=<?= $dem ?> readonly>
									<input class="plus is-form" type="button" value="+">
								</div>
							</div>
							<div class="policy-product mb-4">
								<div>
									<a href="#">XEM CHÍNH SÁCH TRẢ HÀNG</a>
								</div>
								<p>
									Trả hàng trong vòng 24 - 72h
								</p>
								<p>
									Các hình thức thanh toán linh hoạt(Thu cod, thẻ tín dụng, thẻ ATM, chuyển khoản)
								</p>
								<p>
									Tất cả hàng bán tại Glammie đều được chiếu tia UV diệt khuẩn trước khi gửi đi
								</p>
								<p>
									Chú ý: Không xem hàng, Không đồng kiểm khi giao nhận
								</p>
								<div>
									<a href="#">Hãy đăng ký tài khoản để được hưởng ưu đã lên đến 4% và nhiều chương trình riêng cho khách hàng có tài khoản.</a>
								</div>
							</div>
							<div class="hover">
								<a href="detailProduct.php?productID=<?php echo $rowSQL['productID'] ?>" class="btn btn-primary">xem thêm</a>
							</div>
							<button type="submit" name="add-to-card-index" class="btn btn-primary">THÊM VÀO GIỎ HÀNG</button>
							<button type="submit" name="checkoutDetail" class="btn btn-primary text-center">MUA NGAY</button>
						</div>
					</form>
				</div>
			</div>
		</section>
		<section>
			<div class="title-new-product">
				<div class="left-new-product">
					<h3>CÓ THỂ BẠN QUAN TÂM</h3>
				</div>
				<div class="left-new-product">
					<a href="#">Xem tất cả</a>
				</div>
			</div>
			<div class="row">
				<?php 
				$resultQueryFashion = executeQuery($conn, "SELECT * FROM products  WHERE  active <> 0 AND fashionID = '".$rowSQL['fashionID']."' ORDER BY RAND() LIMIT 4");
				//echo "SELECT * FROM products WHERE fashionID = '".$rowSQL['fashionID']."' LIMIT 4";
				while($row = mysqli_fetch_array($resultQueryFashion)){
				?>
				<div class="col-lg-3 col-md-6 col-sm-12 col-12">
					<div class="card">
						<div class="image">
							<img class="card-img-top" src="../image/imageProduct/<?php echo $row['imageOne'];  ?>" alt="Card image">
							<div class="hover">
								<a href="detailProduct.php?productID=<?php echo $row['productID'];  ?>" class="btn btn-primary">xem thêm</a>
								<button class="btn btn-primary">thêm vào giỏ</button>
							</div>
						</div>
						<div class="card-body">
							<p class="card-text text-left border-bottom"><?php echo $row['nameProduct'];  ?></p>
							<p class="card-text text-right"> <?php echo $row['priceProduct'];  ?></p>
							<div class="d-flex justify-content-between mt-2">
					<a href="detailProduct.php?productID=<?php echo $row['productID'] ?>" class="btn btn-primary">Mua ngay</a>
						<button type="button"  name="add-to-heart" class="btn btn-primary clickLoginCartProduct" >
							<i class="fas fa-heart"></i>
						</button>
					</div>
						</div>
					</div>
				</div>
				<?php
					}
				?>
				
			</div>
		</section>
	</main>
	
	<?php require '../comom/footer.php' ?>
<script>
	function changeImage(e) {
      var path = e.target.src;
      document.getElementById("image").src = path;
    }

    var thumbnailElements = document.getElementsByClassName('thumbnail');
    for (var i = 0; i < thumbnailElements.length; i++) {
      thumbnailElements[i].onclick = changeImage;
    }
</script>
<script src="../filejs/jsFile.js"></script>
</body>

</html>