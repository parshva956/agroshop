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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <!-- <script src="js/review.js"></script> -->
    <script src="js/nav.js"></script>

    <title>Document</title>


</head>

<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle" style=" text-decoration: none"> <i class='bx bx-menu' id="header-toggle"></i> </div>

    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="#" class="nav_logo" style=" text-decoration: none"> <i class='bx bx-layer nav_logo-icon'></i>
                    <span class="nav_logo-name">Admin name</span> </a>
                <div class="nav_list">
                    <a style=" text-decoration: none" href="dashboard.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span> </a>
                    <a href="manage_buyers.php" class="nav_link" style=" text-decoration: none"> <i
                            class='bx bx-user nav_icon'></i> <span class="nav_name">Buyers</span> </a>
                    <a style=" text-decoration: none" href="manage_sellers.php" class="nav_link"> <i
                            class='bx bx-user-pin nav_icon'></i> <span class="nav_name">Seller</span> </a>
                    <a style=" text-decoration: none" href="manage_reviews.php" class="nav_link"> <i
                            class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name active">Reviews</span>
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



        <?php

$query="SELECT * FROM `review_table`";
$result=mysqli_query($con,$query);
while($rows = mysqli_fetch_assoc($result)){
    
    $date =  date('l jS, F Y h:i:s A', $rows["datetime"]);
    $times=$rows['user_rating'];
    $name1 = $rows['user_name'];
    $fstchar= substr($name1,0,1);
    
echo '

<div class="row mb-3">

<div class="col-sm-1">
    <div class="rounded-circle bg-danger text-white pt-2 pb-2">
        <h3 class="text-center">'.$fstchar.'</h3>
    </div>
</div>

<div class="col-sm-11">

    <div class="card">

        <div class="card-header"><b>'.$rows['user_name'].'</b></div>

        <div class="card-body">

          ';
          for($i=0;$i<$times ;$i++){
            echo ' <i class="fas fa-star text-warning mr-1"></i>';
            }
          
         echo '

            <br />
            '.$rows['user_review'].'


        </div>


        <div class="card-footer text-right">'.$date.'
        
        <a href = "remove_review.php?rid='.$rows["review_id"].'" class="btn btn-danger float-end">Remove</a>
        
        </div>
       


    </div>
</div>

</div>
';


}


?>

        </div>

    </div>
    <!--Container Main end-->
</body>

</html>