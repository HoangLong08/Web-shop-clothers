<?php
$title = 'trang chủ';
$pathFileStyle = "../filleCss/styleIndex.css";
require '../comom/header.php';

// print_r($_SESSION['cart']);
?>
<main class="main">
	<section class="slide">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img class="d-block" src="../image/trangchu-silde1.jpg" alt="First slide">
				</div>
				<div class="carousel-item">
					<img class="d-block" src="../image/trangchu-silde2.jpg" alt="Second slide">
				</div>
				<div class="carousel-item">
					<img class="d-block" src="../image/trangchu-silde3.jpg" alt="Third slide">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</section>
	<div class="main-container">
		<div class="row responsive-moblie">
			<div class="col-lg-4 col-md-4 col-12">
				<div class="border mb-2 text-center" style="height: 54px; font-size: 12px;">
					Miễn phí giao hàng toàn quốc <br>
					Với hoá đơn trên 300.000₫
				</div>
				<div class="card">
					<div class="image">
						<img class="card-img-top" src="../image/bst1.jpg" alt="Bộ sưu tập thời trang cao cấp">
						<div class="hover">
							<a class="btn btn-primary" href="thoitrangcaocap.php">Bộ sưu tập</a>
						</div>
					</div>
					<div class="card-body">
						<p class="card-text text-center">Thời trang cao cấp</p>
						<!-- <a href="#" class="btn btn-primary">See Profile</a> -->
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-12">
				<div class="border mb-2 text-center" style="height: 54px; font-size: 12px;">
					Đổi trả sau khi nhận hàng
				</div>
				<div class="card">
					<div class="image">
						<img class="card-img-top" src="../image/bst2.jpg" alt="Bộ sưu tập thời trang nữ">
						<div class="hover">
							<a class="btn btn-primary" href="thoitrangnu.php">Bộ sưu tập</a>
						</div>
					</div>
					<div class="card-body">
						<p class="card-text text-center">Thời trang nữ</p>
						<!-- <a href="#" class="btn btn-primary">See Profile</a> -->
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-4 col-12">
				<div class="border mb-2 text-center" style="height: 54px; font-size: 12px;">
					Tiết kiệm 70% so với giá gốc
				</div>
				<div class="card">
					<div class="image">
						<img class="card-img-top" src="../image/bst3.jpg" alt="Bộ sưu tập thời trang trẻ em">
						<div class="hover">
							<a class="btn btn-primary" href="thoitrangtreem.php">Bộ sưu tập</a>
						</div>
					</div>
					<div class="card-body">
						<p class="card-text text-center">Thời trang trẻ em</p>
						<!-- <a href="#" class="btn btn-primary">See Profile</a> -->
					</div>
				</div>
			</div>
		</div>
		<div class="title-new-product">
			<div class="left-new-product">
				<h3>HÀNG MỚI VỀ</h3>
			</div>
			<div class="left-new-product">
				<a href="#">Xem tất cả</a>
			</div>
		</div>
		<div class="row">
			<?php 
				$sql = "SELECT * FROM products WHERE active <> 0 ORDER BY RAND() LIMIT 4";
				require '../comom/cartProduct.php'
			?>
		</div>
		<div class="title-new-product">
			<div class="left-new-product">
				<h3>SẢN PHÂM NỔI BẬT</h3>
			</div>
			<div class="left-new-product">
				<a href="#">Xem tất cả</a>
			</div>
		</div>
		<div class="row">
			<?php require '../comom/cartProduct.php' ?>
		</div>
		<div class="title-new-product">
			<div class="left-new-product">
				<h3>SẢN PHẨM GIẢM GIÁ</h3>
			</div>
			<div class="left-new-product">
				<a href="#">Xem tất cả</a>
			</div>
		</div>
		<div class="row">
		
			<?php 
				$sql = "SELECT * FROM products WHERE fashionID = 'TTCC' AND sale <> 0 AND  active <> 0 ORDER BY RAND() LIMIT 4";
				require '../comom/saleCartProduct.php'
			?>
			
		</div>
	</div>
</main>

<?php require '../comom/footer.php' ?>

<script src="../filejs/jsFile.js"></script>
</body>

</html>