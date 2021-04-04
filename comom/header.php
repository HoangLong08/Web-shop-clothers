<?php

require '../functionPhp/connect.php';
require '../functionPhp/executeQuery.php';
	if(!isset($_SESSION)) { 
		session_start(); 
	} 
	$u = '';
	if(isset($_SESSION['loginUser'])){
		$u = $_SESSION['loginUser'];
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Truy Cập Ngay Để Khám Phá Các Sản Phẩm Từ Các Thương Hiệu Quốc Tế Và
	Nội Địa Nổi Tiếng. Mua Sắm Sản Phẩm Yêu Thích Với Giá Rẻ Vô Địch Và Miễn Phí Giao Hàng Toàn Quốc. Thanh toán đảm bảo." />
	<meta name="author" content="Shop Trung My" />
	
	<title><?php echo $title;?></title>
	<link rel="shortcut icon" href="../image/logoShop.jpg" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<link rel="stylesheet" href="../filleCss/style.css">
	<link rel="stylesheet" href=<?php echo $pathFileStyle;?>>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
<header class="header">
	<div class="container">
		<div class="left-container">
			<img src="../image/logoShop.jpg" alt="logo">
		</div>
		<div class="menu-bar">
			<button class="btn" id="icon-bar">
				<i class="fas fa-bars"></i>
			</button>
		</div>
		<div class="mid-container">
			<ul class="main-menu" id="myMainMenu">
				<li class="main-menu-li "><a class="<?php if($title === "trang chủ"){echo "active-menu";}?>" href="../user/index.php">Trang chủ</a></li>
				<li class="main-menu-li">
					<a class="<?php if($title === "thời trang cao cấp"){echo "active-menu";}?>" href="../user/thoitrangcaocap.php">Thời trang cao cấp</a>
					<ul class="sub-menu">
						<div class="left-sub-menu">
							<div class="sub-menu-image">
								<img src="https://storage.googleapis.com/cdn.nhanh.vn/store2/69300/menu/19259_1587110080_tho%CC%9B%CC%80i%20trang%20cao%20ca%CC%82%CC%81p%20mobile.jpg" alt="">
							</div>
						</div>
						<div class="right-sub-menu">
							<div class="row">
								<div class="col-md-4 col-12">
									<li><a href="">Váy / Dresses</a></li>
									<li><a href="">Áo mùa hè / Summer Tops</a></li>
									<li><a href="">Đồ len/ Knitwears</a></li>
								</div>
								<div class="col-md-4 col-12">
									<li><a href="">Quần / Pants</a></li>
									<li><a href="">Đồ thể thao/ Sport</a></li>
								</div>
								<div class="col-md-4 col-12">
									<li><a href="">Áo mùa đông/ Winter Tops</a></li>
									<li><a href="">Giày / Shoes</a></li>
								</div>
							</div>
						</div>
					</ul>
				</li>
				<li class="main-menu-li">
					<a class="<?php if($title === "thời trang nữ"){echo "active-menu";}?>" href="../user/thoitrangnu.php">Thời trang nữ</a>
					<ul class="sub-menu">
						<div class="left-sub-menu">
							<div class="sub-menu-image">
								<img src="https://storage.googleapis.com/cdn.nhanh.vn/store2/69300/menu/19259_1587110080_tho%CC%9B%CC%80i%20trang%20cao%20ca%CC%82%CC%81p%20mobile.jpg" alt="">
							</div>
						</div>
						<div class="right-sub-menu">
							<div class="row">
								<div class="col-md-4 col-12">
									<li><a href="">Váy / Dresses</a></li>
									<li><a href="">Áo mùa hè / Summer Tops</a></li>
									<li><a href="">Đồ len/ Knitwears</a></li>
								</div>
								<div class="col-md-4 col-12">
									<li><a href="">Quần / Pants</a></li>
									<li><a href="">Đồ thể thao/ Sport</a></li>
								</div>
								<div class="col-md-4 col-12">
									<li><a href="">Áo mùa đông/ Winter Tops</a></li>
									<li><a href="">Giày / Shoes</a></li>
								</div>
							</div>
						</div>
					</ul>
				</li>
				<li class="main-menu-li">
					<a class="<?php if($title === "thời trang trẻ em"){echo "active-menu";}?>" href="../user/thoitrangtreem.php" >Thời trang trẻ em</a>
					<ul class="sub-menu">
						<div class="left-sub-menu">
							<div class="sub-menu-image">
								<img src="https://storage.googleapis.com/cdn.nhanh.vn/store2/69300/menu/19259_1587110080_tho%CC%9B%CC%80i%20trang%20cao%20ca%CC%82%CC%81p%20mobile.jpg" alt="">
							</div>
						</div>
						<div class="right-sub-menu">
							<div class="row">
								<div class="col-md-4 col-12">
									<li><a href="">Đồ sơ sinh / New born</a></li>
								</div>
								<div class="col-md-4 col-12">
									<li><a href="">Trẻ em nam / Boy</a></li>
								</div>
								<div class="col-md-4 col-12">
									<li><a href="">Trẻ em nữ / Girl</a></li>
								</div>
							</div>
						</div>
					</ul>
				</li>
				<li class="main-menu-li" >
					<!-- onclick="addOutline(this)" -->
					<a class="<?php if($title === "tin tức"){echo "active-menu";}?>"  href="../user/news.php">Tin tức</a>
					<ul class="sub-menu">
						<div class="left-sub-menu">
							<div class="sub-menu-image">
								<img src="https://storage.googleapis.com/cdn.nhanh.vn/store2/69300/menu/19259_1587110080_tho%CC%9B%CC%80i%20trang%20cao%20ca%CC%82%CC%81p%20mobile.jpg" alt="">
							</div>
						</div>
						<div class="right-sub-menu">
							<div class="row">
								<div class="col-md-4 col-12">
									<li><a href="">Câu chuyện về glammie</a></li>
									<li><a href="">Chuyển hàng miễn phí </a></li>
									<li><a href="">Hướng dẫn đăng ký tài khoản</a></li>
								</div>
								<div class="col-md-4 col-12">
									<li><a href="">Chính sách thanh lý ký gửi</a></li>
									<li><a href="">Chương trình thành viên</a></li>
									
								</div>
								<div class="col-md-4 col-12">
									<li><a href="">Chính sách trả hàng</a></li>
									<li><a href="">Những câu hỏi thường gặp</a></li>
								</div>
							</div>
						</div>
					</ul>
				</li>
				<div class="menu-btn-moblie-s mb-3">
					<a href="login.php" class="btn-user-mobile">Đăng nhâp</a>
					<a href="resgister.php" class="btn-user-mobile">Đăng kí</a>
				</div>
			</ul>
			<div class="menu-icon">
				<div class="search">
					
						<i class="fas fa-search"></i>
						<div class="input-search">
						<form action="../user/search.php" method="get" class="search-box-desk d-flex align-self-center">
							<input id="searchValue" class="form-control" type="text" name="q" placeholder="Tìm theo mã,tên sản phẩm..." style="width: 250px;">
							
							<span class="input-group-append">
							<button class="btn border-0">
								<i class="fas fa-search"></i>
							</button>
						</span></form>
						</div>
					
				</div>
				<div class="cart">
					<a href="../user/cartShop.php" style="color:black">
						<i class="far fa-shopping-cart"></i>
					</a>
					<div class="number-cart">
						<?php
							$count = 0;
							if(isset($_SESSION['cart'])){
								$count = count($_SESSION['cart']);
							}
							echo $count;
						?>
					</div>
				</div>
				<div class="heart">
					<?php
						if(!$u){
							echo "<a id='clickLoginHeader' style='color:black' ><i class='far fa-heart'></i></a>";
						}
						else{
							echo "<a href='../personalPage/loveProduct.php' style='color:black' > <i class='far fa-heart'></i>  </a>";
						}
					?>
					<div class="number-heart">
					<?php
							$count = 0;
							$id = $_SESSION['idUser'];
							$res = executeQuery($conn, "SELECT count(*) FROM lovepro WHERE `lovepro`.`idCustomer` = '$id'");
							$row = mysqli_fetch_array($res);
							$count = $row[0];
							echo $count;
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="right-container">
			<div class="menu-btn">
				<?php
					if(!$u){
						echo "<a href='login.php' class='btn-user'>Đăng nhập</a>";
						echo "<a href='resgister.php' class='btn-user'>Đăng kí</a>";
					}
					else{
						echo "<a href='../user/profile.php' class='btn-user'> $u  </a>";
						// echo "<a href='logout.php' class='btn-user'>Đăng xuất</a>";
					}
				?>
			</div>
		</div>
		<div id="popup" style="display: none;">	
			<div class="container-notifi">
				<div class="title-notifi">
					<h6>Thông báo</h6>
					<p id="close">X</p>
				</div>
				<div class="contetn-notifi">
					Đăng nhập để thực hiện chức năng này
				</div>
				<div class="btn-notifi">
					<div class="btn-left">
						<a class="btn btn-primary" href="login.php">Đăng nhập</a>
					</div>
					<div class="btn-right">
						<button class="btn btn-primary" id="closeOK">OK</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
