<?php
$title = 'thời trang cao cấp';
$pathFileStyle = "../filleCss/styleThoiTrangCaoCap.css";
require '../comom/header.php';
?>
<main class="main">
	<section>
		<div class="container-img">
			<img src="../image/ttcc-slide.jpg" alt="">
		</div>
	</section>
	<section>
		<div class="title-new-product">
			<div class="left-new-product">
				<h3>HÀNG MỚI VỀ</h3>
			</div>
			<div class="left-new-product">
				<a href="../user/listProduct.php?fashion=TTCC">Xem tất cả</a>
			</div>
		</div>
		<div class="row">
			<?php
			$sql = "SELECT * FROM products WHERE fashionID = 'TTCC'  AND active <> 0 ORDER BY RAND() LIMIT 4 ";
			require '../comom/cartProduct.php';
			?>
		</div>
	</section>
	<section>
		<div class="title-new-product">
			<div class="left-new-product">
				<h3>SẢN PHẨM NỔI BẬT</h3>
			</div>
			<div class="left-new-product">
				<a href="../user/listProduct.php?fashion=TTCC">Xem tất cả</a>
			</div>
		</div>
		<div class="row">
			<?php require '../comom/cartProduct.php' ?>
		</div>
	</section>
	<section>
		<div class="title-new-product">
			<div class="left-new-product">
				<h3>SẢN PHẨM GIẢM GIÁ</h3>
			</div>
			<div class="left-new-product">
				<a href="../user/listProduct.php?fashion=TTCC">Xem tất cả</a>
			</div>
		</div>
		<div class="row">
			<?php 
				$sql = "SELECT * FROM products WHERE fashionID = 'TTCC' AND sale <> 0 AND active <> 0 ORDER BY RAND() LIMIT 4";
				require '../comom/saleCartProduct.php'
			?>
		</div>
	</section>

</main>
<?php require '../comom/footer.php' ?>

<script src="../filejs/jsFile.js"></script>
</body>

</html>