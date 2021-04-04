<?php
require '../functionPhp/connect.php';
require '../functionPhp/executeQuery.php';
if (!isset($_SESSION['admin_user'])) {
   echo "<script>window.open('login.php','_self')</script>";
} else {
?>
<?php
   if (isset($_GET['delete_p_cat'])) {
      $delete_p_cat_id = $_GET['delete_p_cat'];
      $delete_p_cat = "delete from categories where categoryID='$delete_p_cat_id'";
      $run_delete = mysqli_query($conn, $delete_p_cat);
      if ($run_delete) {
         echo "<script>alert('Deleted Successfully')</script>";
         echo "<script>window.open('index.php?view_p_cats','_self')</script>";
      }
   }
}
?>