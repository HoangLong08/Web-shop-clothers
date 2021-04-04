<?php
$u = '';
$checkLogin = false;
if(isset($_SESSION['loginUser'])){
	$u = $_SESSION['loginUser'];
}
if(isset($_POST['add-to-heart'])){
	if(!empty($u)){
		$checkLogin = true;
	}else{
		echo "<script type='text/javascript'>
					window.onload = function(){
						alert('Vui lòng đăng nhập');
					}
				</script>";
	}
}

$result = executeQuery($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
?>
	<div class="col-lg-3 col-md-4 col-sm-6 col-12">
			<div class="card <?= ($row['quantity'] == 0) ? 'opacityCard' : null; ?>">
				<form method="POST" action="../user/process.php">
					<div class="image">
						<img class="card-img-top" class="photo" src="../image/imageProduct/<?php echo $row['imageOne'];  ?>" alt="Card image">
						<div class="hover">
							<a href="../user/detailProduct.php?productID=<?php echo $row['productID'] ?>" class="btn btn-primary">xem thêm</a>
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
					<p class="card-text text-right"><?php echo number_format($row['priceProduct'], 0, '', ',') ." VNĐ" ?></p>
					<div class="d-flex justify-content-between mt-2">
					<a href="../user/detailProduct.php?productID=<?php echo $row['productID'] ?>" class="btn btn-primary">Mua ngay</a>
						<button type="submit"  name="add-to-heart" class="btn btn-primary clickLoginCartProduct" >
							<i class="fas fa-heart"></i>
						</button>
					</div>
				</div>
				</form>
				<div class="hethang" style="display: <?= ($row['quantity'] == 0) ? 'block' : 'none'; ?>;">
					<h4>HẾT HÀNG</h4>
				</div>
			</div>
	</div>
<?php
}
?>
<script>
$('document').ready(function(){
	$('.clickLoginCartProduct').click(function(e){
		<?php 
			if(!$u){
		?>
		$("#popup").show();
		<?php
			}
		?>
	})
	 $("#popup").click(function(e){
		e.stopPropagation();
	 });
})

</script>