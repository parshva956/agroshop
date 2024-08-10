<?php
include("db.php");

$id = $_GET['id'];
$query = "SELECT * FROM `product_master` WHERE `p_id` =$id";
$result = mysqli_query($con, $query);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $name = $row['p_name'];
        $price = $row['price'];
        $desc = $row['p_info'];
        $category = $row['cat_id'];
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <title>Sidebar 03</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/add_product.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');

*, body {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    -webkit-font-smoothing: antialiased;
    text-rendering: optimizeLegibility;
    -moz-osx-font-smoothing: grayscale;
}

html, body {
    height: 100%;
    background-color: #152733;
    overflow: hidden;
}


.form-holder {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      min-height: 100vh;
}

.form-holder .form-content {
    position: relative;
    text-align: center;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-align-items: center;
    align-items: center;
    padding: 60px;
}

.form-content .form-items {
    border: 3px solid #fff;
    padding: 40px;
    display: inline-block;
    width: 100%;
    min-width: 540px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    text-align: left;
    -webkit-transition: all 0.4s ease;
    transition: all 0.4s ease;
}

.form-content h3 {
    color: #fff;
    text-align: left;
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 5px;
}

.form-content h3.form-title {
    margin-bottom: 30px;
}

.form-content p {
    color: #fff;
    text-align: left;
    font-size: 17px;
    font-weight: 300;
    line-height: 20px;
    margin-bottom: 30px;
}


.form-content label, .was-validated .form-check-input:invalid~.form-check-label, .was-validated .form-check-input:valid~.form-check-label{
    color: #fff;
}

.form-content input[type=text], .form-content input[type=file], .form-content input[type=email], .form-content select {
    width: 100%;
    padding: 9px 20px;
    text-align: left;
    border: 0;
    outline: 0;
    border-radius: 6px;
    background-color: #fff;
    font-size: 15px;
    font-weight: 300;
    color: #152733;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
    margin-top: 16px;
}


.btn-primary{
    background-color: #6C757D;
    outline: none;
    border: 0px;
     box-shadow: none;
}

.btn-primary:hover, .btn-primary:focus, .btn-primary:active{
    background-color: #495056;
    outline: none !important;
    border: none !important;
     box-shadow: none;
}

.form-content textarea {
  
    position: static !important;
    width: 100%;
    padding: 8px 20px;
    border-radius: 6px;
    text-align: left;
    background-color: #fff;
    border: 0;
    font-size: 15px;
    font-weight: 300;
    color: #152733;
    outline: none;
    resize: none;
    height: 120px;
    -webkit-transition: none;
    transition: none;
    margin-bottom: 14px;
}

.form-content textarea:hover, .form-content textarea:focus {
    border: 0;
    background-color: #ebeff8;
    color: #8D8D8D;
}

.mv-up{
    margin-top: -9px !important;
    margin-bottom: 8px !important;
}

.invalid-feedback{
    color: #ff606e;
}

.valid-feedback{
   color: #2acc80;
}
.form-body{
    margin-left: 90%;
}
    </style>
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
        <div>
      
        <div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                      
                        <h3>Register Today</h3>
                        <p>Fill in the data below.</p>
                        <form class="requires-validation"  enctype="multipart/form-data"  method="POST">

                            <div class="col-md-12">
                               
                                <input  placeholder="Product name" type="text" name="p_name" value="<?php echo $name?>" >
                               <div class="valid-feedback">Username field is valid!</div>
                               <div class="invalid-feedback">Username field cannot be blank!</div>
                            </div>
                            <div class="col-md-12">
                               
                                <input type="text" name="price" placeholder="Product Price" required value="<?php echo $price?>" >
                               <div class="valid-feedback">Username field is valid!</div>
                               <div class="invalid-feedback">Username field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                                <input  type="text" name="description" placeholder="description" required value="<?php echo $desc?>" >
                                 <div class="valid-feedback">Email field is valid!</div>
                                 <div class="invalid-feedback">Email field cannot be blank!</div>
                            </div>

                           <div class="col-md-12">
                          
                                <select class="form-select mt-3" name="category" required >
                                      <option selected disabled value="">Category</option>
                                      <?php
                                      $q1 = mysqli_query($con,"SELECT * FROM `category`");
                                      while($row = mysqli_fetch_assoc($q1)){
                                      if($category == $row['cat_id']){
                                        echo '
                                        <option value="'.$row['cat_id'].'" selected>'.$row['cat_name'].'</option>
                                        ';
                                      }
                                      else{
                                        
                                        echo '
                                        <option value="'.$row['cat_id'].'" >'.$row['cat_name'].'</option>
                                        
                                        ';
                                      }
                                      }
                                      ?>
                                      
                                     
                                    
                               </select>
                                <div class="valid-feedback">You selected a position!</div>
                                <div class="invalid-feedback">Please select a position!</div>
                           </div>


                          

                  

                            <div class="form-button mt-3">
                                <button id="submit" type="submit" name="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
$con = mysqli_connect("localhost","root","","agroshop");





if(isset($_POST['submit']))
{ 

    $query2="UPDATE `product_master` SET `p_name`='".$_POST['p_name']."',`price`='".$_POST['price']."',`cat_id`='".$_POST['category']."',`p_info`='".$_POST['description']."' WHERE `p_id` = $id";
    $result2=mysqli_query($con,$query2);
    if($result2){
        echo '<script>alert("data updated")</script>';
        echo '<script>window.setTimeout(function () {
            location.href = "manage_products.php";
        }, 0);</script>';
        
    }
    else{
        echo '<script>alert("data not updated")</script>';
    }
}

?>


        </div>

        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
</body>

</html>

<script>
    (function () {
'use strict'
const forms = document.querySelectorAll('.requires-validation')
Array.from(forms)
  .forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()

</script>


