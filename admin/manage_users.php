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
            <div> <a href="dashboard.php" class="nav_logo" style=" text-decoration: none"> <i class='bx bx-layer nav_logo-icon'></i>
                    <span class="nav_logo-name">Admin name</span> </a>
                <div class="nav_list">
                    <a style=" text-decoration: none" href="#" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span> </a>
                    <a href="manage_buyers.php" class="nav_link" style=" text-decoration: none"> <i
                            class='bx bx-user nav_icon'></i> <span class="nav_name">Buyers</span> </a>
                    <a style=" text-decoration: none" href="manage_sellers.php" class="nav_link"> <i
                            class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Seller</span> </a>
                    <a style=" text-decoration: none" href="#" class="nav_link"> <i
                            class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Messages</span>
                    </a>
                    <a style=" text-decoration: none" href="manage_contacts.php" class="nav_link active"> <i class='bx bx-bookmark nav_icon'></i>
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
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone no</th>
                <th scope="col">Description</th>
                <th scope="col">Remove</th>
               
              </tr>
            </thead>
            <tbody>
<?php


$query="SELECT * FROM `contact_master`";
$result=mysqli_query($con,$query);
$count=1;

while(($row= mysqli_fetch_assoc($result))){
      

    echo '
    <tr>
    <th>'.$count.'</th>
    <th>'.$row['name'].'</th>
    <th>'.$row['email'].'</th>
    <th>'.$row['phone'].'</th>
    <th>'.$row['descripition'].'</th>
    <th><a href = "remove_buyer.php?id='.$row['contact_id'].'" class="btn btn-danger">Remove</a></th>
    </tr>
    '; 
$count++;
    
  
}
?>
            </tbody>
          </table>
       </div>
    </div>
   

        
</body>

</html>