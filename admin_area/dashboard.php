<?php
require '../functionPhp/connect.php';
require '../functionPhp/executeQuery.php';
if (!isset($_SESSION['admin_user'])) {
   echo "<script>window.open('login.php','_self')</script>";
} else {
   $sql = executeQuery($conn, "SELECT count(*) FROM products ");
   $tmp = mysqli_fetch_array($sql);
   $count_products = $tmp[0];

   $sql2 = executeQuery($conn, "SELECT count(*) FROM customer ");
   $tmp2 = mysqli_fetch_array($sql2);
   $count_customers = $tmp2[0];

   $sql3 = executeQuery($conn, "SELECT count(*) FROM categories ");
   $tmp3 = mysqli_fetch_array($sql3);
   $count_p_categories = $tmp3[0];

   $count_pending_orders = 0;
   $sql4 = executeQuery($conn, "SELECT count(*) FROM toorder");
   $tmp4 = mysqli_fetch_array($sql4);
  $count_pending_orders =  $tmp4[0];
   }
?>
   <div class="row">
      <div class="col-lg-12">
         <h1 class="page-header"> Dashboard </h1>
         <ol class="breadcrumb">
            <li class="active">
               <i class="fa fa-dashboard"></i> Dashboard
            </li>
         </ol>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-3 col-md-6">
         <div class="panel panel-primary">
            <div class="panel-heading">
               <div class="row">
                  <div class="col-xs-3">
                     <i class="fa fa-tasks fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                     <div class="huge"> <?php echo $count_products; ?> </div>
                     <div> Products </div>
                  </div>
               </div>
            </div>
            <a href="index.php?view_products">
               <div class="panel-footer">
                  <span class="pull-left">
                     View Details
                  </span>
                  <span class="pull-right">
                     <i class="fa fa-arrow-circle-right"></i>
                  </span>
                  <div class="clearfix"></div>
               </div>
            </a>
         </div>
      </div>
      <div class="col-lg-3 col-md-6">
         <div class="panel panel-green">
            <div class="panel-heading">
               <div class="row">
                  <div class="col-xs-3">
                     <i class="fa fa-users fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                     <div class="huge"> <?php echo $count_customers; ?> </div>
                     <div> Customers </div>
                  </div>
               </div>
            </div>
            <a href="index.php?view_customers">
               <div class="panel-footer">
                  <span class="pull-left">
                     View Details
                  </span>
                  <span class="pull-right">
                     <i class="fa fa-arrow-circle-right"></i>
                  </span>
                  <div class="clearfix"></div>
               </div>
            </a>
         </div>
      </div>
      <div class="col-lg-3 col-md-6">
         <div class="panel panel-orange">
            <div class="panel-heading">
               <div class="row">
                  <div class="col-xs-3">
                     <i class="fa fa-tags fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                     <div class="huge"> <?php echo $count_p_categories; ?> </div>

                     <div> Product Categories </div>
                  </div>
               </div>
            </div>
            <a href="index.php?view_p_cats">
               <div class="panel-footer">
                  <span class="pull-left">
                     View Details
                  </span>
                  <span class="pull-right">
                     <i class="fa fa-arrow-circle-right"></i>
                  </span>
                  <div class="clearfix"></div>
               </div>
            </a>
         </div>
      </div>
      <div class="col-lg-3 col-md-6">
         <div class="panel panel-red">
            <div class="panel-heading">
               <div class="row">
                  <div class="col-xs-3">
                     <i class="fa fa-shopping-cart fa-5x"></i>
                  </div>
                  <div class="col-xs-9 text-right">
                     <div class="huge"> <?php echo $count_pending_orders; ?> </div>
                     <div> Orders </div>
                  </div>
               </div>
            </div>
            <a href="index.php?view_orders">
               <div class="panel-footer">
                  <span class="pull-left">
                     View Details
                  </span>
                  <span class="pull-right">
                     <i class="fa fa-arrow-circle-right"></i>
                  </span>
                  <div class="clearfix"></div>
               </div>
            </a>
         </div>
      </div>
   </div>
<?php 
   $sql44 = executeQuery($conn, "SELECT * FROM customer");
   $tmp44 = mysqli_fetch_array($sql44);
   while($row = mysqli_fetch_array($sql44)){
      $ok = $row['customerID'];
      $name = $row['username'];
      $tong = 0;
      $sql55 = executeQuery($conn, "SELECT count(*) FROM orderproduct WHERE customerID = '".$ok."' ");
      $tmp55 = mysqli_fetch_array($sql55);
      if($tmp55[0] > 0){
            ?>
                  <div class="row">
                     <div class="col-lg-8">
                        <div class="panel panel-primary">
                           <div class="panel-heading">
                              <h3 class="panel-title">
                                 <i class="fa fa-money fa-fw"></i> <?php echo 'Tên Khách Hàng: '.$name;  ?> 
                              </h3>
                           </div>
                           <div class="panel-body">
                              <div class="table-responsive">
                                 <table class="table table-hover table-striped table-bordered">
                                    <thead>
                                       <tr>
                                          <th> Product ID: </th>
                                          <th> Product Qty: </th>
                                          <th> Amount Money: </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <?php
                                       $i = 0;
                                       $rowok = "";
                                       $get_order ="SELECT * FROM orderproduct WHERE customerID = '".$ok."'";
                                       $run_order = mysqli_query($conn, $get_order);
                                       while ($row_order = mysqli_fetch_array($run_order)) {
                                          $product_id = $row_order['productID'];
                                          $qty = $row_order['quantity'];
                                          $order_status = $row_order['status'];
                                          $tong+= $row_order['price'];
                                          $rowok = $row_order['status'];
                                          $i++;
                                       ?>
                                          <tr>
                                             <td><?php echo $product_id ?> </td>
                                             <td> <?php echo $qty ?> </td>
                                             <td> <?php echo $row_order['price'] ?> </td>
                                          </tr>
                                       <?php } ?>

                                    </tbody>
                                 </table>
                                 <div><h3><?php echo('Tổng đơn Hàng: '. $tong) ?></h3></div>
                              <h5 class="panel-title">
                                 <i class="fa fa-money fa-fw"></i> <?php echo( 'Trạng thái: '.$rowok);  ?> 
                              </h5>
                              </div>
                              <div class="text-right">
                              </div>
                           </div>
                        </div>
                     </div>
                     
                  </div>
            <?php
      }
     
   
?>

<?php } ?>