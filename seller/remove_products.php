<?php
include("db.php");

$id=$_GET['id'];
$query= "DELETE FROM `product_master` WHERE `p_id`=$id";
$result=mysqli_query($con,$query);
if($result){
    echo '<script>alert("data removed")</script>';
    header( "Refresh:1; url=./manage_products.php", true, 303);

}
else{
    echo '<script>alert("data not removed")</script>';
}



?>
