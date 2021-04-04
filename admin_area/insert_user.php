<?php 
    if(!isset($_SESSION['admin_user'])){
        echo "<script>window.open('login.php','_self')</script>";
    }else{
?>
<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Insert User
            </li>
        </ol>
    </div>
</div> 
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
           <div class="panel-heading">
               <h3 class="panel-title">
                   <i class="fa fa-money fa-fw"></i> Insert User
               </h3>
           </div> 
           <div class="panel-body">
               <form method="post" class="form-horizontal" enctype="multipart/form-data">
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Username </label> 
                      <div class="col-md-6">
                          <input name="admin_name" type="text" class="form-control" required>
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> E-mail </label> 
                      <div class="col-md-6">
                          <input name="admin_email" type="text" class="form-control" required>
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Password </label> 
                      <div class="col-md-6">
                          <input name="admin_pass" type="password" class="form-control" required>
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Country </label> 
                      <div class="col-md-6">
                          <input name="admin_country" type="text" class="form-control" required>
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Contact </label> 
                      <div class="col-md-6">
                          <input name="admin_contact" type="text" class="form-control" required>
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Job </label> 
                      <div class="col-md-6">
                          <input name="admin_job" type="text" class="form-control" required>
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> Image </label> 
                      <div class="col-md-6">
                          <input name="admin_image" type="file" class="form-control" required>
                      </div> 
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"> About </label> 
                      <div class="col-md-6">
                          <textarea name="admin_about" class="form-control" rows="3"></textarea>
                      </div>
                   </div>
                   <div class="form-group">
                      <label class="col-md-3 control-label"></label> 
                      <div class="col-md-6">
                          <input name="submit" value="Insert User" type="submit" class="btn btn-primary form-control">
                      </div>
                   </div>
               </form>
           </div>
        </div>
    </div>
</div>
<?php 
if(isset($_POST['submit'])){
    $user_name = urlencode($_POST['admin_name']);
    $user_email = urlencode($_POST['admin_email']);
    $user_pass = urlencode($_POST['admin_pass']);
    $user_country = urlencode($_POST['admin_country']);
    $user_contact = urlencode($_POST['admin_contact']);
    $user_job = urlencode($_POST['admin_job']);
    $user_about = urlencode($_POST['admin_about']);
    
    $user_image = $_FILES['admin_image']['name'];
    $temp_admin_image = $_FILES['admin_image']['tmp_name'];
    
    move_uploaded_file($temp_admin_image,"admin_images/$user_image");
    
    $insert_user = "insert into admins (admin_name,admin_email,admin_pass,admin_country,admin_contact,admin_job,admin_image,admin_about) values ('$user_name','$user_email','$user_pass','$user_country','$user_contact','$user_job','$user_image','$user_about')";
    
    $run_user = mysqli_query($con,$insert_user);
    
    if($run_user){
        
        echo "<script>alert('New User has been inserted to your admin sucessfully')</script>";
        echo "<script>window.open('index.php?view_users','_self')</script>";
        
    }
    
}

?>


<?php } ?>