<?php
require '../functionPhp/connect.php';
require '../functionPhp/executeQuery.php';
if (!isset($_SESSION['admin_user'])) {

   echo "<script>window.open('login.php','_self')</script>";
} else {

?>
   <?php

   if (isset($_GET['edit_product'])) {

      $edit_id = $_GET['edit_product'];

      $get_p = "select * from products where productID='$edit_id'";

      $run_edit = mysqli_query($conn, $get_p);

      $row_edit = mysqli_fetch_array($run_edit);

      $productID_ = ($row_edit['productID']);

      $categoryID = ($row_edit['categoryID']);

      $fashionID = ($row_edit['fashionID']);

      $nameProduct = ($row_edit['nameProduct']);

      $priceProduct = ($row_edit['priceProduct']);

      $desProduct = ($row_edit['desProduct']);

      $imageOne = ($row_edit['imageOne']);

      $imageTwo = ($row_edit['imageTwo']);

      $imageThree = ($row_edit['imageThree']);

      $quantity = ($row_edit['quantity']);
      $sale = ($row_edit['sale']);
   }



   ?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title> Insert Products </title>
   </head>
   <body>
      <div class="row">
         <div class="col-lg-12">
            <ol class="breadcrumb">
               <li class="active">
                  <i class="fa fa-dashboard"></i> Dashboard / Edit Products
               </li>
            </ol>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <div class="panel panel-default">
               <div class="panel-heading">
                  <h3 class="panel-title">
                     <i class="fa fa-money fa-fw"></i> Insert Product
                  </h3>
               </div> 
               <div class="panel-body">
                  <form method="post" class="form-horizontal" enctype="multipart/form-data">
                     <div class="form-group">
                        <label class="col-md-3 control-label"> Product Name </label>
                        <div class="col-md-6">
                           <input name="nameProduct" type="text" class="form-control" required value="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label"> Product Category </label>
                        <div class="col-md-6">
                           <select name="categoryID" class="form-control">
                              <?php
                              $get_p_cats = "select * from categories";
                              $run_p_cats = mysqli_query($conn, $get_p_cats);
                              while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
                                 $p_cat_id = $row_p_cats['categoryID'];
                                 $p_cat_title = $row_p_cats['nameCategory'];
                                 echo "<option value='$p_cat_id'> $p_cat_id </option>";
                              }
                              ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label"> Product Fashion </label>
                        <div class="col-md-6">
                           <select name="fashionID" class="form-control">
                              <?php
                              $get_p_cats = "select * from categories";
                              $run_p_cats = mysqli_query($conn, $get_p_cats);
                              while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
                                 $p_cat_id = $row_p_cats['fashionID'];
                                 $p_cat_title = $row_p_cats['nameCategory'];
                                 echo "<option value='$p_cat_id'> $p_cat_id </option>";
                              }
                              ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label"> Product Image 1 </label>
                        <div class="col-md-6">
                           <input name="product_img1" type="file" class="form-control" required>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label"> Product Image 2 </label>
                        <div class="col-md-6">
                           <input name="product_img2" type="file" class="form-control">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label"> Product Image 3 </label>
                        <div class="col-md-6">
                           <input name="product_img3" type="file" class="form-control form-height-custom">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label"> Product Price </label>
                        <div class="col-md-6">
                           <input name="priceProduct" type="text" class="form-control" required value="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label"> Quantity </label>
                        <div class="col-md-6">
                           <input name="quantity" type="text" class="form-control" required value="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label"> Sale </label>
                        <div class="col-md-6">
                           <input name="sale" type="text" class="form-control" required value="">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label"> Product Desc </label>
                        <div class="col-md-6">
                           <textarea name="desProduct" cols="19" rows="6" class="form-control"></textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                           <input name="update" value="Insert Product" type="submit" class="btn btn-primary form-control">
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <script src="js/tinymce/tinymce.min.js"></script>
      <script>
         tinymce.init({
            selector: 'textarea'
         });
      </script>
   </body>
   </html>
   <?php
   if (isset($_POST['update'])) {
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
      $update_product = "INSERT INTO `products` (`productID`, `categoryID`, `fashionID`, `nameProduct`, `priceProduct`, `desProduct`, `imageOne`, `imageTwo`, `imageThree`, `quantity`, `sale`)
                  VALUES (NULL,  '$categoryID_', '$fashionID_', '$nameProduct_', '$priceProduct_', '$desProduct_', '$imageOne_', '$imageTwo_', '$imageThree_', '$quantity_', '$sale_')";
      $run_product = mysqli_query($conn, $update_product);
      if ($run_product) {
         echo "<script>alert('Your product has been Insert Successfully')</script>";
         echo "<script>window.open('index.php?view_products','_self')</script>";
      } else {
         // echo $update_product . "</br>";
         // echo $categoryID_ . "</br>";
         // echo $fashionID_ . "</br>";
         // echo $nameProduct_ . "</br>";

         // echo $priceProduct_ . "</br>";
         // echo $desProduct_ . "</br>";

         // echo $imageOne_ . "</br>";
         // echo $imageTwo_ . "</br>";
         // echo $imageThree_ . "</br>";

         // echo $sale_ . "</br>";
         // echo $quantity_ . "</br>";
      }
   }

   ?>


<?php } ?>