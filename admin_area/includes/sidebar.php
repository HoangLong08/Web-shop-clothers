<?php
if (!isset($_SESSION['admin_user'])) {
   echo "<script>window.open('login.php','_self')</script>";
} else {
   $admin_user = $_SESSION['admin_user'];
?>
   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-header">
         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
         </button>
         <a href="index.php?dashboard" class="navbar-brand">Admin Area</a>
      </div>
      <ul class="nav navbar-right top-nav">
         <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               <i class="fa fa-user"></i> <?php echo ($admin_user);  ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
               <li>
                  <a href="index.php?user_profile=<?php echo $admin_id; ?>">
                     <i class="fa fa-fw fa-user"></i> Profile
                  </a>
               </li>
               
               <li>
                  <a href="logout.php">
                     <i class="fa fa-fw fa-power-off"></i> Log Out
                  </a>
               </li>
            </ul>
         </li>
      </ul>

      <div class="collapse navbar-collapse navbar-ex1-collapse">
         <ul class="nav navbar-nav side-nav">
            <li>
               <a href="index.php?dashboard">
                  <i class="fa fa-fw fa-dashboard"></i> Dashboard
               </a>
            </li>
            <li>
               <a href="#" data-toggle="collapse" data-target="#products">
                  <i class="fa fa-fw fa-tag"></i> Products
                  <i class="fa fa-fw fa-caret-down"></i>
               </a>
               <ul id="products" class="collapse">
                  <li>
                     <a href="index.php?insert_product"> Insert Product </a>
                  </li>
                  <li>
                     <a href="index.php?view_products"> View Products </a>
                  </li>
               </ul>
            </li>
            <li>
               <a href="#" data-toggle="collapse" data-target="#p_cat">
                  <i class="fa fa-fw fa-edit"></i> Products Categories
                  <i class="fa fa-fw fa-caret-down"></i>
               </a>
               <ul id="p_cat" class="collapse">
                  <li>
                     <a href="index.php?insert_p_cat"> Insert Product Category </a>
                  </li>
                  <li>
                     <a href="index.php?view_p_cats"> View Products Categories </a>
                  </li>
               </ul>
            </li>
            
            <li>
               <a href="index.php?view_customers">
                  <i class="fa fa-fw fa-users"></i> View Customers
               </a>
            </li>
            <li>
               <a href="index.php?view_orders">
                  <i class="fa fa-fw fa-book"></i> View Orders
               </a>
            </li>
            <li>
               <a href="logout.php">
                  <i class="fa fa-fw fa-power-off"></i> Log Out
               </a>
            </li>
         </ul>
      </div>
   </nav>
<?php } ?>