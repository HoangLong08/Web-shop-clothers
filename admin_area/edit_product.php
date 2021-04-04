<?php
require '../functionPhp/connect.php';
require '../functionPhp/executeQuery.php';
if (!isset($_SESSION['admin_user'])) {

   echo "<script>window.open('login.php','_self')</script>";
} else {

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
   $get_p_cat = "select * from categories where categoryID ='$categoryID'";
   $run_p_cat = mysqli_query($conn, $get_p_cat);
   $row_p_cat = mysqli_fetch_array($run_p_cat);
   $p_cat_title = $row_p_cat['nameCategory'];
   $get_cat = "select * from categories where categoryID='$categoryID'";
   $run_cat = mysqli_query($conn, $get_cat);
   $row_cat = mysqli_fetch_array($run_cat);
   $cat_title = $row_cat['nameCategory'];
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
                        <label class="col-md-3 control-label"> Active </label>
                        <div class="col-md-6">
                           <select name="active" class="form-control">
                              <option value='0'> Chưa duyệt </option>
                              <option value='1'> Đã duyệt </option>
                           </select>
                        </div>
                     </div>

                     <div class="form-group">
                        <label class="col-md-3 control-label"> Product Name </label>
                        <div class="col-md-6">
                           <input name="nameProduct" type="text" class="form-control" required value="<?php echo $nameProduct; ?>">
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
                                 echo " <option value='$p_cat_id'> $p_cat_id </option";
                              }
                              ?>
                           </select>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label"> Product Image 1 </label>
                        <div class="col-md-6">
                           <input name="product_img1" type="file" class="form-control" required>
                           <br>
                           <img width="70" height="70" src="../image/imageProduct/<?php echo $imageOne; ?>" alt="<?php echo $imageOne; ?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label"> Product Image 2 </label>
                        <div class="col-md-6">
                           <input name="product_img2" type="file" class="form-control">
                           <br>
                           <img width="70" height="70" src="../image/imageProduct/<?php echo $imageTwo; ?>" alt="<?php echo $imageTwo; ?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label"> Product Image 3 </label>
                        <div class="col-md-6">
                           <input name="product_img3" type="file" class="form-control form-height-custom">
                           <br>
                           <img width="70" height="70" src="../image/imageProduct/<?php echo $imageThree; ?>" alt="<?php echo $imageThree; ?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label"> Product Price </label>
                        <div class="col-md-6">
                           <input name="priceProduct" type="text" class="form-control" required value="<?php echo $priceProduct; ?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label"> Quantity </label>
                        <div class="col-md-6">
                           <input name="quantity" type="text" class="form-control" required value="<?php echo $quantity; ?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label"> Sale </label>
                        <div class="col-md-6">
                           <input name="sale" type="text" class="form-control" required value="<?php echo $sale; ?>">
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label"> Product Desc </label>
                        <div class="col-md-6">
                           <textarea name="desProduct" cols="19" rows="6" class="form-control">
                                <?php echo $desProduct; ?>
                            </textarea>
                        </div>
                     </div>
                     <div class="form-group">
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6">
                           <input name="update" value="Update Product" type="submit" class="btn btn-primary form-control">
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
      $active = ($_POST['active']);
      // $imageOne = ($_POST['product_img1']);
      $imageOne_ = $_FILES['product_img1']['name'];
      // $imageTwo = ($_POST['product_img2']);
      $imageTwo_ = $_FILES['product_img2']['name'];
      move_uploaded_file($imageTwo_, "slides_images/$slide_image");
      //$imageThree = ($_POST['product_img3']);
      $imageThree_ = $_FILES['product_img3']['name'];
      $quantity_ = ($_POST['quantity']);
      $sale_ = ($_POST['sale']);
      $update_product = "UPDATE `products` SET `categoryID` = '$categoryID_', `nameProduct` = '$nameProduct_', `priceProduct` = '$priceProduct_', `desProduct` = '$desProduct_', `quantity` = '$quantity_', `sale` = '$sale_', `active` = '$active' WHERE `products`.`productID` = '$productID_'";
      $run_product = mysqli_query($conn, $update_product);
      if ($run_product) {
         echo "<script>alert('Your product has been updated Successfully')</script>";
         echo "<script>window.open('index.php?view_products','_self')</script>";
      } else {
         // echo $update_product. "</br>";

         // echo $productID_. "</br>";

         // echo $categoryID. "</br>";
         // echo $fashionID. "</br>";
         // echo $nameProduct. "</br>";

         // echo $priceProduct. "</br>";
         // echo $desProduct. "</br>";

         // echo $imageOne. "</br>";
         // echo $imageTwo. "</br>";
         // echo $imageThree. "</br>";

         // echo $sale. "</br>";
         // echo $quantity. "</br>";
      }
   }
   ?>
<?php } ?>