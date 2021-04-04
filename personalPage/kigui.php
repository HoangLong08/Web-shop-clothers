<?php

$title = 'sản phẩm ký gửi';
$pathFileStyle = "../filleCss/styleProfile.css";
require '../comom/header.php';
$u = '';
$idUser = "";
if(isset($_SESSION['loginUser'])){
	$u = $_SESSION['loginUser'];
	$idUser = 	$_SESSION['idUser'];
}
?>


<?php 

if(isset($_POST['update'])){
                                    
    $categoryID_ = ($_POST['categoryID']);
    
    $fashionID_ = ($_POST['fashionID']);
    
    $nameProduct_ = ($_POST['nameProduct']);
    
    $priceProduct_ = ($_POST['priceProduct']);

    $desProduct_ = ($_POST['desProduct']);

   // $imageOne = ($_POST['product_img1']);
    $imageOne_ = $_FILES['product_img1']['name'];
    
   // $imageTwo = ($_POST['product_img2']);
    $imageTwo_ = $_FILES['product_img2']['name'];
    //$imageThree = ($_POST['product_img3']);
    $imageThree_ = $_FILES['product_img3']['name'];
    
    $quantity_ = ($_POST['quantity']);

    $sale_ = ($_POST['sale']);
   
    $update_product = "INSERT INTO `products` (`productID`, `categoryID`, `fashionID`, `nameProduct`, `priceProduct`, `desProduct`, `imageOne`, `imageTwo`, `imageThree`, `quantity`, `sale`, `ID_owned`,`active` ) VALUES (NULL,  '$categoryID_', '$fashionID_', '$nameProduct_', '$priceProduct_', '$desProduct_', '$imageOne_', '$imageTwo_', '$imageThree_', '$quantity_', '$sale_','$idUser', 0)";
    
    $run_product = mysqli_query($conn,$update_product);
    
    if($run_product){
        
       echo "<script>alert('Your product has been Insert Successfully')</script>"; 
        
    }else{
        echo $update_product. "</br>";

       
        echo $categoryID_. "</br>";
        echo $fashionID_. "</br>";
        echo $nameProduct_. "</br>";

        echo $priceProduct_. "</br>";
        echo $desProduct_. "</br>";

        echo $imageOne_. "</br>";
        echo $imageTwo_. "</br>";
        echo $imageThree_. "</br>";

        echo $sale_. "</br>";
        echo $quantity_. "</br>";

    }
    
}

?>


<main>
	<div class="content-main">
		<div class="row">
			<div class="col-md-4 col-12">
				<?php require '../comom/ulProfile.php' ?>
			</div>
			<div class="col-md-8 col-12">
				<div class="info-user">
					<div>
						<h3>Sản phẩm ký gửi</h3>
                        
                        <hr class="my-4">
					</div>
					<!-- <form action="">
						<div class="form-group">
							<label for="exampleInputEmail1">Email address</label>
							<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
							<small id="emailHelp" class="form-text text-muted"></small>
						</div>
						<div class="form-group">
							<label for="">Tên sản phẩm</label>
							<input type="text" class="form-control" id="" placeholder="Tên sản phẩm">
						</div>
						<div class="form-group">
							<label for="">Hình ảnh 1</label>
							<input type="file" class="form-control" id="" placeholder="Hình ảnh 1">
							<small id="emailHelp" class="form-text text-muted"></small>
						</div>
						<div class="form-group">
							<label for="">Hình ảnh 2</label>
							<input type="file" class="form-control" id="" placeholder="Hình ảnh 2">
							<small id="emailHelp" class="form-text text-muted"></small>
						</div>
						<div class="form-group">
							<label for="">Hình ảnh 3</label>
							<input type="file" class="form-control" id="" placeholder="Hình ảnh 3">
							<small id="emailHelp" class="form-text text-muted"></small>
						</div>

						<div class="text-center">
							<button class="btn btn-primary" name="submitChangePass">Submit</button>
						</div>
					</form> -->
					<form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                   
                   <div class="form-group">
                     <label class=" control-label"> Product Name </label>
                     <input name="nameProduct" type="text" class="form-control" required value="">
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                      <label > Product Category </label> 
                          <select name="categoryID"  style="width: 200px;"><!-- form-control Begin -->
                              <?php 
                              $get_p_cats = "select * from categories";
                              $run_p_cats = mysqli_query($conn,$get_p_cats);
                              while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                  
                                  $p_cat_id = $row_p_cats['categoryID'];
                                  $p_cat_title = $row_p_cats['nameCategory'];
                                  
                                  echo "
                                  
                                  <option value='$p_cat_id'> $p_cat_id </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>
                              
                          </select><!-- form-control Finish -->
                          
                    
                       
                   </div><!-- form-group Finish -->
                   <div class="form-group"><!-- form-group Begin -->
                       
                       <label class=" control-label"> Product Fashion </label> 
                           <select name="fashionID"><!-- form-control Begin -->
                               <?php 
                               $get_p_cats = "select * from categories";
                               $run_p_cats = mysqli_query($conn,$get_p_cats);
                               while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                   
                                   $p_cat_id = $row_p_cats['fashionID'];
                                   $p_cat_title = $row_p_cats['nameCategory'];
                                   echo " <option value='$p_cat_id'> $p_cat_id </option> ";
                               }
                               ?>
                           </select>
                    </div><!-- form-group Finish -->
                   <div class="form-group"><!-- form-group Begin -->
                      <label class=" control-label"> Product Image 1 </label> 
                          <input name="product_img1" type="file" class="form-control" required>
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class=" control-label"> Product Image 2 </label> 
                      
                    
                          
                          <input name="product_img2" type="file" class="form-control">
                          
               
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class=" control-label"> Product Image 3 </label> 
                  
                          
                          <input name="product_img3" type="file" class="form-control form-height-custom">
                          
                       
                    
                       
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class=" control-label"> Product Price </label> 
                    
                          
                          <input name="priceProduct" type="text" class="form-control" required value="">
                          
                 
                       
                   </div><!-- form-group Finish -->
                   <div class="form-group"><!-- form-group Begin -->
                       
                       <label class=" control-label">  Quantity </label> 
                       
                      
                           <input name="quantity" type="text" class="form-control" required value="">
                   
                    </div><!-- form-group Finish -->
                    <div class="form-group"><!-- form-group Begin -->
                       
                       <label class=" control-label">  Sale </label> 
                          
                           <input name="sale" type="text" class="form-control" required value="">
                        
                    </div><!-- form-group Finish -->

                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class=" control-label"> Product Desc </label> 
                         
                          <textarea name="desProduct" cols="19" rows="6" class="form-control">
                              
                              
                              
                          </textarea>
                      
                   </div><!-- form-group Finish -->
                   
                   <div class="form-group"><!-- form-group Begin -->
                       
                      <label class=" control-label"></label> 
                      
                          
                          <input name="update" value="Insert Product" type="submit" class="btn btn-primary form-control">
                       
                   </div><!-- form-group Finish -->
                   
               </form><!-- form-horizontal Finish -->
				</div>
			</div>
		</div>
	</div>
</main>

<?php require '../comom/footer.php' ?>

<script src="../filejs/jsFile.js"></script>
</body>

</html>