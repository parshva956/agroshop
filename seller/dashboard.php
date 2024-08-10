<?php
include("db.php");
session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <title>Sidebar 03</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/buy_products.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="active">
            <div class="custom-menu">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-4">
                <h1><a href="index.html" class="logo"><?php echo  $_SESSION["seller_name"]?></a></h1>
                <ul class="list-unstyled components mb-5">
                    <li class="active">
                        <a href="dashboard.php"><span class="fa fa-home mr-3"></span>Dashboard</a>
                    </li>
                    <li>
                        <a href="profits.php"><span class="fa fa-user mr-3"></span>Profits</a>
                    </li>
                    <li>
                        <a href="add_products.php"><span class="fa fa-briefcase mr-3"></span>Add products</a>
                    </li>
                    <li>
                        <a href="manage_products.php"><span class="fa fa-sticky-note mr-3"></span>Manage Products</a>
                    </li>
                    <li>
                        <a href="logout.php"><span class="fa fa-lock mr-3"></span>Logout</a>
                    </li>

                </ul>


            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
        <section id="product1" class="section-p1">

<div class="pro-container">
    <!-- card1 -->

    <?php
$query=mysqli_query($con,"SELECT * FROM `product_master` WHERE `s_id` = ".$_SESSION["seller_id"]." ");
if($query){
while($row=mysqli_fetch_assoc($query)){
  $image = $row['image'];
  $name = $row['p_name'];
  $price = $row ['price'];
  $pid = $row['p_id'];
  $desc = $row['p_info'];


echo '
<div class="pro" 
style="font-family: "League Spartan, sans-serif;">

<img src="/agroshop/seller/images/'.$image.'" alt="">
<div class="des">
    <span>'.$name.'</span>
    <h5>'.$desc.'</h5>

   <a href="manage_products.php?pid='.$pid.'"> <button type="button" class="btn btn-primary">Primary</button></a>
    <h4>Rs '.$price.'</h4>
</div>


</div>

';

}
}
?>

    <!-- -->
             
    <!-- cards end -->
</div>
</section>
        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
</body>

</html>