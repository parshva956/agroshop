<?php
include("db.php");

$id=$_GET['id'];
$query= "DELETE FROM `seller` WHERE `s_id`=$id";
$result=mysqli_query($con,$query);
if($result){
    echo '<script>alert("data removed")</script>';
    header( "Refresh:1; url=./manage_sellers.php", true, 303);

}
else{
    echo '<script>alert("data not removed")</script>';
}



?>
