<?php
require '../functionPhp/connect.php';
require '../functionPhp/executeQuery.php';
if (!isset($_SESSION['admin_user'])) {

   echo "<script>window.open('login.php','_self')</script>";
} else {

?>
   <div class="row">
      <div class="col-lg-12">
         <ol class="breadcrumb">
            <li>

               <i class="fa fa-dashboard"></i> Dashboard / Insert Product Category

            </li>
         </ol>
      </div>
   </div>

   <div class="row">
      <div class="col-lg-12">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
                  <i class="fa fa-money fa-fw"></i> Insert Product Category
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
                        <input name="p_cat_title" type="text" class="form-control">
                     </div>
                  </div>
                  <div class="form-group">
                     <label for="" class="control-label col-md-3">
                        Name Category
                     </label>
                     <div class="col-md-6">
                        <textarea type='text' name="p_cat_desc" id="" cols="30" rows="10" class="form-control"></textarea>

                     </div>
                  </div>
                  <div class="form-group">
                     <label for="" class="control-label col-md-3">
                     </label>
                     <div class="col-md-6">
                        <input value="Submit" name="submit" type="submit" class="form-control btn btn-primary">
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
<?php
   if (isset($_POST['submit'])) {
      $idFas = ($_POST['IdFashtion']);
      $idCa = ($_POST['p_cat_title']);
      $nameCa = ($_POST['p_cat_desc']);

      $ins_fas = "INSERT INTO `categories` (`categoryID`, `fashionID`, `nameCategory`) VALUES ('$idCa', '$idFas', '$nameCa');";
      $run_ins_fas = mysqli_query($conn, $ins_fas);
      if ($run_ins_fas) {
         echo "<script>alert('Insert Successfully')</script>";
      } else {
         echo "<script>alert('Insert Failure')</script>";
      }
   }
}
?>
