<?php 
  require '../functionPhp/connect.php';
  require '../functionPhp/executeQuery.php';
    if(!isset($_SESSION['admin_user'])){
        echo "<script>window.open('login.php','_self')</script>";  
    }else{
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Costumers
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
                   <i class="fa fa-tags"></i>  View Costumers
               </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> No: </th>
                                <th> User Name: </th>
                                <th> Password: </th>
                                <th> E-Mail: </th>
                                <th> Address: </th>
                                <th> Phone: </th>
                                <th> Order ID: </th>
                                <th> Delete: </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                 $i=0;
                                 $get_c = "select * from customer";
                                 $run_c = mysqli_query($conn,$get_c);
                                 while($row_c = mysqli_fetch_array($run_c)){
                                     $c_id = ($row_c['customerID']);
                                     $c_userName = ($row_c['username']);
                                    
                                     $c_password =($row_c['password']);
                                    
                                     $c_email	 = ($row_c['email']);
                                    
                                     $c_address3 = ($row_c['diaChiChiTiet']);
                                     $c_address = $c_address3;
                                    
                                     $c_phone = ($row_c['phone']);
                                    
                                     $get_orde = "select * from orderproduct where `orderproduct`.`customerID`='$c_id'";
                                     $run_orde = mysqli_query($conn,$get_orde);
                                     $c_orderId = "";
                                     while($row_order = mysqli_fetch_array($run_orde)){
                                        $tmp = ($row_order['orderID']);
                                        $c_orderId .= $tmp."#";
                                     }
                                    
                                     $i++;
                            ?>
                            <tr>
                                <td> <?php echo $i; ?> </td>
                                <td> <?php echo ($c_userName); ?> </td>
                                <td> ******** </td>
                                <td> <?php echo ($c_email); ?></td>
                                <td> <?php echo ($c_address); ?> </td>
                                <td> <?php echo ($c_phone); ?> </td>
                                <td> <?php echo ($c_orderId); ?> </td>
                                <td> 
                                     <a href="index.php?delete_customer=<?php echo $c_id; ?>">
                                        <i class="fa fa-trash-o"></i> Delete
                                     </a> 
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>