<?php
require '../functionPhp/connect.php';
require '../functionPhp/executeQuery.php';
if (!isset($_SESSION['admin_user'])) {
   echo "<script>window.open('login.php','_self')</script>";
} else {
   if (isset($_GET['edit_p_cat'])) {
      $edit_p_cat_id = $_GET['edit_p_cat'];
      $edit_p_cat_query = "select * from categories where categoryID='$edit_p_cat_id'";
      $run_edit = mysqli_query($conn, $edit_p_cat_query);
      $row_edit = mysqli_fetch_array($run_edit);
      $p_cat_id = $row_edit['categoryID'];
      $p_cat_fas = $row_edit['fashionID'];
      $p_cat_desc = $row_edit['nameCategory'];
   }
?>
   <div class="row">
      <div class="col-lg-12">
         <ol class="breadcrumb">
            <li>
               <i class="fa fa-dashboard"></i> Dashboard / Edit Product Category
            </li>
         </ol>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
                  <i class="fa fa-pencil fa-fw"></i> Edit Product Category
               </h3>
            </div>
            <div class="panel-body">
               <form action="" class="form-horizontal" method="post">
                  <div class="form-group">
                     <label for="exampleFormControlSelect1" class="control-label col-md-3"> ID Fashtion</label>
                     <div class="col-md-6">
                        <select class="form-control" style="width: 200px;" name="IdFashtion">
                           <?php
                           $get_fas = " select * from categories group by fashionID";
                           $run_fas = mysqli_query($conn, $get_fas);
                           while ($row_fas = mysqli_fetch_array($run_fas)) {
                           ?>
                              <option value="<?php echo $row_fas['fashionID'] ?>"> <?php echo $row_fas['fashionID'] ?> </option>
                           <?php
                           }
                           ?>
                        </select>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="" class="control-label col-md-3">
                        ID Category
                     </label>
                     <div class="col-md-6">
                        <input name="p_cat_title" type="text" class="form-control" value="<?php echo $p_cat_id ?>">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="" class="control-label col-md-3">
                        Name Category
                     </label>
                     <div class="col-md-6">
                        <textarea type='text' name="p_cat_desc" id="" cols="30" rows="10" class="form-control"><?php echo $p_cat_desc ?></textarea>
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="" class="control-label col-md-3">
                     </label>
                     <div class="col-md-6">
                        <input value="Update" name="update" type="submit" class="form-control btn btn-primary">
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
<?php
   if (isset($_POST['update'])) {
      $idFas = ($_POST['IdFashtion']);
      $idCa = ($_POST['p_cat_title']);
      $nameCa = ($_POST['p_cat_desc']);
      $ok = $_GET['edit_p_cat'];
      $upda_fas = "UPDATE `categories` SET `categoryID` = '$idCa', `fashionID` = '$idFas', `nameCategory` = '$nameCa' WHERE `categories`.`categoryID` = '$ok';";
      $run_upda_fas = mysqli_query($conn, $upda_fas);
      if ($run_upda_fas) {
         echo "<script>alert('Update Successfully')</script>";
      } else {
         echo "<script>alert('Update Failure')</script>";
      }
   }
}

?>