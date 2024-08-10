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
            <div> <a href="dashboard.php" class="nav_logo" style=" text-decoration: none"> <i class='bx bx-layer nav_logo-icon'></i>
                    <span class="nav_logo-name">Admin name</span> </a>
                <div class="nav_list">
                    <a style=" text-decoration: none" href="dashboard.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name active">Dashboard</span> </a>
                    <a href="manage_buyers.php" class="nav_link" style=" text-decoration: none"> <i
                            class='bx bx-user nav_icon'></i> <span class="nav_name">Buyers</span> </a>
                    <a style=" text-decoration: none" href="manage_sellers.php" class="nav_link"> <i
                            class='bx bx-user-pin nav_icon'></i> <span class="nav_name">Seller</span> </a>
                    <a style=" text-decoration: none" href="manage_reviews.php" class="nav_link"> <i
                            class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Reviews</span>
                    </a>
                    <a style=" text-decoration: none" href="manage_contacts.php" class="nav_link "> <i
                            class='bx bx-bookmark nav_icon'></i>
                        <span class="nav_name">Contacts</span> </a>
                    
                </div>
            </div> <a style=" text-decoration: none" href="logout.php" class="nav_link"> <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">SignOut</span> </a>
        </nav>
    </div>
    <!--Container Main start-->

        <div class="container" style="margin-top: 130px;">
        <div class="row">
<?php 
$query = mysqli_query($con, "SELECT * FROM `buyer`");
$buyer = mysqli_num_rows($query);
?>
        <div class="col-sm-3">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $buyer ?> Buyers</h2>
                        <p class="card-text">Total number of Buyers</p>
                    </div>
                    <div class="card-footer"><a class="list-group-item list-group-item-action" href="manage_buyers.php">More-Info</a></div>
                </div>
            </div>
            <!-- card2 -->
            <?php
$query2 = mysqli_query($con, "SELECT * FROM `seller`");
$seller = mysqli_num_rows($query2);
?>
            <div class="col-sm-3">
                <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $seller ?> Seller</h2>
                        <p class="card-text">Number of Sellers</p>
                        </div>
                        <div class="card-footer"><a class="list-group-item list-group-item-action" href="manage_sellers.php">More-Info</a></div>
                </div>
            </div>
            <!-- card3 -->
            <?php
$query3 = mysqli_query($con, "SELECT * FROM `review_table`");
$reviews = mysqli_num_rows($query3);
?>
            <div class="col-sm-3">
                <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $reviews ?> Reviews</h2>
                        <p class="card-text">Total reviews</p>
                        </div>
                        <div class="card-footer"><a class="list-group-item list-group-item-action" href="manage_reviews.php">More-Info</a></div>
                </div>


            </div>
            <!-- card4 -->
            <?php
$query4 = mysqli_query($con, "SELECT * FROM `contact_master` ");
$bookings = mysqli_num_rows($query4);
?>
            <div class="col-sm-3">
                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h2 class="card-title"><?php echo $bookings ?> Bookings</h2>
                        <p class="card-text">New bookings</p>
                        </div>
                        <div class="card-footer"><a class="list-group-item list-group-item-action" href="manage_contacts.php">More-Info</a></div>
                </div>
            </div>
        </div>
        </div>
    <!--Container Main end-->
</body>

</html>

