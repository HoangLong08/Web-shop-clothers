<?php
$title = 'danh sách các sản phẩm';
$pathFileStyle = "../filleCss/styleListProduct.css";
$pathFileStyle = "../filleCss/styleThoiTrangCaoCap.css";
require '../comom/header.php';
//echo $_GET['fashion'];
?>

<main>
	<div class="row">
		<?php 
			$sql = "SELECT * FROM products WHERE active <> 0 AND fashionID = '".$_GET['fashion']."'";
			require '../comom/cartProduct.php'; 
		?>
	</div>
</main>


<?php require '../comom/footer.php' ?>
<script src="../filejs/jsFile.js"></script>
</body>

</html>