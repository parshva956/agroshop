<?php
include("db.php");
session_start();
$query1 = mysqli_query($con,"SELECT * FROM `product_master` Where `s_id` = '".$_SESSION["seller_id"]."'");

$test = array();
$count= 0;

while($row = mysqli_fetch_assoc($query1)){
   $q2 =  mysqli_query($con,"SELECT * FROM `order_master` WHERE `p_id` = '".$row['p_id']."'" ); 
   while($row2 = mysqli_fetch_assoc($q2)){

$test[$count]["label"] = $row['p_name'];
$test[$count]["y"] = $row2['price'];
$count = $count+1;
   }
}


?>
<!doctype html>
<html lang="en">

<head>
    <title>Profits</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js
"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="css/buy_products.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        html{
            overflow-x: hidden;
        }
        .content{
            margin: 0 263px!important;
        }
        #sidebar{
            height: 100vh;
        }
        .content canvas{
            position: sticky!important;
            width: fit-content;
        }
        .content{
            width: 100%;
            background-color: #959f9e;
        }
    </style>
</head>


<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Profits"
	},
	
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## Rs.",
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
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
        
<div class="content p-4 p-md-5 pt-5">
  <div id="chartContainer" style="height: 370px; width: 100%;  margin-top: 30px;"></div>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Invoice</th>
        <th scope="col">Product name</th>
        <th scope="col">Buyer name</th>
        <th scope="col">Buyer Email</th>
        <th scope="col">Buyer Phone</th>
        <th scope="col">amount</th>
        <th scope="col">placed on</th>
        <th scope="col">Quantity</th>
        <th scope="col">Bill</th>
      </tr>
    </thead>
   							
    <tbody>

<?php

$res = mysqli_query($con,"SELECT * FROM `product_master` Where `s_id` = '".$_SESSION["seller_id"]."'");
$count = 1;
while($row=mysqli_fetch_assoc($res)){
    $q2 =  mysqli_query($con,"SELECT * FROM `order_master` WHERE `p_id` = '".$row['p_id']."'" );
while($row2 = mysqli_fetch_assoc($q2)){

$b_name = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `buyer` WHERE `b_id` = '".$row2['b_id']."'"));

$payment_master = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `payment_master` WHERE `invoice` = '".$row2['invoice']."'"));
$quantity = $row2['price']/$row['price'];

  echo '
  <tr>
  <th scope="row">'.$count.'</th>
  <td>'.$row2['invoice'].'</td>
  <td>'.$row['p_name'].'</td>
  <td>'.$b_name['b_name'].'</td>
  <td>'.$b_name['b_email'].'</td>
  <td>'.$b_name['b_mobile'].'</td>
  <td>'.$row2['price'].'</td>
  <td>'.$payment_master['placed_on'].'</td>
  <td>'.round($quantity).'</td>

 
  <td><a class="btn btn-primary" href="pdf.php?user_id=" role="button">Bill</a></td>
  
</tr>

  ';
  $count = $count + 1;
}
}
?>

    </tbody>
  </table>
</div>
<!-- page contents ends -->
        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
</body>

</html>