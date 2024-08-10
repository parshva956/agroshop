<?php
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/nav_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="js/nav.js"></script>
    <title>Document</title>
</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle" style=" text-decoration: none"> <i class='bx bx-menu' id="header-toggle"></i> </div>
       
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="dashboard.php" class="nav_logo"  style=" text-decoration: none"> <i class='bx bx-layer nav_logo-icon'></i>
                    <span class="nav_logo-name">Admin name</span> </a>
                <div class="nav_list">
                    <a style=" text-decoration: none" href="#" class="nav_link"> <i
                            class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span> </a> 
                        <a href="manage_buyers.php" class="nav_link"  style=" text-decoration: none"> <i
                            class='bx bx-user nav_icon'></i> <span class="nav_name">Buyers</span> </a>
                            <a style=" text-decoration: none" href="manage_sellers.php" class="nav_link"> <i
                            class='bx bx-user-pin nav_icon'></i> <span class="nav_name active">Seller</span> </a>
                            <a style=" text-decoration: none" href="manage_reviews.php" class="nav_link"> <i
                            class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name ">Reviews</span>
                    </a>
                    <a style=" text-decoration: none" href="manage_contacts.php" class="nav_link "> <i class='bx bx-bookmark nav_icon'></i>
                        <span class="nav_name">Contacts</span> </a>
                </div>
            </div> <a style=" text-decoration: none" href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100" style="margin-top: 100px;">
       <div class="container">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Email</th>
                <th scope="col">Phone no</th>
                <th scope="col">Uset Type</th>
                <th scope="col">Is Active</th>
                <th scope="col">Update</th>
                <th scope="col">Remove</th>
               
              </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <th>1</th>
                    <th>First</th>
                    <th>Email</th>
                    <th>Phone no</th>
                    <th>Buyer</th>
                    <th>Is Active</th>
                    <th><button type="button" class="btn btn-primary">Update</button></th>
                    <th><button type="button" class="btn btn-danger">Remove</button></th>
                  </tr>
                  -->
<?php


$query="SELECT * FROM `seller`";
$result=mysqli_query($con,$query);
$count=1;

while($row= mysqli_fetch_assoc($result)){
      
  
echo '
<tr>
<th>'.$count.'</th>
<th>'.$row['s_name'].'</th>
<th>'.$row['s_email'].'</th>
<th>'.$row['s_mobile'].'</th>
<th>Seller</th>
<th>'.$row['is_active'].'</th>
<th><a href = "update_sellers.php?id='.$row['s_id'].'" class="btn btn-primary">Update</a></th>
<th><a href = "remove_seller.php?id='.$row['s_id'].'" class="btn btn-danger">Remove</a></th>
</tr>
';
$count++;
}

?>
            </tbody>
          </table>
       </div>
    </div>
    <!--Container Main end-->
</body>

</html>

<!-- 


    echo '
    <tr>
    <th>1</th>
    <th>'.$row['b_name'].'</th>
    <th>'.$row['b_email'].'</th>
    <th>'.$row['b_mobile'].'</th>
    <th>Buyer</th>
    <th>'.$row['is_active'].'</th>
    <th><button type="button" class="btn btn-primary">Update</button></th>
    <th><button type="button" class="btn btn-danger">Remove</button></th>
    </tr>
    '; -->