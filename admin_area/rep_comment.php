<?php 
 $tmp = "";
    if(!isset($_SESSION['admin_user'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
        if(isset($_POST['send'])){
            $tmp = $_POST["cmt"];
            $id = $_POST['id'];
            $sql = "UPDATE `comments` SET `admin_rep` = '".$tmp."' WHERE `comments`.`id` = ".$id." ;";
            $update = mysqli_query($con, $sql);
        }
        if(isset($_POST['delete'])){
            $id = $_POST['id'];
            $sql2 = "DELETE FROM `comments` WHERE `comments`.`id` = ".$id;
            $delete = mysqli_query($con, $sql2);
        }
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Rep Comment
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
                   <i class="fa fa-tags"></i> Rep Comments
               </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                     <thead>
                         <th>Name Product</th>
                         <th colspan="3">Content Comment</th>
                     </thead>   
                    <tbody>
                        <?php
                            $res_product = mysqli_query($con, "SELECT * FROM products");
                            while ($row_product = mysqli_fetch_array($res_product)) {
                        ?>

                        <?php
                            $count =  mysqli_query($con, "SELECT COUNT(*) FROM comments WHERE idProduct = ".$row_product['product_id']);
                            $tmp1 = mysqli_fetch_array($count);

                        ?>
                        <tr style="text-align: center;">
                            <td rowspan= <?php echo $tmp1[0]+1  ?>>
                                <?php echo $row_product['product_title']?>
                            </td>
                        </tr>
                        <?php
                            $res_comment2 = mysqli_query($con, "SELECT * FROM comments WHERE idProduct = ".$row_product['product_id']);
                              while ($row_comment = mysqli_fetch_array($res_comment2)) {
                        ?>
                        <tr>
                            <td><?php echo $row_comment['name']." :  ".$row_comment['content_cmt']  ?></td>
                            <td>
                                <form method="POST">
                                        <input type="hidden" name="id" readonly="true" value= <?php echo  $row_comment['id']?>>
                                        <textarea style="width: 80%" name="cmt"></textarea>
                                <button name="send" type = "submit">send</button>
                                </form>
                            </td>
                            <td> <form method="POST">
                                  <input type="hidden" name="id" readonly="true" value= <?php echo  $row_comment['id']?>>
                                <button name="delete" type = "submit">Delete</button>
                                </form></td>
                        </tr>
                        <?php   
                                }  
                            }
                        ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>