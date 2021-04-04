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

unset($_SESSION["cart"]);
?>
<main>
	<div class="text-center" style = "padding : 30px;">
	<h4>Cảm ơn bạn đã đặt hàng tại cửa hàng Trung mỹ.</h4>
	<p>đặt hàng thành công</p>
	<a href="../user/index.php" class="btn btn-primary">Tiếp tục mua hàng</a>
	</div>
</main>

<?php require '../comom/footer.php' ?>

<script src="../filejs/jsFile.js"></script>
</body>

</html>