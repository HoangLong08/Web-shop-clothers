<?php
$title = 'Tìm kiếm sản phẩm';
$pathFileStyle = "../filleCss/styleDetailProduct.css";
require '../comom/header.php';

?>
	<main class="main">
		<div class="row">
		<?php 
			$ok = $_GET['q'];
			$sql = "SELECT * FROM `products` WHERE nameProduct LIKE '%$ok%' AND active = '1'";
			require '../comom/cartProduct.php';
		?>
		</div>
		
	</main>
	
	<?php require '../comom/footer.php' ?>

<script src="../filejs/jsFile.js"></script>
</body>

</html>