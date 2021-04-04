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
               <i class="fa fa-dashboard"></i> Dashboard / View Product Categories
            </li>
         </ol>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">
                  <i class="fa fa-tags fa-fw"></i> View Product Categories
               </h3>
            </div>
            <div class="panel-body">
               <div class="table-responsive">
                  <table class="table table-hover table-striped table-bordered">
                     <thead>
                        <tr>
                           <th> Category ID </th>
                           <th> Fashtion ID </th>
                           <th> Name Categories </th>
                           <th> Edit</th>
                           <th> Delete </th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php
                        $get_p_cats = "select * from categories";
                        $run_p_cats = mysqli_query($conn, $get_p_cats);
                        while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {
                           $p_cat_id = urldecode($row_p_cats['categoryID']);
                           $p_cat_fas = urldecode($row_p_cats['fashionID']);
                           $p_cat_desc = urldecode($row_p_cats['nameCategory']);
                        ?>
                           <tr>
                              <td> <?php echo $p_cat_id; ?> </td>
                              <td><?php echo $p_cat_fas; ?> </td>
                              <td width="300"> <?php echo $p_cat_desc; ?> </td>
                              <td>
                                 <a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?> ">
                                    <i class="fa fa-pencil"></i> Edit
                                 </a>
                              </td>
                              <td>
                                 <a href="index.php?delete_p_cat=<?php echo $p_cat_id; ?> ">
                                    <i class="fa fa-trash"></i> Delete
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