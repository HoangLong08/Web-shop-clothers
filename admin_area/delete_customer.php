<?php
require '../functionPhp/connect.php';
require '../functionPhp/executeQuery.php';
if (!isset($_SESSION['admin_user'])) {
   echo "<script>window.open('login.php','_self')</script>";
} else {
?>
<?php
   if (isset($_GET['delete_customer'])) {
      $delete_id = $_GET['delete_customer'];
      $delete_c = "delete from customer where customerID='$delete_id'";
      $run_delete = mysqli_query($conn, $delete_c);
      if ($run_delete) {
         echo "<script>alert('One of your costumer has been Deleted')</script>";
         echo "<script>window.open('index.php?view_customers','_self')</script>";
      }
   }
}
?>