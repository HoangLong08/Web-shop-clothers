<?php
require '../functionPhp/connect.php';
require '../functionPhp/executeQuery.php';
session_start();
// session_destroy();
if($_SERVER['REQUEST_METHOD']  == "POST"){
	if(isset($_POST['add-to-card-index'])){
		// echo"123";
		if(isset($_SESSION['cart']) ){
			//echo "Hello {$array_item['item_name']}!";
			$myItem = array_column($_SESSION['cart'], "item_name");
			
			if(in_array($_POST['hidden-name'], $myItem)){
				echo "<script type='text/javascript'>
							window.onload = function(){
								alert('Sản phẩm đã tồn tại trong giỏ hàng!');
								window.location.href = '../user/index.php';
							}
						</script>";
				//print_r($_SESSION['cart']);
			}else{
				$count = count($_SESSION['cart']);
				$array_item = array(
					'item_name' => $_POST['hidden-name'],
					'item_price'=> $_POST['hidden-price'],
					'item_img'  => $_POST['hidden-img'],
					'item_quantity'  => $_POST['hidden-quantity'],
					'item_productID' => $_POST['hidden-productID'],
					'item_count'   => $_POST['hidden-count']
				);
				$_SESSION['cart'][$count] = $array_item;
				if(isset($_SESSION['loginUser'])){
					$res = executeQuery($conn, "INSERT INTO `orderproduct` (`orderID`, `quantity`, `price`, `img`, `productID`) 
													VALUES (NULL, '1', '{$array_item['item_price']}', '{$array_item['item_img']}', '{$array_item['item_productID']}');");
				}
				echo "<script>
							window.onload = function(){
								window.location.href = '../user/index.php';
							};
						</script>";
			}
			//print_r($_SESSION['cart']);
		
		}else{	
			$array_item = array(
				'item_name' 		=> $_POST['hidden-name'],
				'item_price'		=> $_POST['hidden-price'],
				'item_img'  		=> $_POST['hidden-img'],
				'item_quantity'	=> $_POST['hidden-quantity'],
				'item_productID'	=> $_POST['hidden-productID'],
				'item_count'   	=> $_POST['hidden-count']
			);
			$_SESSION['cart'][0] = $array_item;
			//echo "Hello {$array_item['item_name']}!";
			//print_r($_SESSION['cart']);

			echo "<script>
						window.onload = function(){
							window.location.href = '../user/index.php';
						};
					</script>";
		}
	}elseif(isset($_POST['remove-item'])){
		
		foreach($_SESSION['cart'] as $key => $value){
			// print_r($key);
			if(isset($_SESSION['loginUser'])){
				 $res = executeQuery($conn, "DELETE FROM `orderproduct` WHERE orderproduct.productID = '{$value['item_productID']}'");
			}
			if($value['item_name'] == $_POST['hidden-name']){
				
				unset($_SESSION['cart'][$key]);
				// echo "12";
				$_SESSION['cart'] = array_values($_SESSION['cart']);
				echo "<script>
							window.onload = function(){
								window.location.href = '../user/cartShop.php';
							};
						</script>";
			}
		}
	}elseif(isset($_POST['checkoutDetail'])){
		// echo"123";
		if(isset($_SESSION['cart']) ){
			//echo "Hello {$array_item['item_name']}!";
			$myItem = array_column($_SESSION['cart'], "item_name");
			
			if(in_array($_POST['hidden-name'], $myItem)){
				echo "<script type='text/javascript'>
							window.onload = function(){
								alert('Sản phẩm đã tồn tại trong giỏ hàng!');
								window.location.href = '../user/thanhtoan.php';
							}
						</script>";
				//print_r($_SESSION['cart']);
			}else{
				$count = count($_SESSION['cart']);
				$array_item = array(
					'item_name' => $_POST['hidden-name'],
					'item_price'=> $_POST['hidden-price'],
					'item_img'  => $_POST['hidden-img'],
					'item_quantity'  => $_POST['hidden-quantity'],
					'item_productID' => $_POST['hidden-productID'],
					'item_count'   => $_POST['hidden-count']
				);
				$_SESSION['cart'][$count] = $array_item;
				if(isset($_SESSION['loginUser'])){
					$res = executeQuery($conn, "INSERT INTO `orderproduct` (`orderID`, `quantity`, `price`, `img`, `productID`) 
													VALUES (NULL, '1', '{$array_item['item_price']}', '{$array_item['item_img']}', '{$array_item['item_productID']}');");
				}
				echo "<script>
							window.onload = function(){
								window.location.href = '../user/thanhtoan.php';
							};
						</script>";
			}
			//print_r($_SESSION['cart']);
		
		}else{	
			$array_item = array(
				'item_name' 		=> $_POST['hidden-name'],
				'item_price'		=> $_POST['hidden-price'],
				'item_img'  		=> $_POST['hidden-img'],
				'item_quantity'	=> $_POST['hidden-quantity'],
				'item_productID'	=> $_POST['hidden-productID'],
				'item_count'   	=> $_POST['hidden-count']
			);
			$_SESSION['cart'][0] = $array_item;
			//echo "Hello {$array_item['item_name']}!";
			//print_r($_SESSION['cart']);

			echo "<script>
						window.onload = function(){
							window.location.href = '../user/thanhtoan.php';
						};
					</script>";
		}
	}elseif(isset($_POST['add-to-heart'])){
		$ok2 = ( $_POST['hidden-productID']);
		$ok =  $_SESSION['idUser'];
		$res = executeQuery($conn, "INSERT INTO `lovepro` (`id`, `idCustomer`, `idpro`) VALUES (NULL, '$ok', '$ok2');");
		if($res == null){	
			$delete = executeQuery($conn, "DELETE FROM `lovepro` WHERE `lovepro`.`idpro` = '$ok2' AND `lovepro`.`idCustomer` = '$ok';");
	
		}
		echo "<script>
						window.onload = function(){
							window.location.href = '../user/index.php';
						};
					</script>";
	}
}

?>