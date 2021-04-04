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
                <i class="fa fa-dashboard"></i> Dashboard / View Orders
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
                   <i class="fa fa-tags"></i>  View Orders
               </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                                <th> No: </th>
                                <th> User Name: </th>
                                <th> E-Mail: </th>
                                <th> Address: </th>
                                <th> Phone: </th>
                                <th> Order ID: </th>
                                <th> Product ID : </th>
                                <th> Total Orders: </th>
                                <th> Status: </th>
                                <th> Change Status: </th>
                                <th> Cancel Order: </th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php 
                              $get_toor = "select * from toorder";
                              $run_toor = mysqli_query($conn, $get_toor);
                              while ($row_toor = mysqli_fetch_array($run_toor)) {
                                $tmp = $row_toor['id'];
                                $c_email = "";
                                $c_address = "";
                                $c_phone = "";
                                $c_orderId = "";
                                $c_pr = "";
                                $c_status = "";
                                $Total_Orders = 0;
                                $get_detail = "select * from orderproduct where id=$tmp";
                                $run_detail = mysqli_query($conn, $get_detail);
                                while ($row_detail = mysqli_fetch_array($run_detail)) {
                                    $c_email = $row_detail['email'];
                                    $c_address = $row_detail['address'];
                                    $c_phone =  $row_detail['phone'];
                                    $c_orderId .=$row_detail['orderID']."#";
                                    $c_pr .= $row_detail['productID']."#";
                                    $Total_Orders =  $row_detail['price']* $row_detail['quantity'];
                                    $c_status = $row_detail['status'];
                                }
                            ?> 
                               <tr>
                                <td> <?php echo $row_toor['id']; ?> </td>
                                <td> <?php echo $row_toor['idCustomer']; ?> </td>
                                <td> <?php echo ($c_email); ?></td>
                                <td> <?php echo ($c_address); ?> </td>
                                <td> <?php echo ($c_phone); ?> </td>
                                <td> <?php echo ($c_orderId); ?> </td>
                                <td> <?php echo ($c_pr); ?> </td>
                                <td> <?php echo ($Total_Orders).' VND'; ?> </td>
                                <td> <?php echo $c_status; ?> </td>
                                <td> 
                                <form action="" class="form-horizontal" method="post">
                                    <select  class="form-control" name="IdFashtion">
                                        <option value="">Chọn</option>
                                        <option value="<?php echo 'Đang chờ xử lý#'.$c_orderId?>">Đang chờ xử lý</option>
                                        <option value="<?php echo 'Đang vận chuyển#'.$c_orderId ?>">Đang vận chuyển</option>
                                        <option value="<?php echo 'Đã giao#'.$c_orderId ?>">Đã giao</option>
                                        <option value="<?php echo 'Hệ thống hủy#'.$c_orderId ?>">Hệ thống hủy</option>
                                    </select>
                                    <div class="col-md-6">
                                        <input value="Update" name="update" type="submit" >
                                    </div>
                                </form>
                                
                                </td>
                                <td> 
                                     <a href="index.php?delete_order=<?php echo $c_id; ?>">
                                        <i class="fa fa-trash-o"></i>Delete
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

<?php  
    if(isset($_POST['update'])){
        $idFas = ($_POST['IdFashtion']);
        $iparr =  explode("#", $idFas); 
        $ok = 0;
        for($i = 1; $i< count($iparr); $i++){
            $upda_fas = "UPDATE `orderproduct` SET `status` = '$iparr[0]' WHERE `orderproduct`.`orderID` = $iparr[$i];";
            $run_upda_fas = mysqli_query($conn,$upda_fas);
            $ok =1;
        }
        if($ok==1 ){
            echo "<script>alert('Update Successfully')</script>"; 
        }else{
            echo "<script>alert('Update Failure')</script>"; 
        }
    }
?>

<?php } ?>
