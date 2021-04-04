<?php 
session_start();
$foo = $_SESSION['cart'][0];
//print_r($foo['item_name']);
$countCart = $totalMoney = 0;
$check = false;
if(isset($_SESSION["cart"])){
	// $i = 0;
	// while ($i < count($_SESSION["cart"])) {
	// 	$a = $arr[$i];
	// 	echo $a ."\n";
	// 	$i++;
	// }

	foreach($_SESSION['cart'] as $key => $value){
		
		if($_POST['cartID'] == $value['item_img']){
			$check = true;	
		}else{
			$check = false;
		}

		if($check === true){
			$value['item_product_count'] = $value['item_product_count']++;
			echo "1123: " . $value['item_product_count'];
			$totalMoney += $_POST['quantity'] * $value['item_price'];
		}else{
			$totalMoney +=  $value['item_price'];
			$value['item_product_count'] = $value['item_product_count']++;
			echo "1123: " . $value['item_product_count'];

		}
		
	}
}
// $GLOBALS['$totalMoeny'] = $totalMoney;
// echo $GLOBALS['$totalMoeny'];
echo number_format($totalMoney, 0, '', ',');


?>