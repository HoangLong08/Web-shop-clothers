<?php
require '../functionPhp/connect.php';
require '../functionPhp/executeQuery.php';
if (!isset($_SESSION['admin_user'])) {
   echo "<script>window.open('login.php','_self')</script>";
} else {
   if (isset($_GET['delete_order'])) {

      $delete_id = $_GET['delete_order'];
      $iparr =  explode("#", $delete_id);
      $status = $iparr[0];

      $delete_order = "UPDATE `orderproduct` SET `status` = '$status' WHERE `orderproduct`.`orderID` = $delete_id;";

      $run_delete = mysqli_query($conn, $delete_order);

      if ($run_delete) {
         echo "<script>window.open('index.php?view_orders','_self')</script>";
      }
   }
}

?>

