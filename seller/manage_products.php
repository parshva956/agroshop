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
       
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Products Price</th>
                        <th scope="col">Products Image</th>
                        <th scope="col">Category</th>
                        <th scope="col">Change status</th>
                        <th scope="col">Update</th>
                        <th scope="col">Remove</th>

                    </tr>
                </thead>
                <tbody>
                    
                 
                    <?php


$query="SELECT * FROM `product_master` WHERE `s_id` = ".$_SESSION["seller_id"]." ";
$result=mysqli_query($con,$query);
$count=1;

while(($row= mysqli_fetch_assoc($result))){
    $cat_id =$row['cat_id'];
    if ($cat_id == 1) {
        $category = "Seeds";
    } elseif ($cat_id == 2) {
        $category = "Tools";
    } elseif ($cat_id == 3) {
        $category = "Pesticides";
    } elseif ($cat_id == 4) {
        $category = "others";
    }


    
       echo '
       <tr>
                    <th>'.$count.'</th>
                    <th> '.$row['p_name'].' </th>
                    <th>'.$row['price'].' </th>
                    <th><img src="images/'.$row['image'].' " style="height: 48px;" alt=""></th>
                    <th>'.$category.' </th>';

if($row['status'] == 1){
    echo ' <th><a href="_out_of_available.php?id='.$row['p_id'].'"><button type="button" class="btn btn-danger">Make out of stock</button></a></th>';
}
elseif($row['status'] == 0){
    echo ' <th><a href="_make_available.php?id='.$row['p_id'].'"><button type="button" class="btn btn-primary">Make available</button></a></th>';
}
echo '
                   
                    <th><a href="update_products.php?id='.$row['p_id'].'"><button type="button" class="btn btn-success">Update</button></a></th>
                    <th><a href="remove_products.php?id='.$row['p_id'].'"><button type="button" class="btn btn-danger">Remove</button></a></th>
                  </tr>
       ';


$count++;
    
  
}
?>
                </tbody>
            </table>
        </div>
  

        </div>
<!-- page contents ends -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
</body>

</html>