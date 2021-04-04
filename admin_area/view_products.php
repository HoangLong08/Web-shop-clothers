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
                <i class="fa fa-dashboard"></i> Dashboard / View Products
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
                   <i class="fa fa-tags"></i>  View Products
               </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> Active: </th>
                                <th> Change Active: </th>
                                <th> ID_owned: </th>
                                <th> Product ID: </th>
                                <th> categoryID: </th>
                                <th> fashionID: </th>
                                <th> Name Product: </th>
                                <th> Price Product: </th>
                                <th> Image One: </th>
                                <th> Image Two: </th>
                                <th> Image Three: </th>
                                <th> Quantity: </th>
                                <th> Sale: </th>
                                <th> Delete: </th>
                                <th> Product Edit: </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i=0;
                                $get_pro = "select * from products";
                                $run_pro = mysqli_query($conn,$get_pro);
                                $oktmp = "Chưa duyệt";
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    $active = ($row_pro['active']);
                                    if($active == 1){
                                        $oktmp = "Đã duyệt";
                                    }else{
                                        $oktmp = "Chưa duyệt";
                                    }

                                    $productID = ($row_pro['productID']);
                                    
                                    $categoryID = ($row_pro['categoryID']);
                                    
                                    $fashionID = ($row_pro['fashionID']);
                                    
                                    $nameProduct = ($row_pro['nameProduct']);
                                    
                                    $priceProduct = ($row_pro['priceProduct']);

                                    $ID_owned = ($row_pro['ID_owned']);
                                    
                                    $imageOne = ($row_pro['imageOne']);
                                    
                                    $imageTwo = ($row_pro['imageTwo']);
                                    
                                    $imageThree = ($row_pro['imageThree']);
                                    
                                    $quantity = ($row_pro['quantity']);
                                    $sale = ($row_pro['sale']);
                                    $i++;
                            ?>
                            <tr>
                            <td> <?php echo $oktmp;?> </td>
                            <td> 
                                <form action="" class="form-horizontal" method="post">
                                    <select  class="form-control" name="IdFashtion">
                                        <option value="">Chọn</option>
                                        <option value="<?php echo '1#'.$productID?>">Đã duyệt</option>
                                        <option value="<?php echo '0#'.$productID ?>">Chưa duyệt</option>
                                    </select>
                                    <div class="col-md-6">
                                        <input value="Update" name="update" type="submit" >
                                    </div>
                                </form>
                                
                                </td>
                                <td> <?php echo $ID_owned;?> </td>
                                <td> <?php echo $productID; ?> </td>
                                <td> <?php echo $categoryID; ?> </td>
                                <td> <?php echo $fashionID; ?> </td>
                                <td> <?php echo $nameProduct; ?> </td>
                                <td> <?php echo $priceProduct; ?> </td>
                                <td> <img src="../image/imageProduct/<?php echo $imageOne; ?>" width="60" height="60"></td>
                                <td> <img src="../image/imageProduct/<?php echo $imageTwo; ?>" width="60" height="60"></td>
                                <td> <img src="../image/imageProduct/<?php echo $imageThree; ?>" width="60" height="60"></td>
                                <td>  <?php echo $quantity; ?> </td>
                                <td>  <?php echo $sale; ?> </td>
                                <td> 
                                     
                                     <a href="index.php?delete_product=<?php echo $productID; ?>">
                                     
                                        <i class="fa fa-trash-o"></i> Delete
                                    
                                     </a> 
                                     
                                </td>
                                <td> 
                                     
                                     <a href="index.php?edit_product=<?php echo $productID; ?>">
                                     
                                        <i class="fa fa-pencil"></i> Edit
                                    
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
            $upda_fas = "UPDATE `products` SET `active` = '$iparr[0]' WHERE `products`.`productID` = $iparr[1];";
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